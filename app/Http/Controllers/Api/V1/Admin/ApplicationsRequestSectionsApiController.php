<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ApplicationsRequestSectionResource;
use App\Models\ApplicationsRequestSection;

class ApplicationsRequestSectionsApiController extends Controller
{
    public function index()
    {
        return responseApi(200, '', new ApplicationsRequestSectionResource(ApplicationsRequestSection::all()), [], '');
    }
}