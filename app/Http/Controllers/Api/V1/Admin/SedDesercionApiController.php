<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSedDesercionRequest;
use App\Http\Requests\UpdateSedDesercionRequest;
use App\Http\Resources\Admin\SedDesercionResource;
use App\Models\SedDesercion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SedDesercionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sed_desercion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedDesercionResource(SedDesercion::all());
    }

    public function store(StoreSedDesercionRequest $request)
    {
        $sedDesercion = SedDesercion::create($request->all());

        return (new SedDesercionResource($sedDesercion))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SedDesercion $sedDesercion)
    {
        abort_if(Gate::denies('sed_desercion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedDesercionResource($sedDesercion);
    }

    public function update(UpdateSedDesercionRequest $request, SedDesercion $sedDesercion)
    {
        $sedDesercion->update($request->all());

        return (new SedDesercionResource($sedDesercion))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SedDesercion $sedDesercion)
    {
        abort_if(Gate::denies('sed_desercion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedDesercion->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
