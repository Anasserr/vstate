<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\SliderResource;
use App\Models\Slider;

class SliderApiController extends Controller
{
    public function __invoke()
    {
        return responseApi(200, '', new SliderResource(Slider::all()), [], '');
    }
}