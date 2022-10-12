<?php

namespace App\Models\Journey;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserJourney extends Model
{
    use HasFactory;

    const ACTIVITY_STATUS_COMPLETED = 'completed';
    const ACTIVITY_STATUS_INCOMPLETED = 'incomplete';
    const ACTIVITY_STATUS_PARTIAL_COMPLETED = 'partial-complete';

    const ACTIVITY_STATUSES = [
        self::ACTIVITY_STATUS_COMPLETED,
        self::ACTIVITY_STATUS_INCOMPLETED,
        self::ACTIVITY_STATUS_PARTIAL_COMPLETED
    ];

    protected $table = 'user_journey';

    protected $fillable = [
        'user_id', 'journey_activity_type_id', 'status', 'start_date', 'end_date', 'percentage'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function journeyActivityTypes()
    {
        return $this->hasMany(JourneyActivityType::class, 'id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function publishedJourneyActivityTypes()
    {
        return $this->hasMany(JourneyActivityType::class, 'id')->where('published', true);
    }
}
