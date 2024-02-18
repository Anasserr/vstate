<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreUnitCommentRequest;
use App\Http\Requests\UpdateUnitCommentRequest;
use App\Http\Resources\Admin\UnitCommentResource;
use App\Models\UnitComment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UnitCommentsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('unit_comment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UnitCommentResource(UnitComment::with(['user', 'unit'])->get());
    }

    public function store(StoreUnitCommentRequest $request)
    {
        $unitComment = UnitComment::create($request->all());

        return (new UnitCommentResource($unitComment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(UnitComment $unitComment)
    {
        abort_if(Gate::denies('unit_comment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UnitCommentResource($unitComment->load(['user', 'unit']));
    }

    public function update(UpdateUnitCommentRequest $request, UnitComment $unitComment)
    {
        $unitComment->update($request->all());

        return (new UnitCommentResource($unitComment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(UnitComment $unitComment)
    {
        abort_if(Gate::denies('unit_comment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unitComment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
