<?php

namespace Database\Factories\Journey;

use App\Models\Journey\JourneyActivityType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class JourneyActivityTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JourneyActivityType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name =  Arr::random(JourneyActivityType::UCAT_ACTIVITY_TYPES);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'order' => rand(1, 100),
            'published' => true
        ];
    }
}
