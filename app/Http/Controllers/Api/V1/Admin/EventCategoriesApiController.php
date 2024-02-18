<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\EventCategoryResource;
use App\Models\EventCategory;

class EventCategoriesApiController extends Controller
{
    public function index()
    {
        return new EventCategoryResource(EventCategory::all());
    }
}
