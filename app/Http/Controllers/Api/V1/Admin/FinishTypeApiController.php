<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\FinishTypeResource;
use App\Models\FinishType;

class FinishTypeApiController extends Controller
{
    public function index()
    {
        return responseApi(200, '', new FinishTypeResource(FinishType::all()), [], '');
    }
}
