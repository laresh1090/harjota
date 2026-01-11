<?php

namespace Database\Seeders;

use App\Models\Questionnaire;
use App\Models\QuestionnaireSection;
use App\Models\Question;
use Illuminate\Database\Seeder;

class EISQuestionnaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Centralized Business Intelligence Survey - 7 sections, 30 questions
     */
    public function run(): void
    {
        // Create the questionnaire
        $questionnaire = Questionnaire::create([
            'title' => 'Centralized Business Intelligence Survey',
            'slug' => 'centralized-business-intelligence-survey',
            'description' => 'This comprehensive survey helps us understand your organization\'s current state, challenges, and opportunities. Your responses will inform our tailored recommendations for centralized business intelligence improvements.',
            'introduction' => 'Welcome to the Harjota Centralized Business Intelligence Survey. This assessment takes approximately 15-20 minutes to complete. Your responses are confidential and will be used to provide personalized insights for your organization.',
            'completion_message' => 'Thank you for completing the Centralized Business Intelligence Survey! Our team will analyze your responses and prepare a customized institutional intelligence report. You will receive this report within 3-5 business days at the email address you provided.',
            'is_active' => true,
            'collect_contact_info' => true,
            'published_at' => now(),
        ]);

        // Section 1: Organization Profile
        $section1 = QuestionnaireSection::create([
            'questionnaire_id' => $questionnaire->id,
            'title' => 'Organization Profile',
            'description' => 'Tell us about your organization to help us understand your context.',
            'order' => 1,
        ]);

        $this->createQuestions($section1, [
            [
                'question_text' => 'What is the name of your organization?',
                'question_type' => 'text',
                'is_required' => true,
                'help_text' => 'Enter the official name of your company or organization.',
                'order' => 1,
            ],
            [
                'question_text' => 'Which industry does your organization primarily operate in?',
                'question_type' => 'select',
                'is_required' => true,
                'options' => [
                    'option_1' => 'Technology & Software',
                    'option_2' => 'Healthcare & Pharmaceuticals',
                    'option_3' => 'Financial Services & Banking',
                    'option_4' => 'Education & Training',
                    'option_5' => 'Manufacturing & Production',
                    'option_6' => 'Retail & E-commerce',
                    'option_7' => 'Professional Services',
                    'option_8' => 'Non-profit & NGO',
                    'option_9' => 'Government & Public Sector',
                    'option_10' => 'Other',
                ],
                'order' => 2,
            ],
            [
                'question_text' => 'How many employees does your organization have?',
                'question_type' => 'radio',
                'is_required' => true,
                'options' => [
                    'option_1' => '1-10 employees',
                    'option_2' => '11-50 employees',
                    'option_3' => '51-200 employees',
                    'option_4' => '201-500 employees',
                    'option_5' => '500+ employees',
                ],
                'order' => 3,
            ],
            [
                'question_text' => 'How long has your organization been in operation?',
                'question_type' => 'radio',
                'is_required' => true,
                'options' => [
                    'option_1' => 'Less than 1 year',
                    'option_2' => '1-3 years',
                    'option_3' => '3-5 years',
                    'option_4' => '5-10 years',
                    'option_5' => 'More than 10 years',
                ],
                'order' => 4,
            ],
        ]);

        // Section 2: Current Systems & Processes
        $section2 = QuestionnaireSection::create([
            'questionnaire_id' => $questionnaire->id,
            'title' => 'Current Systems & Processes',
            'description' => 'Help us understand your existing operational infrastructure.',
            'order' => 2,
        ]);

        $this->createQuestions($section2, [
            [
                'question_text' => 'Does your organization have documented standard operating procedures (SOPs)?',
                'question_type' => 'yes_no',
                'is_required' => true,
                'order' => 1,
            ],
            [
                'question_text' => 'Which of the following systems does your organization currently use?',
                'question_type' => 'checkbox',
                'is_required' => false,
                'options' => [
                    'option_1' => 'Customer Relationship Management (CRM)',
                    'option_2' => 'Enterprise Resource Planning (ERP)',
                    'option_3' => 'Human Resource Management System (HRMS)',
                    'option_4' => 'Project Management Tools',
                    'option_5' => 'Accounting/Financial Software',
                    'option_6' => 'Business Intelligence/Analytics',
                    'option_7' => 'Document Management System',
                    'option_8' => 'None of the above',
                ],
                'order' => 2,
            ],
            [
                'question_text' => 'How would you rate the integration between your current systems?',
                'question_type' => 'radio',
                'is_required' => true,
                'options' => [
                    'option_1' => 'Fully integrated - All systems communicate seamlessly',
                    'option_2' => 'Partially integrated - Some systems are connected',
                    'option_3' => 'Minimal integration - Systems mostly operate independently',
                    'option_4' => 'No integration - All systems are siloed',
                    'option_5' => 'Not applicable - We use very few systems',
                ],
                'order' => 3,
            ],
            [
                'question_text' => 'What is your biggest frustration with your current operational systems?',
                'question_type' => 'textarea',
                'is_required' => false,
                'help_text' => 'Please describe any pain points or inefficiencies you experience.',
                'order' => 4,
            ],
        ]);

        // Section 3: Decision Making & Intelligence
        $section3 = QuestionnaireSection::create([
            'questionnaire_id' => $questionnaire->id,
            'title' => 'Decision Making & Intelligence',
            'description' => 'Understanding how decisions are made in your organization.',
            'order' => 3,
        ]);

        $this->createQuestions($section3, [
            [
                'question_text' => 'How are major business decisions typically made in your organization?',
                'question_type' => 'radio',
                'is_required' => true,
                'options' => [
                    'option_1' => 'Based on comprehensive data analysis',
                    'option_2' => 'Mix of data and intuition',
                    'option_3' => 'Primarily based on experience and intuition',
                    'option_4' => 'Varies significantly depending on the decision',
                ],
                'order' => 1,
            ],
            [
                'question_text' => 'Does your organization have access to real-time business metrics and dashboards?',
                'question_type' => 'yes_no',
                'is_required' => true,
                'order' => 2,
            ],
            [
                'question_text' => 'How confident are you in the accuracy of your organization\'s data?',
                'question_type' => 'radio',
                'is_required' => true,
                'options' => [
                    'option_1' => 'Very confident - Data is regularly audited and validated',
                    'option_2' => 'Somewhat confident - Occasional discrepancies exist',
                    'option_3' => 'Not very confident - Frequent data quality issues',
                    'option_4' => 'Not confident at all - Data reliability is a major concern',
                ],
                'order' => 3,
            ],
            [
                'question_text' => 'What key performance indicators (KPIs) does your organization track regularly?',
                'question_type' => 'textarea',
                'is_required' => false,
                'help_text' => 'List the main metrics you monitor for business performance.',
                'order' => 4,
            ],
            [
                'question_text' => 'How long does it typically take to gather information needed for strategic decisions?',
                'question_type' => 'radio',
                'is_required' => true,
                'options' => [
                    'option_1' => 'Immediate - Information is readily available',
                    'option_2' => 'Hours - Can be gathered within a day',
                    'option_3' => 'Days - Takes 2-5 business days',
                    'option_4' => 'Weeks - Significant effort required',
                    'option_5' => 'Often unable to get needed information',
                ],
                'order' => 5,
            ],
        ]);

        // Section 4: Digital Infrastructure
        $section4 = QuestionnaireSection::create([
            'questionnaire_id' => $questionnaire->id,
            'title' => 'Digital Infrastructure',
            'description' => 'Assess your organization\'s technology foundation.',
            'order' => 4,
        ]);

        $this->createQuestions($section4, [
            [
                'question_text' => 'Does your organization have a dedicated IT team or personnel?',
                'question_type' => 'radio',
                'is_required' => true,
                'options' => [
                    'option_1' => 'Yes, full-time internal IT department',
                    'option_2' => 'Yes, dedicated IT staff (1-2 people)',
                    'option_3' => 'We outsource IT to external providers',
                    'option_4' => 'No dedicated IT - handled ad-hoc',
                ],
                'order' => 1,
            ],
            [
                'question_text' => 'How would you rate your organization\'s cybersecurity measures?',
                'question_type' => 'radio',
                'is_required' => true,
                'options' => [
                    'option_1' => 'Excellent - Comprehensive security protocols in place',
                    'option_2' => 'Good - Basic security measures implemented',
                    'option_3' => 'Fair - Some security, but gaps exist',
                    'option_4' => 'Poor - Security is a concern we need to address',
                    'option_5' => 'Unknown - Not sure of our security status',
                ],
                'order' => 2,
            ],
            [
                'question_text' => 'Does your organization have a disaster recovery and business continuity plan?',
                'question_type' => 'yes_no',
                'is_required' => true,
                'order' => 3,
            ],
            [
                'question_text' => 'What percentage of your operations could continue if your primary systems went down?',
                'question_type' => 'radio',
                'is_required' => true,
                'options' => [
                    'option_1' => '0-25% - We would be severely impacted',
                    'option_2' => '26-50% - Significant disruption expected',
                    'option_3' => '51-75% - Some operations could continue',
                    'option_4' => '76-100% - We have strong redundancy',
                ],
                'order' => 4,
            ],
            [
                'question_text' => 'Is your organization currently using or considering cloud-based solutions?',
                'question_type' => 'radio',
                'is_required' => true,
                'options' => [
                    'option_1' => 'Fully cloud-based',
                    'option_2' => 'Hybrid (mix of cloud and on-premise)',
                    'option_3' => 'Primarily on-premise, considering cloud',
                    'option_4' => 'Fully on-premise, not considering cloud',
                ],
                'order' => 5,
            ],
        ]);

        // Section 5: Team & Communication
        $section5 = QuestionnaireSection::create([
            'questionnaire_id' => $questionnaire->id,
            'title' => 'Team & Communication',
            'description' => 'Evaluate your organizational communication and collaboration.',
            'order' => 5,
        ]);

        $this->createQuestions($section5, [
            [
                'question_text' => 'How would you rate internal communication within your organization?',
                'question_type' => 'radio',
                'is_required' => true,
                'options' => [
                    'option_1' => 'Excellent - Information flows freely and efficiently',
                    'option_2' => 'Good - Generally effective with occasional gaps',
                    'option_3' => 'Fair - Communication challenges exist',
                    'option_4' => 'Poor - Significant communication breakdowns occur',
                ],
                'order' => 1,
            ],
            [
                'question_text' => 'Which communication tools does your organization use?',
                'question_type' => 'checkbox',
                'is_required' => false,
                'options' => [
                    'option_1' => 'Email',
                    'option_2' => 'Slack/Microsoft Teams/Similar',
                    'option_3' => 'Video Conferencing (Zoom, Meet, etc.)',
                    'option_4' => 'WhatsApp/Telegram Groups',
                    'option_5' => 'Intranet/Internal Portal',
                    'option_6' => 'Project Management Tools',
                ],
                'order' => 2,
            ],
            [
                'question_text' => 'Does your organization have a formal knowledge management or documentation system?',
                'question_type' => 'yes_no',
                'is_required' => true,
                'order' => 3,
            ],
            [
                'question_text' => 'How easy is it for new employees to access the information they need to do their jobs?',
                'question_type' => 'radio',
                'is_required' => true,
                'options' => [
                    'option_1' => 'Very easy - Comprehensive onboarding and documentation',
                    'option_2' => 'Somewhat easy - Basic resources available',
                    'option_3' => 'Difficult - Heavy reliance on asking colleagues',
                    'option_4' => 'Very difficult - Tribal knowledge dominates',
                ],
                'order' => 4,
            ],
        ]);

        // Section 6: Growth & Challenges
        $section6 = QuestionnaireSection::create([
            'questionnaire_id' => $questionnaire->id,
            'title' => 'Growth & Challenges',
            'description' => 'Share your organization\'s growth aspirations and current obstacles.',
            'order' => 6,
        ]);

        $this->createQuestions($section6, [
            [
                'question_text' => 'What are your organization\'s primary growth objectives for the next 12 months?',
                'question_type' => 'checkbox',
                'is_required' => true,
                'options' => [
                    'option_1' => 'Increase revenue',
                    'option_2' => 'Expand to new markets',
                    'option_3' => 'Launch new products/services',
                    'option_4' => 'Improve operational efficiency',
                    'option_5' => 'Enhance customer experience',
                    'option_6' => 'Digital transformation',
                    'option_7' => 'Talent acquisition and development',
                ],
                'order' => 1,
            ],
            [
                'question_text' => 'What is the biggest challenge preventing your organization from achieving its goals?',
                'question_type' => 'textarea',
                'is_required' => true,
                'help_text' => 'Please describe your most significant organizational challenge.',
                'order' => 2,
            ],
            [
                'question_text' => 'Has your organization previously engaged consultants or advisory services?',
                'question_type' => 'radio',
                'is_required' => true,
                'options' => [
                    'option_1' => 'Yes, with excellent results',
                    'option_2' => 'Yes, with mixed results',
                    'option_3' => 'Yes, but it didn\'t meet expectations',
                    'option_4' => 'No, but open to it',
                    'option_5' => 'No, and not currently interested',
                ],
                'order' => 3,
            ],
            [
                'question_text' => 'What is your estimated annual budget for technology and systems improvement?',
                'question_type' => 'radio',
                'is_required' => false,
                'options' => [
                    'option_1' => 'Under ₦1 million',
                    'option_2' => '₦1-5 million',
                    'option_3' => '₦5-20 million',
                    'option_4' => '₦20-50 million',
                    'option_5' => 'Over ₦50 million',
                    'option_6' => 'No dedicated budget',
                ],
                'order' => 4,
            ],
        ]);

        // Section 7: Next Steps
        $section7 = QuestionnaireSection::create([
            'questionnaire_id' => $questionnaire->id,
            'title' => 'Next Steps',
            'description' => 'Help us understand how we can best serve you.',
            'order' => 7,
        ]);

        $this->createQuestions($section7, [
            [
                'question_text' => 'Which Harjota services are you most interested in learning about?',
                'question_type' => 'checkbox',
                'is_required' => true,
                'options' => [
                    'option_1' => 'Institutional Intelligence Audit',
                    'option_2' => 'Systems & Decision Architecture',
                    'option_3' => 'Digital Infrastructure Development',
                    'option_4' => 'Business Intelligence & AI Enablement',
                    'option_5' => 'Advisory & Fractional Leadership',
                    'option_6' => 'Not sure - Need guidance',
                ],
                'order' => 1,
            ],
            [
                'question_text' => 'How soon would you like to begin working on these improvements?',
                'question_type' => 'radio',
                'is_required' => true,
                'options' => [
                    'option_1' => 'Immediately - Ready to start',
                    'option_2' => 'Within 1-3 months',
                    'option_3' => 'Within 3-6 months',
                    'option_4' => 'Just exploring options for now',
                ],
                'order' => 2,
            ],
            [
                'question_text' => 'Would you like to schedule a free 30-minute consultation to discuss your needs?',
                'question_type' => 'yes_no',
                'is_required' => true,
                'order' => 3,
            ],
            [
                'question_text' => 'Is there anything else you would like us to know about your organization or needs?',
                'question_type' => 'textarea',
                'is_required' => false,
                'help_text' => 'Any additional context or specific questions you have.',
                'order' => 4,
            ],
        ]);

        $this->command->info('EIS Questionnaire seeded successfully!');
        $this->command->info("Created: {$questionnaire->title}");
        $this->command->info("Sections: 7 | Questions: 34");
        $this->command->info("Access at: /questionnaire/{$questionnaire->slug}");
    }

    /**
     * Create questions for a section.
     */
    private function createQuestions(QuestionnaireSection $section, array $questions): void
    {
        foreach ($questions as $questionData) {
            Question::create(array_merge($questionData, [
                'questionnaire_section_id' => $section->id,
            ]));
        }
    }
}
