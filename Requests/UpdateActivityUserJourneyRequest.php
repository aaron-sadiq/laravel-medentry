<?php

namespace App\Http\Requests;

use App\Http\Requests\MedEntryRequest;
use App\Models\Journey\UserJourney;
use Illuminate\Validation\Rule;

class UpdateActivityUserJourneyRequest extends MedEntryRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'journey_activity_type_id' => [
                'required',
                'integer',
                Rule::exists('journey_activity_types', 'id')->where(function ($query) {
                    return $query->where('id', $this->journey_activity_type_id);
                }),
                Rule::exists('user_journey', 'journey_activity_type_id')->where('user_id', auth()->user()->id)
            ],
            'status' => [
                'required',
                Rule::in(UserJourney::ACTIVITY_STATUSES),
            ],
            'start_date' => 'sometimes|required|date',
            'end_date' => 'sometimes|required|date',
            'percentage' => 'sometimes|required|integer'
        ];
    }
}
