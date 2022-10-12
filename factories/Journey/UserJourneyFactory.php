<?php

namespace Database\Factories\Journey;

use App\Models\Journey\JourneyActivityType;
use App\Models\MedEntryCore\user;
use App\Models\Journey\UserJourney;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class UserJourneyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserJourney::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = Arr::random(UserJourney::ACTIVITY_STATUSES);
        $startDate = Carbon::now()->subMonth();
        $endDate = Carbon::now();

        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'journey_activity_type_id' => function () {
                return JourneyActivityType::factory()->create()->id;
            },
            'status' => $status,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'percentage' => rand(10, 100)
        ];
    }
}
