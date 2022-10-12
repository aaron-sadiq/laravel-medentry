<?php

namespace App\Http\Requests;

use App\Http\Requests\MedEntryRequest;
use App\Models\Journey\UserJourney;
use Illuminate\Validation\Rule;

class CreateActivityUserJourneyRequest extends MedEntryRequest
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
                'exists:journey_activity_types,id',
                Rule::unique('user_journey')->where(function ($query) {
                    return $query->where('user_id', auth()->user()->id)
                        ->where('journey_activity_type_id', $this->journey_activity_type_id);
                }),
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
