<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRealEstateTypeRequest;
use App\Http\Requests\StoreRealEstateTypeRequest;
use App\Http\Requests\UpdateRealEstateTypeRequest;
use App\Models\RealEstateType;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RealEstateTypesController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('real_estate_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = RealEstateType::query()->select(sprintf('%s.*', (new RealEstateType)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'real_estate_type_show';
                $editGate      = 'real_estate_type_edit';
                $deleteGate    = 'real_estate_type_delete';
                $crudRoutePart = 'real-estate-types';

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

        return view('admin.realEstateTypes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('real_estate_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.realEstateTypes.create');
    }

    public function store(StoreRealEstateTypeRequest $request)
    {
        $realEstateType = RealEstateType::create($request->all());

        if ($request->input('image', false)) {
            $realEstateType->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $realEstateType->id]);
        }

        return redirect()->route('admin.real-estate-types.index');
    }

    public function edit(RealEstateType $realEstateType)
    {
        abort_if(Gate::denies('real_estate_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.realEstateTypes.edit', compact('realEstateType'));
    }

    public function update(UpdateRealEstateTypeRequest $request, RealEstateType $realEstateType)
    {
        $realEstateType->update($request->all());

        if ($request->input('image', false)) {
            if (! $realEstateType->image || $request->input('image') !== $realEstateType->image->file_name) {
                if ($realEstateType->image) {
                    $realEstateType->image->delete();
                }
                $realEstateType->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($realEstateType->image) {
            $realEstateType->image->delete();
        }

        return redirect()->route('admin.real-estate-types.index');
    }

    public function show(RealEstateType $realEstateType)
    {
        abort_if(Gate::denies('real_estate_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $realEstateType->load('typeRealEstateApplications', 'typeRealEstateUnits');

        return view('admin.realEstateTypes.show', compact('realEstateType'));
    }

    public function destroy(RealEstateType $realEstateType)
    {
        abort_if(Gate::denies('real_estate_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $realEstateType->delete();

        return back();
    }

    public function massDestroy(MassDestroyRealEstateTypeRequest $request)
    {
        $realEstateTypes = RealEstateType::find(request('ids'));

        foreach ($realEstateTypes as $realEstateType) {
            $realEstateType->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('real_estate_type_create') && Gate::denies('real_estate_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new RealEstateType();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
