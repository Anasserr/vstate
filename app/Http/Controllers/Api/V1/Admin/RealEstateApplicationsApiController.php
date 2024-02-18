<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\RealEstateApplication;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreRealEstateApplicationRequest;
use App\Http\Requests\UpdateRealEstateApplicationRequest;
use App\Http\Resources\Admin\RealEstateApplicationResource;

class RealEstateApplicationsApiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->header('Authorization') && $request->header('Authorization') !== null) {
            JWTAuth::parseToken()->authenticate() ;
        }
        if (Auth::check()) {
            return responseApi(200, '', new  RealEstateApplicationResource(RealEstateApplication::where('user_id', Auth::user()->id)->with(['view', 'finish_type', 'type', 'section', 'payment_method', 'listings_available_for_mortgage'])->get()), [], '');
        } else {
            return responseApi(200, '', [], [], '');
        }
    }

    public function store(StoreRealEstateApplicationRequest $request)
    {
        $realEstateApplication = RealEstateApplication::create($request->all());
        $realEstateApplication->listings_available_for_mortgages()->sync($request->input('listings_available_for_mortgages', []));
        $realEstateApplication->payment_methods()->sync($request->input('payment_methods', []));
        $realEstateApplication->types()->sync($request->input('types', []));
        $realEstateApplication->views()->sync($request->input('views', []));
        $realEstateApplication->finish_types()->sync($request->input('finish_types', []));

        return responseApi(Response::HTTP_CREATED, '', new RealEstateApplicationResource($realEstateApplication), [], '');
    }

    public function show(RealEstateApplication $realEstateApplication)
    {
        return responseApi(200, '', new RealEstateApplicationResource($realEstateApplication->load(['view', 'finish_type', 'type', 'section', 'payment_method', 'listings_available_for_mortgage'])), [], '');
    }

    public function update(UpdateRealEstateApplicationRequest $request, RealEstateApplication $realEstateApplication)
    {
        $realEstateApplication->update($request->all());
        $realEstateApplication->listings_available_for_mortgages()->sync($request->input('listings_available_for_mortgages', []));
        $realEstateApplication->payment_methods()->sync($request->input('payment_methods', []));
        $realEstateApplication->types()->sync($request->input('types', []));
        $realEstateApplication->views()->sync($request->input('views', []));
        $realEstateApplication->finish_types()->sync($request->input('finish_types', []));

        return new RealEstateApplicationResource($realEstateApplication->load(['view', 'finish_type', 'type', 'section', 'payment_method', 'listings_available_for_mortgage']));

        return responseApi(Response::HTTP_ACCEPTED, '', new RealEstateApplicationResource($realEstateApplication->load(['view', 'finish_type', 'type', 'section', 'payment_method', 'listings_available_for_mortgage'])), [], '');
    }

    public function destroy(Request $request, RealEstateApplication $realEstateApplication)
    {
        if ($request->header('Authorization') && $request->header('Authorization') !== null) {
            JWTAuth::parseToken()->authenticate() ;
        }
        if (Auth::check()) {
            $realEstateApplication->delete();

            return responseApi(200, '', [], [], '');
        }
    }
}
