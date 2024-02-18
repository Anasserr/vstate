<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\RealEstateTypeResource;
use App\Models\RealEstateType;

class RealEstateTypesApiController extends Controller
{
    public function index()
    {
        return responseApi(200, '', new RealEstateTypeResource(RealEstateType::all()), [], '');
    }
}