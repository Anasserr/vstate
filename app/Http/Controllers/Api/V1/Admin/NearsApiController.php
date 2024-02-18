<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNearRequest;
use App\Http\Requests\UpdateNearRequest;
use App\Http\Resources\Admin\NearResource;
use App\Models\Near;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NearsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('near_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NearResource(Near::all());
    }

    public function store(StoreNearRequest $request)
    {
        $near = Near::create($request->all());

        return (new NearResource($near))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Near $near)
    {
        abort_if(Gate::denies('near_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NearResource($near);
    }

    public function update(UpdateNearRequest $request, Near $near)
    {
        $near->update($request->all());

        return (new NearResource($near))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Near $near)
    {
        abort_if(Gate::denies('near_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $near->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
