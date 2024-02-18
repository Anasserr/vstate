<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyEventjoininguserRequest;
use App\Http\Requests\StoreEventjoininguserRequest;
use App\Http\Requests\UpdateEventjoininguserRequest;
use App\Models\Event;
use App\Models\Eventjoininguser;
use App\Models\Eventuserstatus;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EventjoiningusersController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('eventjoininguser_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Eventjoininguser::with(['event', 'user', 'event_status'])->select(sprintf('%s.*', (new Eventjoininguser)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'eventjoininguser_show';
                $editGate      = 'eventjoininguser_edit';
                $deleteGate    = 'eventjoininguser_delete';
                $crudRoutePart = 'eventjoiningusers';

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
            $table->editColumn('block', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->block ? 'checked' : null) . '>';
            });
            $table->addColumn('event_title', function ($row) {
                return $row->event ? $row->event->title : '';
            });

            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->addColumn('event_status_title', function ($row) {
                return $row->event_status ? $row->event_status->title : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'block', 'event', 'user', 'event_status']);

            return $table->make(true);
        }

        $events            = Event::get();
        $users             = User::get();
        $eventuserstatuses = Eventuserstatus::get();

        return view('admin.eventjoiningusers.index', compact('events', 'users', 'eventuserstatuses'));
    }

    public function create()
    {
        abort_if(Gate::denies('eventjoininguser_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = Event::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $event_statuses = Eventuserstatus::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.eventjoiningusers.create', compact('event_statuses', 'events', 'users'));
    }

    public function store(StoreEventjoininguserRequest $request)
    {
        $eventjoininguser = Eventjoininguser::create($request->all());

        return redirect()->route('admin.eventjoiningusers.index');
    }

    public function edit(Eventjoininguser $eventjoininguser)
    {
        abort_if(Gate::denies('eventjoininguser_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = Event::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $event_statuses = Eventuserstatus::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $eventjoininguser->load('event', 'user', 'event_status');

        return view('admin.eventjoiningusers.edit', compact('event_statuses', 'eventjoininguser', 'events', 'users'));
    }

    public function update(UpdateEventjoininguserRequest $request, Eventjoininguser $eventjoininguser)
    {
        $eventjoininguser->update($request->all());

        return redirect()->route('admin.eventjoiningusers.index');
    }

    public function show(Eventjoininguser $eventjoininguser)
    {
        abort_if(Gate::denies('eventjoininguser_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventjoininguser->load('event', 'user', 'event_status');

        return view('admin.eventjoiningusers.show', compact('eventjoininguser'));
    }

    public function destroy(Eventjoininguser $eventjoininguser)
    {
        abort_if(Gate::denies('eventjoininguser_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventjoininguser->delete();

        return back();
    }

    public function massDestroy(MassDestroyEventjoininguserRequest $request)
    {
        $eventjoiningusers = Eventjoininguser::find(request('ids'));

        foreach ($eventjoiningusers as $eventjoininguser) {
            $eventjoininguser->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
