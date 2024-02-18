<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AmenityResource;
use App\Models\Amenity;

class AmenitieApiController extends Controller
{
    public function index()
    {
        return responseApi(200, '', new AmenityResource(Amenity::all()), [], '');
    }
}