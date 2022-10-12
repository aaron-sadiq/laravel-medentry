<?php

namespace App\Http\Resources\UserJourney;

use App\Http\Resources\JourneyActivityType\JourneyActivityTypeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserJourneyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'journey_activity_type_id' => $this->journey_activity_type_id,
            'activity' => JourneyActivityTypeResource::collection($this->journeyActivityTypes),
            'status' => $this->status,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'percentage' => $this->percentage ?? 0
        ];
    }
}
