<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyEventDiscussionRequest;
use App\Http\Requests\StoreEventDiscussionRequest;
use App\Http\Requests\UpdateEventDiscussionRequest;
use App\Models\Event;
use App\Models\EventDiscussion;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EventDiscussionController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('event_discussion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = EventDiscussion::with(['user', 'event', 'replay_discussion'])->select(sprintf('%s.*', (new EventDiscussion)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'event_discussion_show';
                $editGate      = 'event_discussion_edit';
                $deleteGate    = 'event_discussion_delete';
                $crudRoutePart = 'event-discussions';

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
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->addColumn('event_title', function ($row) {
                return $row->event ? $row->event->title : '';
            });

            $table->editColumn('discussion', function ($row) {
                return $row->discussion ? $row->discussion : '';
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

            $table->rawColumns(['actions', 'placeholder', 'user', 'event', 'image']);

            return $table->make(true);
        }

        return view('admin.eventDiscussions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('event_discussion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $events = Event::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $replay_discussions = EventDiscussion::pluck('discussion', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.eventDiscussions.create', compact('events', 'replay_discussions', 'users'));
    }

    public function store(StoreEventDiscussionRequest $request)
    {
        $eventDiscussion = EventDiscussion::create($request->all());

        if ($request->input('image', false)) {
            $eventDiscussion->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $eventDiscussion->id]);
        }

        return redirect()->route('admin.event-discussions.index');
    }

    public function edit(EventDiscussion $eventDiscussion)
    {
        abort_if(Gate::denies('event_discussion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $events = Event::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $replay_discussions = EventDiscussion::pluck('discussion', 'id')->prepend(trans('global.pleaseSelect'), '');

        $eventDiscussion->load('user', 'event', 'replay_discussion');

        return view('admin.eventDiscussions.edit', compact('eventDiscussion', 'events', 'replay_discussions', 'users'));
    }

    public function update(UpdateEventDiscussionRequest $request, EventDiscussion $eventDiscussion)
    {
        $eventDiscussion->update($request->all());

        if ($request->input('image', false)) {
            if (! $eventDiscussion->image || $request->input('image') !== $eventDiscussion->image->file_name) {
                if ($eventDiscussion->image) {
                    $eventDiscussion->image->delete();
                }
                $eventDiscussion->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($eventDiscussion->image) {
            $eventDiscussion->image->delete();
        }

        return redirect()->route('admin.event-discussions.index');
    }

    public function show(EventDiscussion $eventDiscussion)
    {
        abort_if(Gate::denies('event_discussion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventDiscussion->load('user', 'event', 'replay_discussion');

        return view('admin.eventDiscussions.show', compact('eventDiscussion'));
    }

    public function destroy(EventDiscussion $eventDiscussion)
    {
        abort_if(Gate::denies('event_discussion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventDiscussion->delete();

        return back();
    }

    public function massDestroy(MassDestroyEventDiscussionRequest $request)
    {
        $eventDiscussions = EventDiscussion::find(request('ids'));

        foreach ($eventDiscussions as $eventDiscussion) {
            $eventDiscussion->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('event_discussion_create') && Gate::denies('event_discussion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new EventDiscussion();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
