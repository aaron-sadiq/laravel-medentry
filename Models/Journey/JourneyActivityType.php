<?php

namespace App\Models\Journey;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JourneyActivityType extends Model
{
    use HasFactory, SoftDeletes;

    const TYPE_UCAT_REGISTER = 'ucat_register';
    const TYPE_UCAT_TRAINING = 'ucat_training';

    const TYPES = [
        self::TYPE_UCAT_REGISTER,
        self::TYPE_UCAT_TRAINING
    ];


    const UCAT_ACTIVITY_RESEARCH_ENTRY_REQUIREMENT = 'Research Entry Requirements';
    const UCAT_ACTIVITY_EXTRA_EXPERIENCE = 'Extra Experiences';
    const UCAT_ACTIVITY_INTRO_VIDEO = 'Intro Video with Ray';
    const UCAT_ACTIVITY_DIAGNOSTIC_EXAM = 'Diagnostic Exam';
    const UCAT_ACTIVITY_PREPARE_UCAT = 'How to Prepare for UCAT';
    const UCAT_ACTIVITY_ESSENTIAL_UCAT_SKILLS = 'Essential UCAT Skills';
    const UCAT_ACTIVITY_SITUATIONAL_JUDGEMENT = 'Situational Judgement';
    const UCAT_ACTIVITY_ABSTRACT_REASONING = 'Abstract Reasoning';
    const UCAT_ACTIVITY_QUANTITATIVE_REASONING = 'Quantitative Reasoning';
    const UCAT_ACTIVITY_DECISION_MAKING = 'Decision Making';
    const UCAT_ACTIVITY_VERBAL_REASONING = 'Verbal Reasoning';
    const UCAT_ACTIVITY_MOCK_EXAM = 'Mock Exam';
    const UCAT_ACTIVITY_REVIEW = 'Review';
    const UCAT_ACTIVITY_IDENTIFY_WEAKNESS = 'Identify Weaknesses';
    const UCAT_ACTIVITY_TRAIN = 'Train';
    const UCAT_ACTIVITY_PRACTICE = 'Practice';
    const UCAT_ACTIVITY_SUBTEST = 'Subtests';
    const UCAT_ACTIVITY_SKILL_TRAINER = 'Skill Trainers';
    const UCAT_ACTIVITY_UCAT_REGISTER = 'Register for UCAT';
    const UCAT_ACTIVITY_LEAD_UP = 'Lead Up to UCAT and Test Day';
    const UCAT_ACTIVITY_TEST_DATE = 'UCAT Test Date';
    const UCAT_ACTIVITY_EXPERIENCE_GAP = 'Identify and Correct gaps in Experience';
    const UCAT_ACTIVITY_APPLY_TAC = 'Apply to TACs/Create Written Application';
    const UCAT_ACTIVITY_PREPARE_INTERVIEW  = 'Prepare for Interview';
    const UCAT_ACTIVITY_UNIVERSITY_ADMISISON = 'Get Admitted into University';

    const UCAT_ACTIVITY_TYPES = [
        self::UCAT_ACTIVITY_RESEARCH_ENTRY_REQUIREMENT,
        self::UCAT_ACTIVITY_EXTRA_EXPERIENCE,
        self::UCAT_ACTIVITY_INTRO_VIDEO,
        self::UCAT_ACTIVITY_DIAGNOSTIC_EXAM,
        self::UCAT_ACTIVITY_PREPARE_UCAT,
        self::UCAT_ACTIVITY_ESSENTIAL_UCAT_SKILLS,
        self::UCAT_ACTIVITY_SITUATIONAL_JUDGEMENT,
        self::UCAT_ACTIVITY_ABSTRACT_REASONING,
        self::UCAT_ACTIVITY_QUANTITATIVE_REASONING,
        self::UCAT_ACTIVITY_DECISION_MAKING,
        self::UCAT_ACTIVITY_VERBAL_REASONING,
        self::UCAT_ACTIVITY_MOCK_EXAM,
        self::UCAT_ACTIVITY_REVIEW,
        self::UCAT_ACTIVITY_IDENTIFY_WEAKNESS,
        self::UCAT_ACTIVITY_TRAIN,
        self::UCAT_ACTIVITY_PRACTICE,
        self::UCAT_ACTIVITY_SUBTEST,
        self::UCAT_ACTIVITY_SKILL_TRAINER,
        self::UCAT_ACTIVITY_UCAT_REGISTER,
        self::UCAT_ACTIVITY_LEAD_UP,
        self::UCAT_ACTIVITY_TEST_DATE,
        self::UCAT_ACTIVITY_PREPARE_INTERVIEW,
        self::UCAT_ACTIVITY_APPLY_TAC,
        self::UCAT_ACTIVITY_EXPERIENCE_GAP,
        self::UCAT_ACTIVITY_UNIVERSITY_ADMISISON
    ];

    protected $fillable = ['name', 'order', 'published', 'type', 'slug'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userJourney()
    {
        return $this->belongsTo(UserJourney::class);
    }
}
