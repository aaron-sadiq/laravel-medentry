<?php

namespace Database\Seeders;

use App\Models\Journey\JourneyActivityType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JourneyActivityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $journeyActivityTypes =  [
            [
                'name' => 'Research Entry Requirements',
                'slug' =>  Str::slug('Research Entry Requirements'),
                'order' => '1',
                'published' => true,
                'type' => 'ucat_training'
            ],
            [
                'name' => 'Extra Experiences',
                'slug' =>  Str::slug('Extra Experiences'),
                'order' => '2',
                'published' => true,
                'type' => 'ucat_training'
            ],
            [
                'name' => 'Intro Video with Ray',
                'slug' =>  Str::slug('Intro Video with Ray'),
                'order' => '3',
                'published' => true,
                'type' => 'ucat_training'
            ],
            [
                'name' => 'Diagnostic Exam',
                'slug' => Str::slug('Diagnostic Exam'),
                'order' => '4',
                'published' => true,
                'type' => 'ucat_training'
            ],
            [
                'name' => 'How to Prepare for UCAT',
                'slug' => Str::slug('How to Prepare for UCAT'),
                'order' => '5',
                'published' => true,
                'type' => 'ucat_training'
            ],
            [
                'name' => 'Essential UCAT Skills',
                'slug' => Str::slug('Essential UCAT Skills'),
                'order' => '6',
                'published' => true,
                'type' => 'ucat_training'
            ],
            [
                'name' => 'Situational Judgement',
                'slug' => Str::slug('Situational Judgement'),
                'order' => '7',
                'published' => true,
                'type' => 'ucat_training'
            ],
            [
                'name' => 'Abstract Reasoning',
                'slug' => Str::slug('Abstract Reasoning'),
                'order' => '8',
                'published' => true,
                'type' => 'ucat_training'
            ],
            [
                'name' => 'Quantitative Reasoning',
                'slug' => Str::slug('Quantitative Reasoning'),
                'order' => '9',
                'published' => true,
                'type' => 'ucat_training'
            ],
            [
                'name' => 'Decision Making',
                'slug' => Str::slug('Decision Making'),
                'order' => '10',
                'published' => true,
                'type' => 'ucat_training'
            ],
            [
                'name' => 'Verbal Reasoning',
                'slug' => Str::slug('Verbal Reasoning'),
                'order' => '11',
                'published' => true,
                'type' => 'ucat_training'
            ],
            [
                'name' => 'Mock Exam',
                'slug' => Str::slug('Mock Exam'),
                'order' => '12',
                'published' => true,
                'type' => 'ucat_training'
            ],
            [
                'name' => 'Review',
                'slug' => Str::slug('Review'),
                'order' => '13',
                'published' => true,
                'type' => 'ucat_training'
            ],
            [
                'name' => 'Identify Weaknesses',
                'slug' => Str::slug('Identify Weaknesses'),
                'order' => '14',
                'published' => true,
                'type' => 'ucat_training'
            ],
            [
                'name' => 'Train',
                'slug' => Str::slug('Train'),
                'order' => '15',
                'published' => true,
                'type' => 'ucat_training'
            ],
            [
                'name' => 'Practice',
                'slug' => Str::slug('Practice'),
                'order' => '16',
                'published' => true,
                'type' => 'ucat_training'
            ],
            [
                'name' => 'Subtests',
                'slug' => Str::slug('Subtests'),
                'order' => '17',
                'published' => true,
                'type' => 'ucat_training'
            ],
            [
                'name' => 'Skill Trainers',
                'slug' => Str::slug('Skill Trainers'),
                'order' => '18',
                'published' => true,
                'type' => 'ucat_training'
            ],
            [
                'name' => 'Register for UCAT',
                'slug' => Str::slug('Register for UCAT'),
                'order' => '19',
                'published' => true,
                'type' => 'ucat_register'
            ],
            [
                'name' => 'Lead Up to UCAT and Test Day',
                'slug' => Str::slug('Lead Up to UCAT and Test Day'),
                'order' => '20',
                'published' => true,
                'type' => 'ucat_register'
            ],
            [
                'name' => 'UCAT Test Date',
                'slug' => Str::slug('UCAT Test Date'),
                'order' => '21',
                'published' => true,
                'type' => 'ucat_register'
            ],
            [
                'name' => 'Identify and Correct gaps in Experience',
                'slug' => Str::slug('Identify and Correct gaps in Experience'),
                'order' => '22',
                'published' => true,
                'type' => 'ucat_register'
            ],
            [
                'name' => 'Apply to TACs/Create Written Application',
                'slug' => Str::slug('Apply to TACs/Create Written Application'),
                'order' => '23',
                'published' => true,
                'type' => 'ucat_register'
            ],
            [
                'name' => 'Prepare for Interview',
                'slug' => Str::slug('Prepare for Interview'),
                'order' => '24',
                'published' => true,
                'type' => 'ucat_register'
            ],
            [
                'name' => 'Get Admitted into University',
                'slug' => Str::slug('Get Admitted into University'),
                'order' => '25',
                'published' => true,
                'type' => 'ucat_register'

            ],
        ];
        JourneyActivityType::insert($journeyActivityTypes);
    }
}
