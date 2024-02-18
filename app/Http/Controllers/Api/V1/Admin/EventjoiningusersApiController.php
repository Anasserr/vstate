<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventjoininguserRequest;
use App\Http\Requests\UpdateEventjoininguserRequest;
use App\Http\Resources\Admin\EventjoininguserResource;
use App\Models\Eventjoininguser;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventjoiningusersApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('eventjoininguser_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EventjoininguserResource(Eventjoininguser::with(['event', 'user', 'event_status'])->get());
    }

    public function store(StoreEventjoininguserRequest $request)
    {
        $eventjoininguser = Eventjoininguser::create($request->all());

        return (new EventjoininguserResource($eventjoininguser))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Eventjoininguser $eventjoininguser)
    {
        abort_if(Gate::denies('eventjoininguser_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EventjoininguserResource($eventjoininguser->load(['event', 'user', 'event_status']));
    }

    public function update(UpdateEventjoininguserRequest $request, Eventjoininguser $eventjoininguser)
    {
        $eventjoininguser->update($request->all());

        return (new EventjoininguserResource($eventjoininguser))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Eventjoininguser $eventjoininguser)
    {
        abort_if(Gate::denies('eventjoininguser_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventjoininguser->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
