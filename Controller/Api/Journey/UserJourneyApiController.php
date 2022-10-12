<?php

namespace App\Http\Controllers\Api\Journey;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateActivityUserJourneyRequest;
use App\Http\Requests\UpdateActivityUserJourneyRequest;
use App\Http\Resources\UserJourney\UserJourneyResource;
use App\Models\Journey\JourneyActivityType;
use App\Models\Journey\UserJourney;
use App\Models\Question\Section;
use App\Traits\JourneyActivityCalculationTrait;
use Symfony\Component\HttpFoundation\Response;

class UserJourneyApiController extends Controller
{
    use JourneyActivityCalculationTrait;
    /**
     * @return  \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $userJourney = UserJourney::with(['journeyActivityTypes' => function ($query) {
            $query->wherePublished(true)->orderBy('order');
        }])
            ->where('user_id', auth()->user()->id)
            ->get();

        return $this->response(
            ['user_journey_data' => UserJourneyResource::collection($userJourney)],
            'User Journey Data',
            Response::HTTP_OK
        );
    }

    /**
     * @return  \Illuminate\Http\JsonResponse
     */
    public function resetUcatRegistration()
    {
        UserJourney::where('user_id', auth()->user()->id)
            ->whereIn('journey_activity_type_id', JourneyActivityType::whereIn('type', [JourneyActivityType::TYPE_UCAT_REGISTER])->select('id'))
            ->update(['status' => UserJourney::ACTIVITY_STATUS_INCOMPLETED]);
        return $this->response(
            [],
            'UCAT Registration Reset Successfully',
            Response::HTTP_OK
        );
    }

    /**
     * @param CreateActivityUserJourneyRequest $request
     * @return  \Illuminate\Http\JsonResponse
     */
    public function storeActivity(CreateActivityUserJourneyRequest $request)
    {
        $activity = $request->all();
        $activity['user_id'] = auth()->user()->id;
        $userJourney = UserJourney::create($activity);
        return $this->response(
            ['created_activity' => new UserJourneyResource($userJourney)],
            'Activity Created Successfully',
            Response::HTTP_CREATED
        );
    }

    /**
     * @param UpdateActivityUserJourneyRequest $request
     * @return  \Illuminate\Http\JsonResponse
     */
    public function updateActivity(UpdateActivityUserJourneyRequest $request)
    {
        $userJourney = UserJourney::where('user_id', auth()->user()->id)
            ->where('journey_activity_type_id', $request->journey_activity_type_id)
            ->first();
        $userJourney->update($request->all());
        return $this->response(
            ['updated_activity' => new UserJourneyResource($userJourney)],
            'Activity Updated Successfully',
            Response::HTTP_CREATED
        );
    }

    /**
     * @return  \Illuminate\Http\JsonResponse
     */
    public function setUserActivities()
    {
        $activityTypes = JourneyActivityType::select('id')->get();
        $setUserActivitiesToSave = $activityTypes->map(function ($activityType) {
            return
                [
                    'user_id' => auth()->user()->id,
                    'journey_activity_type_id' => $activityType->id,
                    'status' =>  UserJourney::ACTIVITY_STATUS_INCOMPLETED
                ];
        })->all();

        UserJourney::insert($setUserActivitiesToSave);
        return $this->response(
            [],
            'Created User Journey Successfully',
            Response::HTTP_OK
        );
    }

    /**
     * @return  \Illuminate\Http\JsonResponse
     */
    public function calculateCompletionPercentage(Section $section)
    {
        $result = $this->sectionCalculateCompletionPercentage($section);
        return $this->response(
            ['completion_percentage' => $result],
            'Completion Percentage',
            Response::HTTP_OK
        );
    }
}
