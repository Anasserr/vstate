<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyFinishTypeRequest;
use App\Http\Requests\StoreFinishTypeRequest;
use App\Http\Requests\UpdateFinishTypeRequest;
use App\Models\FinishType;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class FinishTypeController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('finish_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = FinishType::query()->select(sprintf('%s.*', (new FinishType)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'finish_type_show';
                $editGate      = 'finish_type_edit';
                $deleteGate    = 'finish_type_delete';
                $crudRoutePart = 'finish-types';

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

        return view('admin.finishTypes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('finish_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.finishTypes.create');
    }

    public function store(StoreFinishTypeRequest $request)
    {
        $finishType = FinishType::create($request->all());

        if ($request->input('image', false)) {
            $finishType->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $finishType->id]);
        }

        return redirect()->route('admin.finish-types.index');
    }

    public function edit(FinishType $finishType)
    {
        abort_if(Gate::denies('finish_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.finishTypes.edit', compact('finishType'));
    }

    public function update(UpdateFinishTypeRequest $request, FinishType $finishType)
    {
        $finishType->update($request->all());

        if ($request->input('image', false)) {
            if (! $finishType->image || $request->input('image') !== $finishType->image->file_name) {
                if ($finishType->image) {
                    $finishType->image->delete();
                }
                $finishType->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($finishType->image) {
            $finishType->image->delete();
        }

        return redirect()->route('admin.finish-types.index');
    }

    public function show(FinishType $finishType)
    {
        abort_if(Gate::denies('finish_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $finishType->load('finishTypeRealEstateApplications');

        return view('admin.finishTypes.show', compact('finishType'));
    }

    public function destroy(FinishType $finishType)
    {
        abort_if(Gate::denies('finish_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $finishType->delete();

        return back();
    }

    public function massDestroy(MassDestroyFinishTypeRequest $request)
    {
        $finishTypes = FinishType::find(request('ids'));

        foreach ($finishTypes as $finishType) {
            $finishType->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('finish_type_create') && Gate::denies('finish_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new FinishType();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
