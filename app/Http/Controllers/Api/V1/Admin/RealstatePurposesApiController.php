<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRealstatePurposeRequest;
use App\Http\Requests\UpdateRealstatePurposeRequest;
use App\Http\Resources\Admin\RealstatePurposeResource;
use App\Models\RealstatePurpose;
use Symfony\Component\HttpFoundation\Response;

class RealstatePurposesApiController extends Controller
{
    public function index()
    {
        return responseApi(200, '', new RealstatePurposeResource(RealstatePurpose::all()), [], '');
    }

    public function store(StoreRealstatePurposeRequest $request)
    {
        // $realstatePurpose = RealstatePurpose::create($request->all());

        // return (new RealstatePurposeResource($realstatePurpose))
        //     ->response()
        //     ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RealstatePurpose $realstatePurpose)
    {
        // abort_if(Gate::denies('realstate_purpose_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // return new RealstatePurposeResource($realstatePurpose);
    }

    public function update(UpdateRealstatePurposeRequest $request, RealstatePurpose $realstatePurpose)
    {
        // $realstatePurpose->update($request->all());

        // return (new RealstatePurposeResource($realstatePurpose))
        //     ->response()
        //     ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RealstatePurpose $realstatePurpose)
    {
        // abort_if(Gate::denies('realstate_purpose_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $realstatePurpose->delete();

        // return response(null, Response::HTTP_NO_CONTENT);
    }
}