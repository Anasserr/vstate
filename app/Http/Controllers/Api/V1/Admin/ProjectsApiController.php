<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\RealEstateUnit;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\Admin\ProjectResource;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Resources\Admin\RealEstateUnitResource;

class ProjectsApiController extends Controller
{
    use MediaUploadingTrait;

    public function siteProjects(Request $request)
    {
        return responseApi(200, '', new  ProjectResource(Project::with(['user', 'city', 'nearbies', 'project_type'])->paginate($request->limit ?? 20)), [], '');
    }

    public function siteProjectDetails($id)
    {
        return responseApi(200, '', new  ProjectResource(Project::where('id', $id)->with(['user', 'city', 'nearbies', 'project_type'])->get()), [], '');
    }

    public function siteProjectUnits(Request $request, $id)
    {
        $units = RealEstateUnit::with(['project', 'user', 'amenities', 'nears', 'purposes', 'payments', 'types'])->where('project_id', $id)->paginate($request->limit ?? 20);

        return responseApi(200, '', new RealEstateUnitResource($units), [], '');
    }

    public function index()
    {
        return responseApi(200, '', new  ProjectResource(Project::with(['user', 'city', 'nearbies', 'project_type'])->get()), [], '');
    }

    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->all());

        if ($request->input('image', false)) {
            $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($request->input('images', false)) {
            $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('images'))))->toMediaCollection('images');
        }

        foreach ($request->input('attachments', []) as $file) {
            $project->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachments');
        }

        return (new ProjectResource($project))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Project $project)
    {
        return new ProjectResource($project->load(['user']));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->all());

        if ($request->input('image', false)) {
            if (!$project->image || $request->input('image') !== $project->image->file_name) {
                if ($project->image) {
                    $project->image->delete();
                }
                $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($project->image) {
            $project->image->delete();
        }

        if ($request->input('images', false)) {
            if (!$project->images || $request->input('images') !== $project->images->file_name) {
                if ($project->images) {
                    $project->images->delete();
                }
                $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('images'))))->toMediaCollection('images');
            }
        } elseif ($project->images) {
            $project->images->delete();
        }

        if (count($project->attachments) > 0) {
            foreach ($project->attachments as $media) {
                if (!in_array($media->file_name, $request->input('attachments', []))) {
                    $media->delete();
                }
            }
        }
        $media = $project->attachments->pluck('file_name')->toArray();
        foreach ($request->input('attachments', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $project->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachments');
            }
        }

        return (new ProjectResource($project))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}