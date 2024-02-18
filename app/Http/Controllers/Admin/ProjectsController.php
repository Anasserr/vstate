<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProjectRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\City;
use App\Models\Near;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProjectsController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Project::with(['user', 'city', 'nearbies', 'project_type'])->select(sprintf('%s.*', (new Project)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'project_show';
                $editGate      = 'project_edit';
                $deleteGate    = 'project_delete';
                $crudRoutePart = 'projects';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('active', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->active ? 'checked' : null) . '>';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('image', function ($row) {
                if ($photo = $row->image) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Project::STATUS_SELECT[$row->status] : '';
            });
            $table->editColumn('featured', function ($row) {
                return $row->featured ? Project::FEATURED_RADIO[$row->featured] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'active', 'user', 'image']);

            return $table->make(true);
        }

        $users         = User::get();
        $cities        = City::get();
        $nears         = Near::get();
        $project_types = ProjectType::get();

        return view('admin.projects.index', compact('users', 'cities', 'nears', 'project_types'));
    }

    public function create()
    {
        abort_if(Gate::denies('project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cities = City::pluck('title_ar', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nearbies = Near::pluck('title', 'id');

        $project_types = ProjectType::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.projects.create', compact('cities', 'nearbies', 'project_types', 'users'));
    }

    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->all());
        $project->nearbies()->sync($request->input('nearbies', []));
        if ($request->input('image', false)) {
            $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        foreach ($request->input('images', []) as $file) {
            $project->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
        }

        foreach ($request->input('attachments', []) as $file) {
            $project->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachments');
        }

        foreach ($request->input('video', []) as $file) {
            $project->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('video');
        }

        if ($request->input('brochure', false)) {
            $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('brochure'))))->toMediaCollection('brochure');
        }

        if ($request->input('plan_image', false)) {
            $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('plan_image'))))->toMediaCollection('plan_image');
        }

        foreach ($request->input('construction_updates_images', []) as $file) {
            $project->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('construction_updates_images');
        }

        foreach ($request->input('construction_updates_videos', []) as $file) {
            $project->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('construction_updates_videos');
        }

        if ($request->input('second_image', false)) {
            $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('second_image'))))->toMediaCollection('second_image');
        }

        foreach ($request->input('banners', []) as $file) {
            $project->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('banners');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $project->id]);
        }

        return redirect()->route('admin.projects.index');
    }

    public function edit(Project $project)
    {
        abort_if(Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cities = City::pluck('title_ar', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nearbies = Near::pluck('title', 'id');

        $project_types = ProjectType::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project->load('user', 'city', 'nearbies', 'project_type');

        return view('admin.projects.edit', compact('cities', 'nearbies', 'project', 'project_types', 'users'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->all());
        $project->nearbies()->sync($request->input('nearbies', []));
        if ($request->input('image', false)) {
            if (! $project->image || $request->input('image') !== $project->image->file_name) {
                if ($project->image) {
                    $project->image->delete();
                }
                $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($project->image) {
            $project->image->delete();
        }

        if (count($project->images) > 0) {
            foreach ($project->images as $media) {
                if (! in_array($media->file_name, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $project->images->pluck('file_name')->toArray();
        foreach ($request->input('images', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $project->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
            }
        }

        if (count($project->attachments) > 0) {
            foreach ($project->attachments as $media) {
                if (! in_array($media->file_name, $request->input('attachments', []))) {
                    $media->delete();
                }
            }
        }
        $media = $project->attachments->pluck('file_name')->toArray();
        foreach ($request->input('attachments', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $project->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachments');
            }
        }

        if (count($project->video) > 0) {
            foreach ($project->video as $media) {
                if (! in_array($media->file_name, $request->input('video', []))) {
                    $media->delete();
                }
            }
        }
        $media = $project->video->pluck('file_name')->toArray();
        foreach ($request->input('video', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $project->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('video');
            }
        }

        if ($request->input('brochure', false)) {
            if (! $project->brochure || $request->input('brochure') !== $project->brochure->file_name) {
                if ($project->brochure) {
                    $project->brochure->delete();
                }
                $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('brochure'))))->toMediaCollection('brochure');
            }
        } elseif ($project->brochure) {
            $project->brochure->delete();
        }

        if ($request->input('plan_image', false)) {
            if (! $project->plan_image || $request->input('plan_image') !== $project->plan_image->file_name) {
                if ($project->plan_image) {
                    $project->plan_image->delete();
                }
                $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('plan_image'))))->toMediaCollection('plan_image');
            }
        } elseif ($project->plan_image) {
            $project->plan_image->delete();
        }

        if (count($project->construction_updates_images) > 0) {
            foreach ($project->construction_updates_images as $media) {
                if (! in_array($media->file_name, $request->input('construction_updates_images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $project->construction_updates_images->pluck('file_name')->toArray();
        foreach ($request->input('construction_updates_images', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $project->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('construction_updates_images');
            }
        }

        if (count($project->construction_updates_videos) > 0) {
            foreach ($project->construction_updates_videos as $media) {
                if (! in_array($media->file_name, $request->input('construction_updates_videos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $project->construction_updates_videos->pluck('file_name')->toArray();
        foreach ($request->input('construction_updates_videos', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $project->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('construction_updates_videos');
            }
        }

        if ($request->input('second_image', false)) {
            if (! $project->second_image || $request->input('second_image') !== $project->second_image->file_name) {
                if ($project->second_image) {
                    $project->second_image->delete();
                }
                $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('second_image'))))->toMediaCollection('second_image');
            }
        } elseif ($project->second_image) {
            $project->second_image->delete();
        }

        if (count($project->banners) > 0) {
            foreach ($project->banners as $media) {
                if (! in_array($media->file_name, $request->input('banners', []))) {
                    $media->delete();
                }
            }
        }
        $media = $project->banners->pluck('file_name')->toArray();
        foreach ($request->input('banners', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $project->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('banners');
            }
        }

        return redirect()->route('admin.projects.index');
    }

    public function show(Project $project)
    {
        abort_if(Gate::denies('project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->load('user', 'city', 'nearbies', 'project_type', 'projectRealEstateUnits', 'projectBookMeetings');

        return view('admin.projects.show', compact('project'));
    }

    public function destroy(Project $project)
    {
        abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjectRequest $request)
    {
        $projects = Project::find(request('ids'));

        foreach ($projects as $project) {
            $project->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('project_create') && Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Project();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
