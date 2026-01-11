<?php

namespace Database\Seeders;

use App\Models\Questionnaire;
use App\Models\QuestionnaireSection;
use App\Models\Question;
use Illuminate\Database\Seeder;

class BusinessIntelligenceAssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Free Business Intelligence Assessment
     * Pain-point focused questions that reveal operational gaps
     * 5 scoring categories with max 100 points each
     */
    public function run(): void
    {
        // Delete existing assessment if present
        Questionnaire::where('slug', 'centralized-business-intelligence-assessment')->delete();
        Questionnaire::where('slug', 'centralized-business-intelligence-survey')->delete();

        // Create the assessment
        $assessment = Questionnaire::create([
            'title' => 'Free Business Intelligence Assessment',
            'slug' => 'centralized-business-intelligence-assessment',
            'description' => 'Discover how your organization measures up across 5 critical business intelligence pillars. This 10-minute assessment reveals hidden inefficiencies and provides actionable insights.',
            'introduction' => 'This complimentary assessment evaluates your organization across 5 key areas: Decision Making, Data & Information, Operations & Processes, Technology & Security, and Team & Growth. Upon completion, you\'ll receive a personalized intelligence report with your scores and recommendations.',
            'completion_message' => 'Thank you for completing your Business Intelligence Assessment! Your personalized intelligence report is being prepared. You will receive it within 2-3 business days at the email address you provided, along with an invitation to discuss your results.',
            'is_active' => true,
            'collect_contact_info' => true,
            'published_at' => now(),
        ]);

        // =================================================================
        // SECTION 1: DECISION MAKING (Max 100 points)
        // =================================================================
        $section1 = QuestionnaireSection::create([
            'questionnaire_id' => $assessment->id,
            'title' => 'Decision Making',
            'description' => 'How confident are you in the decisions being made across your organization?',
            'scoring_category' => 'decision_making',
            'max_score' => 100,
            'order' => 1,
        ]);

        $this->createScoredQuestions($section1, [
            [
                'question_text' => 'When you need to make an important business decision, how quickly can you access the information you need?',
                'question_type' => 'radio',
                'is_required' => true,
                'max_points' => 25,
                'help_text' => 'Think about decisions like pricing, hiring, or launching a new initiative.',
                'options' => [
                    'Within minutes - I have dashboards and reports at my fingertips',
                    'Within a day - I need to request reports or pull data together',
                    'Several days - Getting accurate information takes time',
                    'Often unable - I frequently make decisions without complete information',
                ],
                'score_values' => [25, 15, 8, 0],
                'order' => 1,
            ],
            [
                'question_text' => 'How often do you discover that decisions were made based on outdated or inaccurate information?',
                'question_type' => 'radio',
                'is_required' => true,
                'max_points' => 25,
                'options' => [
                    'Rarely or never - our data is reliable and current',
                    'Occasionally - it happens a few times a year',
                    'Frequently - it\'s a recurring problem',
                    'Constantly - we don\'t trust our data',
                ],
                'score_values' => [25, 15, 5, 0],
                'order' => 2,
            ],
            [
                'question_text' => 'Do different departments or team members sometimes give you conflicting numbers for the same metric?',
                'question_type' => 'radio',
                'is_required' => true,
                'max_points' => 25,
                'help_text' => 'For example, sales says revenue is X, but finance says it\'s Y.',
                'options' => [
                    'No - we have a single source of truth everyone trusts',
                    'Occasionally - but we can usually reconcile quickly',
                    'Often - different spreadsheets and systems don\'t match',
                    'Always - every report seems to tell a different story',
                ],
                'score_values' => [25, 15, 5, 0],
                'order' => 3,
            ],
            [
                'question_text' => 'When a decision doesn\'t work out, can you trace back to understand why?',
                'question_type' => 'radio',
                'is_required' => true,
                'max_points' => 25,
                'options' => [
                    'Yes - we have clear records and can analyze what went wrong',
                    'Somewhat - we can piece together most of the picture',
                    'Rarely - there\'s no clear trail of what information was used',
                    'Never - decisions happen in a black box',
                ],
                'score_values' => [25, 15, 5, 0],
                'order' => 4,
            ],
        ]);

        // =================================================================
        // SECTION 2: DATA & INFORMATION (Max 100 points)
        // =================================================================
        $section2 = QuestionnaireSection::create([
            'questionnaire_id' => $assessment->id,
            'title' => 'Data & Information',
            'description' => 'How well does information flow through your organization?',
            'scoring_category' => 'data_information',
            'max_score' => 100,
            'order' => 2,
        ]);

        $this->createScoredQuestions($section2, [
            [
                'question_text' => 'If a key employee left tomorrow, how much critical knowledge would walk out the door with them?',
                'question_type' => 'radio',
                'is_required' => true,
                'max_points' => 25,
                'options' => [
                    'Very little - everything is documented and accessible',
                    'Some - the basics are captured, but not everything',
                    'A lot - they know things nobody else does',
                    'Almost everything - we\'d be in serious trouble',
                ],
                'score_values' => [25, 15, 5, 0],
                'order' => 1,
            ],
            [
                'question_text' => 'How do your teams currently share important updates and documents?',
                'question_type' => 'radio',
                'is_required' => true,
                'max_points' => 25,
                'options' => [
                    'Through organized systems - everything has a place',
                    'Mix of tools - some organized, some scattered',
                    'Mostly email and WhatsApp - hard to find things later',
                    'Word of mouth - information gets lost frequently',
                ],
                'score_values' => [25, 15, 5, 0],
                'order' => 2,
            ],
            [
                'question_text' => 'When a new team member joins, how long does it take them to find and understand the information they need?',
                'question_type' => 'radio',
                'is_required' => true,
                'max_points' => 25,
                'options' => [
                    '1-2 weeks - we have great onboarding materials',
                    '1-2 months - they figure it out with guidance',
                    '3+ months - they have to learn by asking around',
                    'Varies wildly - depends who they know',
                ],
                'score_values' => [25, 15, 8, 0],
                'order' => 3,
            ],
            [
                'question_text' => 'How confident are you that your customer data is complete and up-to-date?',
                'question_type' => 'radio',
                'is_required' => true,
                'max_points' => 25,
                'options' => [
                    'Very confident - we actively maintain it',
                    'Somewhat confident - it\'s mostly current',
                    'Not very confident - there are gaps and duplicates',
                    'Not confident at all - it\'s a mess we avoid looking at',
                ],
                'score_values' => [25, 15, 5, 0],
                'order' => 4,
            ],
        ]);

        // =================================================================
        // SECTION 3: OPERATIONS & PROCESSES (Max 100 points)
        // =================================================================
        $section3 = QuestionnaireSection::create([
            'questionnaire_id' => $assessment->id,
            'title' => 'Operations & Processes',
            'description' => 'How efficiently does your organization run day-to-day?',
            'scoring_category' => 'operations_processes',
            'max_score' => 100,
            'order' => 3,
        ]);

        $this->createScoredQuestions($section3, [
            [
                'question_text' => 'How much time do your people spend on repetitive tasks that could be automated?',
                'question_type' => 'radio',
                'is_required' => true,
                'max_points' => 25,
                'help_text' => 'Think about data entry, report generation, approvals, etc.',
                'options' => [
                    'Very little - we\'ve automated most routine work',
                    'Some - we\'ve automated the obvious things',
                    'A lot - people do manual work that should be automated',
                    'Most of their time - we\'re drowning in busywork',
                ],
                'score_values' => [25, 15, 5, 0],
                'order' => 1,
            ],
            [
                'question_text' => 'If I asked 5 employees how a core process works, would I get the same answer?',
                'question_type' => 'radio',
                'is_required' => true,
                'max_points' => 25,
                'options' => [
                    'Yes - we have clear, documented processes',
                    'Mostly - with minor variations',
                    'Probably not - everyone has their own way',
                    'Definitely not - there\'s no standard approach',
                ],
                'score_values' => [25, 15, 5, 0],
                'order' => 2,
            ],
            [
                'question_text' => 'When something goes wrong (missed deadline, customer complaint, error), how easy is it to figure out what happened?',
                'question_type' => 'radio',
                'is_required' => true,
                'max_points' => 25,
                'options' => [
                    'Easy - we have clear logs and accountability',
                    'Somewhat easy - we can usually trace it back',
                    'Difficult - finger-pointing is common',
                    'Nearly impossible - things fall through the cracks constantly',
                ],
                'score_values' => [25, 15, 5, 0],
                'order' => 3,
            ],
            [
                'question_text' => 'How do your different systems (accounting, sales, inventory, HR) talk to each other?',
                'question_type' => 'radio',
                'is_required' => true,
                'max_points' => 25,
                'options' => [
                    'They\'re integrated - data flows automatically',
                    'Partial integration - some systems connect',
                    'Manual transfer - we export/import between them',
                    'They don\'t - everything lives in silos',
                ],
                'score_values' => [25, 15, 8, 0],
                'order' => 4,
            ],
        ]);

        // =================================================================
        // SECTION 4: TECHNOLOGY & SECURITY (Max 100 points)
        // =================================================================
        $section4 = QuestionnaireSection::create([
            'questionnaire_id' => $assessment->id,
            'title' => 'Technology & Security',
            'description' => 'How protected and prepared is your organization?',
            'scoring_category' => 'technology_security',
            'max_score' => 100,
            'order' => 4,
        ]);

        $this->createScoredQuestions($section4, [
            [
                'question_text' => 'If your main computer/server crashed right now, how long would it take to get back to normal operations?',
                'question_type' => 'radio',
                'is_required' => true,
                'max_points' => 25,
                'options' => [
                    'Hours - we have backups and a recovery plan',
                    'A day or two - we\'d figure it out',
                    'A week or more - it would be very disruptive',
                    'I don\'t know - we\'ve never tested this',
                ],
                'score_values' => [25, 15, 5, 0],
                'order' => 1,
            ],
            [
                'question_text' => 'How many different passwords and logins do your team members need to do their daily work?',
                'question_type' => 'radio',
                'is_required' => true,
                'max_points' => 25,
                'help_text' => 'Think about all the different systems, tools, and platforms.',
                'options' => [
                    '1-3 with single sign-on - it\'s streamlined',
                    '4-7 - manageable but not ideal',
                    '8-15 - password fatigue is real',
                    'Too many to count - people write them on sticky notes',
                ],
                'score_values' => [25, 18, 10, 0],
                'order' => 2,
            ],
            [
                'question_text' => 'When did your team last receive training on cybersecurity best practices?',
                'question_type' => 'radio',
                'is_required' => true,
                'max_points' => 25,
                'options' => [
                    'Within the last 6 months - we do it regularly',
                    'Within the past year - it\'s happened',
                    'Over a year ago - we should do it again',
                    'Never - we haven\'t done formal training',
                ],
                'score_values' => [25, 18, 8, 0],
                'order' => 3,
            ],
            [
                'question_text' => 'If a laptop with company data was stolen, what would happen?',
                'question_type' => 'radio',
                'is_required' => true,
                'max_points' => 25,
                'options' => [
                    'No problem - devices are encrypted and we can wipe remotely',
                    'Some concern - basic protections are in place',
                    'Major concern - sensitive data could be accessed',
                    'Disaster - everything is unprotected',
                ],
                'score_values' => [25, 15, 5, 0],
                'order' => 4,
            ],
        ]);

        // =================================================================
        // SECTION 5: TEAM & GROWTH (Max 100 points)
        // =================================================================
        $section5 = QuestionnaireSection::create([
            'questionnaire_id' => $assessment->id,
            'title' => 'Team & Growth',
            'description' => 'How positioned is your organization for sustainable growth?',
            'scoring_category' => 'team_growth',
            'max_score' => 100,
            'order' => 5,
        ]);

        $this->createScoredQuestions($section5, [
            [
                'question_text' => 'If your business doubled in size next year, would your current systems handle it?',
                'question_type' => 'radio',
                'is_required' => true,
                'max_points' => 25,
                'options' => [
                    'Yes - our infrastructure scales easily',
                    'Probably - with some adjustments',
                    'Unlikely - we\'d need major changes',
                    'No - we\'re already at capacity',
                ],
                'score_values' => [25, 15, 5, 0],
                'order' => 1,
            ],
            [
                'question_text' => 'How well do different departments communicate and collaborate?',
                'question_type' => 'radio',
                'is_required' => true,
                'max_points' => 25,
                'options' => [
                    'Excellently - information flows freely',
                    'Well - with occasional disconnects',
                    'Poorly - departments are siloed',
                    'Barely - it\'s like different companies',
                ],
                'score_values' => [25, 18, 8, 0],
                'order' => 2,
            ],
            [
                'question_text' => 'When you identify an opportunity or threat, how quickly can your organization respond?',
                'question_type' => 'radio',
                'is_required' => true,
                'max_points' => 25,
                'options' => [
                    'Days - we\'re agile and responsive',
                    'Weeks - we move reasonably fast',
                    'Months - change takes time here',
                    'We often miss opportunities entirely',
                ],
                'score_values' => [25, 18, 8, 0],
                'order' => 3,
            ],
            [
                'question_text' => 'What\'s the biggest challenge preventing your organization from reaching its goals right now?',
                'question_type' => 'textarea',
                'is_required' => false,
                'max_points' => 0,
                'help_text' => 'Be specific - this helps us provide more relevant recommendations.',
                'options' => null,
                'score_values' => null,
                'order' => 4,
            ],
            [
                'question_text' => 'Would you be interested in a complimentary consultation to discuss your assessment results?',
                'question_type' => 'yes_no',
                'is_required' => true,
                'max_points' => 0,
                'options' => null,
                'score_values' => null,
                'order' => 5,
            ],
        ]);

        $this->command->info('Business Intelligence Assessment seeded successfully!');
        $this->command->info("Created: {$assessment->title}");
        $this->command->info("URL: /questionnaire/{$assessment->slug}");
        $this->command->info("Sections: 5 | Max Total Score: 500 points");
    }

    /**
     * Create scored questions for a section.
     */
    private function createScoredQuestions(QuestionnaireSection $section, array $questions): void
    {
        foreach ($questions as $questionData) {
            Question::create([
                'questionnaire_section_id' => $section->id,
                'question_text' => $questionData['question_text'],
                'question_type' => $questionData['question_type'],
                'is_required' => $questionData['is_required'],
                'max_points' => $questionData['max_points'],
                'help_text' => $questionData['help_text'] ?? null,
                'options' => $questionData['options'],
                'score_values' => $questionData['score_values'],
                'order' => $questionData['order'],
            ]);
        }
    }
}
