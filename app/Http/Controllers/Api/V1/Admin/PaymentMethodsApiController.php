<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\PaymentMethodResource;
use App\Models\PaymentMethod;

class PaymentMethodsApiController extends Controller
{
    public function index()
    {
        return responseApi(200, '', new PaymentMethodResource(PaymentMethod::all()), [], '');
    }
}