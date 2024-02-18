<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Gate;
use App\Models\BookMeeting;
use Illuminate\Http\Request;
use App\Models\RealEstateUnit;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBookMeetingRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreRealEstateUnitRequest;
use App\Http\Resources\Admin\BookMeetingResource;
use App\Http\Requests\UpdateRealEstateUnitRequest;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Resources\Admin\RealEstateUnitResource;

class RealEstateUnitsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        $units = RealEstateUnit::with(['project', 'user', 'amenities', 'nears', 'purposes', 'payments', 'types']) ;

        if (isset($request->project_id)) {
            $units->where('project_id', $request->project_id);
        }

        return responseApi(200, '', new RealEstateUnitResource($units->paginate($request->limit ?? 20)), [], '');
    }

    public function storeAppointment(StoreBookMeetingRequest $request)
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

    public function store(StoreRealEstateUnitRequest $request)
    {
        $realEstateUnit = RealEstateUnit::create($request->all());
        $realEstateUnit->amenities()->sync($request->input('amenities', []));
        $realEstateUnit->nears()->sync($request->input('nears', []));
        $realEstateUnit->purposes()->sync($request->input('purposes', []));
        $realEstateUnit->payments()->sync($request->input('payments', []));
        $realEstateUnit->types()->sync($request->input('types', []));
        if ($request->input('image', false)) {
            $realEstateUnit->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        foreach ($request->input('images', []) as $file) {
            $realEstateUnit->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
        }

        foreach ($request->input('plans', []) as $file) {
            $realEstateUnit->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('plans');
        }

        if ($request->input('image_360', false)) {
            $realEstateUnit->addMedia(storage_path('tmp/uploads/' . basename($request->input('image_360'))))->toMediaCollection('image_360');
        }

        foreach ($request->input('images_360', []) as $file) {
            $realEstateUnit->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images_360');
        }

        return (new RealEstateUnitResource($realEstateUnit))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $units = RealEstateUnit::with(['project', 'user', 'amenities', 'nears', 'purposes', 'payments', 'types'])->where('id', $id)->first();

        return responseApi(200, '', new RealEstateUnitResource($units), [], '');
    }

    public function update(UpdateRealEstateUnitRequest $request, RealEstateUnit $realEstateUnit)
    {
        $realEstateUnit->update($request->all());
        $realEstateUnit->amenities()->sync($request->input('amenities', []));
        $realEstateUnit->nears()->sync($request->input('nears', []));
        $realEstateUnit->purposes()->sync($request->input('purposes', []));
        $realEstateUnit->payments()->sync($request->input('payments', []));
        $realEstateUnit->types()->sync($request->input('types', []));
        if ($request->input('image', false)) {
            if (!$realEstateUnit->image || $request->input('image') !== $realEstateUnit->image->file_name) {
                if ($realEstateUnit->image) {
                    $realEstateUnit->image->delete();
                }
                $realEstateUnit->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($realEstateUnit->image) {
            $realEstateUnit->image->delete();
        }

        if (count($realEstateUnit->images) > 0) {
            foreach ($realEstateUnit->images as $media) {
                if (!in_array($media->file_name, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $realEstateUnit->images->pluck('file_name')->toArray();
        foreach ($request->input('images', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $realEstateUnit->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
            }
        }

        if (count($realEstateUnit->plans) > 0) {
            foreach ($realEstateUnit->plans as $media) {
                if (!in_array($media->file_name, $request->input('plans', []))) {
                    $media->delete();
                }
            }
        }
        $media = $realEstateUnit->plans->pluck('file_name')->toArray();
        foreach ($request->input('plans', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $realEstateUnit->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('plans');
            }
        }

        if ($request->input('image_360', false)) {
            if (!$realEstateUnit->image_360 || $request->input('image_360') !== $realEstateUnit->image_360->file_name) {
                if ($realEstateUnit->image_360) {
                    $realEstateUnit->image_360->delete();
                }
                $realEstateUnit->addMedia(storage_path('tmp/uploads/' . basename($request->input('image_360'))))->toMediaCollection('image_360');
            }
        } elseif ($realEstateUnit->image_360) {
            $realEstateUnit->image_360->delete();
        }

        if (count($realEstateUnit->images_360) > 0) {
            foreach ($realEstateUnit->images_360 as $media) {
                if (!in_array($media->file_name, $request->input('images_360', []))) {
                    $media->delete();
                }
            }
        }
        $media = $realEstateUnit->images_360->pluck('file_name')->toArray();
        foreach ($request->input('images_360', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $realEstateUnit->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images_360');
            }
        }

        return (new RealEstateUnitResource($realEstateUnit))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RealEstateUnit $realEstateUnit)
    {
        abort_if(Gate::denies('real_estate_unit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $realEstateUnit->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}