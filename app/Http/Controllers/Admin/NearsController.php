<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyNearRequest;
use App\Http\Requests\StoreNearRequest;
use App\Http\Requests\UpdateNearRequest;
use App\Models\Near;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class NearsController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('near_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Near::query()->select(sprintf('%s.*', (new Near)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'near_show';
                $editGate      = 'near_edit';
                $deleteGate    = 'near_delete';
                $crudRoutePart = 'nears';

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

        return view('admin.nears.index');
    }

    public function create()
    {
        abort_if(Gate::denies('near_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nears.create');
    }

    public function store(StoreNearRequest $request)
    {
        $near = Near::create($request->all());

        if ($request->input('image', false)) {
            $near->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $near->id]);
        }

        return redirect()->route('admin.nears.index');
    }

    public function edit(Near $near)
    {
        abort_if(Gate::denies('near_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nears.edit', compact('near'));
    }

    public function update(UpdateNearRequest $request, Near $near)
    {
        $near->update($request->all());

        if ($request->input('image', false)) {
            if (! $near->image || $request->input('image') !== $near->image->file_name) {
                if ($near->image) {
                    $near->image->delete();
                }
                $near->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($near->image) {
            $near->image->delete();
        }

        return redirect()->route('admin.nears.index');
    }

    public function show(Near $near)
    {
        abort_if(Gate::denies('near_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $near->load('nearRealEstateUnits');

        return view('admin.nears.show', compact('near'));
    }

    public function destroy(Near $near)
    {
        abort_if(Gate::denies('near_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $near->delete();

        return back();
    }

    public function massDestroy(MassDestroyNearRequest $request)
    {
        $nears = Near::find(request('ids'));

        foreach ($nears as $near) {
            $near->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('near_create') && Gate::denies('near_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Near();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
