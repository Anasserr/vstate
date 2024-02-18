<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyEventuserstatusRequest;
use App\Http\Requests\StoreEventuserstatusRequest;
use App\Http\Requests\UpdateEventuserstatusRequest;
use App\Models\Eventuserstatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EventuserstatusController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('eventuserstatus_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Eventuserstatus::query()->select(sprintf('%s.*', (new Eventuserstatus)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'eventuserstatus_show';
                $editGate      = 'eventuserstatus_edit';
                $deleteGate    = 'eventuserstatus_delete';
                $crudRoutePart = 'eventuserstatuses';

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

        return view('admin.eventuserstatuses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('eventuserstatus_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.eventuserstatuses.create');
    }

    public function store(StoreEventuserstatusRequest $request)
    {
        $eventuserstatus = Eventuserstatus::create($request->all());

        return redirect()->route('admin.eventuserstatuses.index');
    }

    public function edit(Eventuserstatus $eventuserstatus)
    {
        abort_if(Gate::denies('eventuserstatus_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.eventuserstatuses.edit', compact('eventuserstatus'));
    }

    public function update(UpdateEventuserstatusRequest $request, Eventuserstatus $eventuserstatus)
    {
        $eventuserstatus->update($request->all());

        return redirect()->route('admin.eventuserstatuses.index');
    }

    public function show(Eventuserstatus $eventuserstatus)
    {
        abort_if(Gate::denies('eventuserstatus_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventuserstatus->load('eventStatusEventjoiningusers');

        return view('admin.eventuserstatuses.show', compact('eventuserstatus'));
    }

    public function destroy(Eventuserstatus $eventuserstatus)
    {
        abort_if(Gate::denies('eventuserstatus_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventuserstatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyEventuserstatusRequest $request)
    {
        $eventuserstatuses = Eventuserstatus::find(request('ids'));

        foreach ($eventuserstatuses as $eventuserstatus) {
            $eventuserstatus->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
