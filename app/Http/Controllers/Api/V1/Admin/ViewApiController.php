<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ViewResource;
use App\Models\View;

class ViewApiController extends Controller
{
    public function index()
    {
        return responseApi(200, '', new ViewResource(View::all()), [], '');
    }
}