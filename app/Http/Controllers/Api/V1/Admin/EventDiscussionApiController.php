<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreEventDiscussionRequest;
use App\Http\Requests\UpdateEventDiscussionRequest;
use App\Http\Resources\Admin\EventDiscussionResource;
use App\Models\EventDiscussion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventDiscussionApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('event_discussion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EventDiscussionResource(EventDiscussion::with(['user', 'event', 'replay_discussion'])->get());
    }

    public function store(StoreEventDiscussionRequest $request)
    {
        $eventDiscussion = EventDiscussion::create($request->all());

        if ($request->input('image', false)) {
            $eventDiscussion->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new EventDiscussionResource($eventDiscussion))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(EventDiscussion $eventDiscussion)
    {
        abort_if(Gate::denies('event_discussion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EventDiscussionResource($eventDiscussion->load(['user', 'event', 'replay_discussion']));
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

        return (new EventDiscussionResource($eventDiscussion))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(EventDiscussion $eventDiscussion)
    {
        abort_if(Gate::denies('event_discussion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventDiscussion->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
