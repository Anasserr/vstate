<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CityResource;
use App\Models\City;

class CitiesApiController extends Controller
{
    public function index()
    {
        return responseApi(200, '', new CityResource(City::with(['country'])->get()), [], '');
    }
}
