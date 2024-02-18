<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAvailableForMortgageRequest;
use App\Http\Requests\StoreAvailableForMortgageRequest;
use App\Http\Requests\UpdateAvailableForMortgageRequest;
use App\Models\AvailableForMortgage;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AvailableForMortgagesController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('available_for_mortgage_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AvailableForMortgage::query()->select(sprintf('%s.*', (new AvailableForMortgage)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'available_for_mortgage_show';
                $editGate      = 'available_for_mortgage_edit';
                $deleteGate    = 'available_for_mortgage_delete';
                $crudRoutePart = 'available-for-mortgages';

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

        return view('admin.availableForMortgages.index');
    }

    public function create()
    {
        abort_if(Gate::denies('available_for_mortgage_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.availableForMortgages.create');
    }

    public function store(StoreAvailableForMortgageRequest $request)
    {
        $availableForMortgage = AvailableForMortgage::create($request->all());

        if ($request->input('image', false)) {
            $availableForMortgage->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $availableForMortgage->id]);
        }

        return redirect()->route('admin.available-for-mortgages.index');
    }

    public function edit(AvailableForMortgage $availableForMortgage)
    {
        abort_if(Gate::denies('available_for_mortgage_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.availableForMortgages.edit', compact('availableForMortgage'));
    }

    public function update(UpdateAvailableForMortgageRequest $request, AvailableForMortgage $availableForMortgage)
    {
        $availableForMortgage->update($request->all());

        if ($request->input('image', false)) {
            if (! $availableForMortgage->image || $request->input('image') !== $availableForMortgage->image->file_name) {
                if ($availableForMortgage->image) {
                    $availableForMortgage->image->delete();
                }
                $availableForMortgage->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($availableForMortgage->image) {
            $availableForMortgage->image->delete();
        }

        return redirect()->route('admin.available-for-mortgages.index');
    }

    public function show(AvailableForMortgage $availableForMortgage)
    {
        abort_if(Gate::denies('available_for_mortgage_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $availableForMortgage->load('listingsAvailableForMortgageRealEstateApplications');

        return view('admin.availableForMortgages.show', compact('availableForMortgage'));
    }

    public function destroy(AvailableForMortgage $availableForMortgage)
    {
        abort_if(Gate::denies('available_for_mortgage_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $availableForMortgage->delete();

        return back();
    }

    public function massDestroy(MassDestroyAvailableForMortgageRequest $request)
    {
        $availableForMortgages = AvailableForMortgage::find(request('ids'));

        foreach ($availableForMortgages as $availableForMortgage) {
            $availableForMortgage->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('available_for_mortgage_create') && Gate::denies('available_for_mortgage_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AvailableForMortgage();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
