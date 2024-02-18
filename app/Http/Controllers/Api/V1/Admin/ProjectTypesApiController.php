<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreProjectTypeRequest;
use App\Http\Requests\UpdateProjectTypeRequest;
use App\Http\Resources\Admin\ProjectTypeResource;
use App\Models\ProjectType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectTypesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('project_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectTypeResource(ProjectType::all());
    }

    public function store(StoreProjectTypeRequest $request)
    {
        $projectType = ProjectType::create($request->all());

        if ($request->input('image', false)) {
            $projectType->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new ProjectTypeResource($projectType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProjectType $projectType)
    {
        abort_if(Gate::denies('project_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectTypeResource($projectType);
    }

    public function update(UpdateProjectTypeRequest $request, ProjectType $projectType)
    {
        $projectType->update($request->all());

        if ($request->input('image', false)) {
            if (! $projectType->image || $request->input('image') !== $projectType->image->file_name) {
                if ($projectType->image) {
                    $projectType->image->delete();
                }
                $projectType->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($projectType->image) {
            $projectType->image->delete();
        }

        return (new ProjectTypeResource($projectType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProjectType $projectType)
    {
        abort_if(Gate::denies('project_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
