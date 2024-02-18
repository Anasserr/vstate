<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyEventCategoryRequest;
use App\Http\Requests\StoreEventCategoryRequest;
use App\Http\Requests\UpdateEventCategoryRequest;
use App\Models\EventCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EventCategoriesController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('event_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = EventCategory::query()->select(sprintf('%s.*', (new EventCategory)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'event_category_show';
                $editGate      = 'event_category_edit';
                $deleteGate    = 'event_category_delete';
                $crudRoutePart = 'event-categories';

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

            $table->rawColumns(['actions', 'placeholder', 'active', 'image']);

            return $table->make(true);
        }

        return view('admin.eventCategories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('event_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.eventCategories.create');
    }

    public function store(StoreEventCategoryRequest $request)
    {
        $eventCategory = EventCategory::create($request->all());

        if ($request->input('image', false)) {
            $eventCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $eventCategory->id]);
        }

        return redirect()->route('admin.event-categories.index');
    }

    public function edit(EventCategory $eventCategory)
    {
        abort_if(Gate::denies('event_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.eventCategories.edit', compact('eventCategory'));
    }

    public function update(UpdateEventCategoryRequest $request, EventCategory $eventCategory)
    {
        $eventCategory->update($request->all());

        if ($request->input('image', false)) {
            if (! $eventCategory->image || $request->input('image') !== $eventCategory->image->file_name) {
                if ($eventCategory->image) {
                    $eventCategory->image->delete();
                }
                $eventCategory->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($eventCategory->image) {
            $eventCategory->image->delete();
        }

        return redirect()->route('admin.event-categories.index');
    }

    public function show(EventCategory $eventCategory)
    {
        abort_if(Gate::denies('event_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.eventCategories.show', compact('eventCategory'));
    }

    public function destroy(EventCategory $eventCategory)
    {
        abort_if(Gate::denies('event_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyEventCategoryRequest $request)
    {
        $eventCategories = EventCategory::find(request('ids'));

        foreach ($eventCategories as $eventCategory) {
            $eventCategory->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('event_category_create') && Gate::denies('event_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new EventCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
