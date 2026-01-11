<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Questionnaire;
use App\Models\Response;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ResponseController extends Controller
{
    /**
     * Display a listing of responses.
     */
    public function index(Request $request, Questionnaire $questionnaire)
    {
        $responses = $questionnaire->responses()
            ->with('respondent')
            ->when($request->status, function ($query, $status) {
                $query->where('status', $status);
            })
            ->when($request->date_from, function ($query, $date) {
                $query->whereDate('created_at', '>=', $date);
            })
            ->when($request->date_to, function ($query, $date) {
                $query->whereDate('created_at', '<=', $date);
            })
            ->when($request->search, function ($query, $search) {
                $query->whereHas('respondent', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(20);

        return view('admin.responses.index', compact('questionnaire', 'responses'));
    }

    /**
     * Display a single response.
     */
    public function show(Questionnaire $questionnaire, Response $response)
    {
        $response->load(['respondent', 'answers.question']);

        return view('admin.responses.show', compact('questionnaire', 'response'));
    }

    /**
     * Remove a response.
     */
    public function destroy(Questionnaire $questionnaire, Response $response)
    {
        $response->delete();

        return redirect()
            ->route('admin.questionnaires.responses.index', $questionnaire)
            ->with('success', 'Response deleted successfully.');
    }

    /**
     * Export responses to CSV.
     */
    public function export(Request $request, Questionnaire $questionnaire): StreamedResponse
    {
        $filename = sprintf(
            '%s-responses-%s.csv',
            $questionnaire->slug,
            now()->format('Y-m-d-His')
        );

        return response()->streamDownload(function () use ($questionnaire, $request) {
            $handle = fopen('php://output', 'w');

            // Get all questions for headers
            $questions = $questionnaire->questions()->orderBy('id')->get();

            // Build headers
            $headers = ['Response ID', 'Respondent Name', 'Email', 'Phone', 'Organization', 'Job Title', 'Status', 'Started At', 'Completed At', 'Time Spent'];
            foreach ($questions as $question) {
                $headers[] = $question->question_text;
            }
            fputcsv($handle, $headers);

            // Get responses with answers
            $questionnaire->responses()
                ->with(['respondent', 'answers'])
                ->when($request->status, fn($q, $s) => $q->where('status', $s))
                ->when($request->date_from, fn($q, $d) => $q->whereDate('created_at', '>=', $d))
                ->when($request->date_to, fn($q, $d) => $q->whereDate('created_at', '<=', $d))
                ->chunk(100, function ($responses) use ($handle, $questions) {
                    foreach ($responses as $response) {
                        $row = [
                            $response->id,
                            $response->respondent->name ?? '',
                            $response->respondent->email ?? '',
                            $response->respondent->phone ?? '',
                            $response->respondent->organization ?? '',
                            $response->respondent->job_title ?? '',
                            $response->status,
                            $response->started_at?->format('Y-m-d H:i:s') ?? '',
                            $response->completed_at?->format('Y-m-d H:i:s') ?? '',
                            $response->formatted_time_spent,
                        ];

                        // Get answers indexed by question ID
                        $answers = $response->answers->keyBy('question_id');

                        foreach ($questions as $question) {
                            $answer = $answers->get($question->id);
                            $row[] = $answer ? $answer->display_value : '';
                        }

                        fputcsv($handle, $row);
                    }
                });

            fclose($handle);
        }, $filename, [
            'Content-Type' => 'text/csv',
        ]);
    }

    /**
     * Display response statistics.
     */
    public function stats(Questionnaire $questionnaire)
    {
        $stats = [
            'total' => $questionnaire->responses()->count(),
            'completed' => $questionnaire->responses()->completed()->count(),
            'in_progress' => $questionnaire->responses()->inProgress()->count(),
            'abandoned' => $questionnaire->responses()->where('status', 'abandoned')->count(),
            'completion_rate' => 0,
            'avg_time' => 0,
        ];

        if ($stats['total'] > 0) {
            $stats['completion_rate'] = round(($stats['completed'] / $stats['total']) * 100, 1);
        }

        $avgSeconds = $questionnaire->responses()
            ->completed()
            ->whereNotNull('time_spent_seconds')
            ->avg('time_spent_seconds');

        if ($avgSeconds) {
            $stats['avg_time'] = round($avgSeconds / 60, 1); // Convert to minutes
        }

        return view('admin.responses.stats', compact('questionnaire', 'stats'));
    }
}
