<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CountryResource;
use App\Models\Country;

class CountriesApiController extends Controller
{
    public function index()
    {
        return responseApi(200, '', new CountryResource(Country::all()), [], '');
    }
}