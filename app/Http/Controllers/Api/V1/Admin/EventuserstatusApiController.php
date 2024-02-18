<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventuserstatusRequest;
use App\Http\Requests\UpdateEventuserstatusRequest;
use App\Http\Resources\Admin\EventuserstatusResource;
use App\Models\Eventuserstatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventuserstatusApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('eventuserstatus_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EventuserstatusResource(Eventuserstatus::all());
    }

    public function store(StoreEventuserstatusRequest $request)
    {
        $eventuserstatus = Eventuserstatus::create($request->all());

        return (new EventuserstatusResource($eventuserstatus))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Eventuserstatus $eventuserstatus)
    {
        abort_if(Gate::denies('eventuserstatus_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EventuserstatusResource($eventuserstatus);
    }

    public function update(UpdateEventuserstatusRequest $request, Eventuserstatus $eventuserstatus)
    {
        $eventuserstatus->update($request->all());

        return (new EventuserstatusResource($eventuserstatus))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Eventuserstatus $eventuserstatus)
    {
        abort_if(Gate::denies('eventuserstatus_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventuserstatus->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
