<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRegionRequest;
use App\Http\Requests\StoreRegionRequest;
use App\Http\Requests\UpdateRegionRequest;
use App\Models\City;
use App\Models\Region;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RegionsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('region_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Region::with(['city'])->select(sprintf('%s.*', (new Region)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'region_show';
                $editGate      = 'region_edit';
                $deleteGate    = 'region_delete';
                $crudRoutePart = 'regions';

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
            $table->addColumn('city_title_ar', function ($row) {
                return $row->city ? $row->city->title_ar : '';
            });

            $table->editColumn('title_ar', function ($row) {
                return $row->title_ar ? $row->title_ar : '';
            });
            $table->editColumn('title_en', function ($row) {
                return $row->title_en ? $row->title_en : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'city']);

            return $table->make(true);
        }

        $cities = City::get();

        return view('admin.regions.index', compact('cities'));
    }

    public function create()
    {
        abort_if(Gate::denies('region_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cities = City::pluck('title_ar', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.regions.create', compact('cities'));
    }

    public function store(StoreRegionRequest $request)
    {
        $region = Region::create($request->all());

        return redirect()->route('admin.regions.index');
    }

    public function edit(Region $region)
    {
        abort_if(Gate::denies('region_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cities = City::pluck('title_ar', 'id')->prepend(trans('global.pleaseSelect'), '');

        $region->load('city');

        return view('admin.regions.edit', compact('cities', 'region'));
    }

    public function update(UpdateRegionRequest $request, Region $region)
    {
        $region->update($request->all());

        return redirect()->route('admin.regions.index');
    }

    public function show(Region $region)
    {
        abort_if(Gate::denies('region_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $region->load('city');

        return view('admin.regions.show', compact('region'));
    }

    public function destroy(Region $region)
    {
        abort_if(Gate::denies('region_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $region->delete();

        return back();
    }

    public function massDestroy(MassDestroyRegionRequest $request)
    {
        $regions = Region::find(request('ids'));

        foreach ($regions as $region) {
            $region->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
