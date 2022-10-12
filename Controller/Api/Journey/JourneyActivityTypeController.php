<?php

namespace App\Http\Controllers\Api\Journey;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateActivityTypeRequest;
use App\Http\Requests\UpdateActivityTypeRequest;
use App\Http\Resources\JourneyActivityType\JourneyActivityTypeResource;
use App\Models\Journey\JourneyActivityType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class JourneyActivityTypeController extends Controller
{
    /**
     * @param Request $request
     * @return  \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $journeyActivityTypes = JourneyActivityType::wherePublished(true)->orderBy('order')->paginate($request->records_per_page ?? 50);
        return $this->response(
            ['journey_activity_types' => JourneyActivityTypeResource::collection($journeyActivityTypes)],
            'Journey Activity Types',
            Response::HTTP_OK,
            $journeyActivityTypes
        );
    }

    /**
     * @param CreateActivityTypeRequest $request
     * @return  \Illuminate\Http\JsonResponse
     */
    public function store(CreateActivityTypeRequest $request)
    {
        $activityType = $request->all();
        JourneyActivityType::where('order', '>=', $request->order)->increment('order');
        $activityType['slug'] = Str::slug($request->name);
        $newActivityType = JourneyActivityType::create($activityType);
        return $this->response(
            ['created_activity_type' => new JourneyActivityTypeResource($newActivityType)],
            'Activity Type Created Successfully',
            Response::HTTP_CREATED
        );
    }

    /**
     * @param UpdateActivityTypeRequest $request
     * @return  \Illuminate\Http\JsonResponse
     */
    public function update(JourneyActivityType $type, UpdateActivityTypeRequest $request)
    {
        $activityType = $request->all();
        $activityType['slug'] = Str::slug($request->name);
        JourneyActivityType::where('order', '>=', $request->order)->increment('order');
        $type->update($activityType);
        return $this->response(
            ['updated_journey_activity_type' => new JourneyActivityTypeResource($type)],
            'Journey Activity Type Updated Successfully',
            Response::HTTP_OK
        );
    }

    /**
     * @param UpdateActivityTypeRequest $request
     * @return  \Illuminate\Http\JsonResponse
     */
    public function delete(JourneyActivityType $type)
    {
        JourneyActivityType::where('order', '>=', $type->order)->decrement('order');
        $type->delete();
        return $this->response(
            [],
            'Journey Activity Type Deleted Successfully',
            Response::HTTP_OK
        );
    }
}
