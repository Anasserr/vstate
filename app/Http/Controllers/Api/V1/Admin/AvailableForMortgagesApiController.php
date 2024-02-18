<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AvailableForMortgageResource;
use App\Models\AvailableForMortgage;

class AvailableForMortgagesApiController extends Controller
{
    public function index()
    {
        return responseApi(200, '', new AvailableForMortgageResource(AvailableForMortgage::all()), [], '');
    }
}