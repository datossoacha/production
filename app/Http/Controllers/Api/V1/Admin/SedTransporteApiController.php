<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSedTransporteRequest;
use App\Http\Requests\UpdateSedTransporteRequest;
use App\Http\Resources\Admin\SedTransporteResource;
use App\Models\SedTransporte;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SedTransporteApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sed_transporte_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedTransporteResource(SedTransporte::with(['comuna', 'institucion', 'sede'])->get());
    }

    public function store(StoreSedTransporteRequest $request)
    {
        $sedTransporte = SedTransporte::create($request->all());

        return (new SedTransporteResource($sedTransporte))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SedTransporte $sedTransporte)
    {
        abort_if(Gate::denies('sed_transporte_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedTransporteResource($sedTransporte->load(['comuna', 'institucion', 'sede']));
    }

    public function update(UpdateSedTransporteRequest $request, SedTransporte $sedTransporte)
    {
        $sedTransporte->update($request->all());

        return (new SedTransporteResource($sedTransporte))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SedTransporte $sedTransporte)
    {
        abort_if(Gate::denies('sed_transporte_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedTransporte->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
