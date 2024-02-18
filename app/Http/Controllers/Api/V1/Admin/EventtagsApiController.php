<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventtagRequest;
use App\Http\Requests\UpdateEventtagRequest;
use App\Http\Resources\Admin\EventtagResource;
use App\Models\Eventtag;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventtagsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('eventtag_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EventtagResource(Eventtag::all());
    }

    public function store(StoreEventtagRequest $request)
    {
        $eventtag = Eventtag::create($request->all());

        return (new EventtagResource($eventtag))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Eventtag $eventtag)
    {
        abort_if(Gate::denies('eventtag_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EventtagResource($eventtag);
    }

    public function update(UpdateEventtagRequest $request, Eventtag $eventtag)
    {
        $eventtag->update($request->all());

        return (new EventtagResource($eventtag))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Eventtag $eventtag)
    {
        abort_if(Gate::denies('eventtag_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventtag->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
