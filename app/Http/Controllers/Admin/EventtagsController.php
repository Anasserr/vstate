<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyEventtagRequest;
use App\Http\Requests\StoreEventtagRequest;
use App\Http\Requests\UpdateEventtagRequest;
use App\Models\Eventtag;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EventtagsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('eventtag_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Eventtag::query()->select(sprintf('%s.*', (new Eventtag)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'eventtag_show';
                $editGate      = 'eventtag_edit';
                $deleteGate    = 'eventtag_delete';
                $crudRoutePart = 'eventtags';

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

            $table->rawColumns(['actions', 'placeholder', 'active']);

            return $table->make(true);
        }

        return view('admin.eventtags.index');
    }

    public function create()
    {
        abort_if(Gate::denies('eventtag_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.eventtags.create');
    }

    public function store(StoreEventtagRequest $request)
    {
        $eventtag = Eventtag::create($request->all());

        return redirect()->route('admin.eventtags.index');
    }

    public function edit(Eventtag $eventtag)
    {
        abort_if(Gate::denies('eventtag_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.eventtags.edit', compact('eventtag'));
    }

    public function update(UpdateEventtagRequest $request, Eventtag $eventtag)
    {
        $eventtag->update($request->all());

        return redirect()->route('admin.eventtags.index');
    }

    public function show(Eventtag $eventtag)
    {
        abort_if(Gate::denies('eventtag_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventtag->load('eventTagEvents');

        return view('admin.eventtags.show', compact('eventtag'));
    }

    public function destroy(Eventtag $eventtag)
    {
        abort_if(Gate::denies('eventtag_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventtag->delete();

        return back();
    }

    public function massDestroy(MassDestroyEventtagRequest $request)
    {
        $eventtags = Eventtag::find(request('ids'));

        foreach ($eventtags as $eventtag) {
            $eventtag->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
