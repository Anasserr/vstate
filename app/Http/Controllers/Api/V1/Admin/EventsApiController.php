<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Http\Resources\Admin\EventResource;
use App\Models\Event;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class EventsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        return new EventResource(Event::with(['event_tags', 'created_by', 'country', 'city'])->get());
    }

    public function store(StoreEventRequest $request)
    {
        $event = Event::create($request->all());
        $event->event_tags()->sync($request->input('event_tags', []));
        if ($request->input('image', false)) {
            $event->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        foreach ($request->input('images', []) as $file) {
            $event->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
        }

        return (new EventResource($event))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Event $event)
    {
        return new EventResource($event->load(['event_tags', 'created_by', 'country', 'city']));
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->update($request->all());
        $event->event_tags()->sync($request->input('event_tags', []));
        if ($request->input('image', false)) {
            if (!$event->image || $request->input('image') !== $event->image->file_name) {
                if ($event->image) {
                    $event->image->delete();
                }
                $event->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($event->image) {
            $event->image->delete();
        }

        if (count($event->images) > 0) {
            foreach ($event->images as $media) {
                if (!in_array($media->file_name, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $event->images->pluck('file_name')->toArray();
        foreach ($request->input('images', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $event->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
            }
        }

        return (new EventResource($event))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Event $event)
    {
        abort_if(Gate::denies('event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $event->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}