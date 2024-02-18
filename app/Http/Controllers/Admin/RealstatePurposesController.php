<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRealstatePurposeRequest;
use App\Http\Requests\StoreRealstatePurposeRequest;
use App\Http\Requests\UpdateRealstatePurposeRequest;
use App\Models\RealstatePurpose;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RealstatePurposesController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('realstate_purpose_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = RealstatePurpose::query()->select(sprintf('%s.*', (new RealstatePurpose)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'realstate_purpose_show';
                $editGate      = 'realstate_purpose_edit';
                $deleteGate    = 'realstate_purpose_delete';
                $crudRoutePart = 'realstate-purposes';

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

        return view('admin.realstatePurposes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('realstate_purpose_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.realstatePurposes.create');
    }

    public function store(StoreRealstatePurposeRequest $request)
    {
        $realstatePurpose = RealstatePurpose::create($request->all());

        if ($request->input('image', false)) {
            $realstatePurpose->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $realstatePurpose->id]);
        }

        return redirect()->route('admin.realstate-purposes.index');
    }

    public function edit(RealstatePurpose $realstatePurpose)
    {
        abort_if(Gate::denies('realstate_purpose_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.realstatePurposes.edit', compact('realstatePurpose'));
    }

    public function update(UpdateRealstatePurposeRequest $request, RealstatePurpose $realstatePurpose)
    {
        $realstatePurpose->update($request->all());

        if ($request->input('image', false)) {
            if (! $realstatePurpose->image || $request->input('image') !== $realstatePurpose->image->file_name) {
                if ($realstatePurpose->image) {
                    $realstatePurpose->image->delete();
                }
                $realstatePurpose->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($realstatePurpose->image) {
            $realstatePurpose->image->delete();
        }

        return redirect()->route('admin.realstate-purposes.index');
    }

    public function show(RealstatePurpose $realstatePurpose)
    {
        abort_if(Gate::denies('realstate_purpose_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $realstatePurpose->load('purposeRealEstateUnits');

        return view('admin.realstatePurposes.show', compact('realstatePurpose'));
    }

    public function destroy(RealstatePurpose $realstatePurpose)
    {
        abort_if(Gate::denies('realstate_purpose_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $realstatePurpose->delete();

        return back();
    }

    public function massDestroy(MassDestroyRealstatePurposeRequest $request)
    {
        $realstatePurposes = RealstatePurpose::find(request('ids'));

        foreach ($realstatePurposes as $realstatePurpose) {
            $realstatePurpose->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('realstate_purpose_create') && Gate::denies('realstate_purpose_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new RealstatePurpose();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
