<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactuRequest;
use App\Http\Requests\UpdateContactuRequest;
use App\Http\Resources\Admin\ContactuResource;
use App\Models\Contactu;
use Symfony\Component\HttpFoundation\Response;

class ContactusApiController extends Controller
{
    public function index()
    {
        //return new ContactuResource(Contactu::all());
    }

    public function store(StoreContactuRequest $request)
    {
        $contactu = Contactu::create($request->all());

        return (new ContactuResource($contactu))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Contactu $contactu)
    {
        //  return new ContactuResource($contactu);
    }

    public function update(UpdateContactuRequest $request, Contactu $contactu)
    {
    }

    public function destroy(Contactu $contactu)
    {
    }
}