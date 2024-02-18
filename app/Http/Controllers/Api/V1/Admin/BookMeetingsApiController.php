<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Gate;
use App\Models\BookMeeting;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBookMeetingRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\UpdateBookMeetingRequest;
use App\Http\Resources\Admin\BookMeetingResource;

class BookMeetingsApiController extends Controller
{
    public function index()
    {
        return new BookMeetingResource(BookMeeting::with(['user', 'unit'])->get());
    }

    public function store(StoreBookMeetingRequest $request)
    {
        if ($request->header('Authorization') && $request->header('Authorization') !== null) {
            JWTAuth::parseToken()->authenticate() ;
        }
        if (Auth::check()) {
            $request['user_id'] = Auth::user()->id;
        }

        $bookMeeting        = BookMeeting::create($request->all());

        return responseApi(Response::HTTP_CREATED, '', new BookMeetingResource($bookMeeting->load(['user', 'unit', 'project'])), [], '');
    }

    public function show(BookMeeting $bookMeeting)
    {
        return responseApi(200, '', new BookMeetingResource($bookMeeting->load(['user', 'unit', 'project'])), [], '');
    }

    public function update(UpdateBookMeetingRequest $request, BookMeeting $bookMeeting)
    {
        // $bookMeeting->update($request->all());

        // return (new BookMeetingResource($bookMeeting))
        //     ->response()
        //     ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(BookMeeting $bookMeeting)
    {
        // abort_if(Gate::denies('book_meeting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $bookMeeting->delete();

        // return response(null, Response::HTTP_NO_CONTENT);
    }
}