<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBookMeetingRequest;
use App\Http\Requests\StoreBookMeetingRequest;
use App\Http\Requests\UpdateBookMeetingRequest;
use App\Models\BookMeeting;
use App\Models\Project;
use App\Models\RealEstateUnit;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BookMeetingsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('book_meeting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = BookMeeting::with(['user', 'unit', 'project'])->select(sprintf('%s.*', (new BookMeeting)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'book_meeting_show';
                $editGate      = 'book_meeting_edit';
                $deleteGate    = 'book_meeting_delete';
                $crudRoutePart = 'book-meetings';

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

            $table->editColumn('meeting_type', function ($row) {
                return $row->meeting_type ? BookMeeting::MEETING_TYPE_SELECT[$row->meeting_type] : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('message', function ($row) {
                return $row->message ? $row->message : '';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->addColumn('unit_title', function ($row) {
                return $row->unit ? $row->unit->title : '';
            });

            $table->addColumn('project_title', function ($row) {
                return $row->project ? $row->project->title : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'unit', 'project']);

            return $table->make(true);
        }

        return view('admin.bookMeetings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('book_meeting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $units = RealEstateUnit::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.bookMeetings.create', compact('projects', 'units', 'users'));
    }

    public function store(StoreBookMeetingRequest $request)
    {
        $bookMeeting = BookMeeting::create($request->all());

        return redirect()->route('admin.book-meetings.index');
    }

    public function edit(BookMeeting $bookMeeting)
    {
        abort_if(Gate::denies('book_meeting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $units = RealEstateUnit::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bookMeeting->load('user', 'unit', 'project');

        return view('admin.bookMeetings.edit', compact('bookMeeting', 'projects', 'units', 'users'));
    }

    public function update(UpdateBookMeetingRequest $request, BookMeeting $bookMeeting)
    {
        $bookMeeting->update($request->all());

        return redirect()->route('admin.book-meetings.index');
    }

    public function show(BookMeeting $bookMeeting)
    {
        abort_if(Gate::denies('book_meeting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookMeeting->load('user', 'unit', 'project');

        return view('admin.bookMeetings.show', compact('bookMeeting'));
    }

    public function destroy(BookMeeting $bookMeeting)
    {
        abort_if(Gate::denies('book_meeting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookMeeting->delete();

        return back();
    }

    public function massDestroy(MassDestroyBookMeetingRequest $request)
    {
        $bookMeetings = BookMeeting::find(request('ids'));

        foreach ($bookMeetings as $bookMeeting) {
            $bookMeeting->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
