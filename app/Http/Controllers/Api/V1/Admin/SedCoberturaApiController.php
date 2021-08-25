<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSedCoberturaRequest;
use App\Http\Requests\UpdateSedCoberturaRequest;
use App\Http\Resources\Admin\SedCoberturaResource;
use App\Models\SedCobertura;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SedCoberturaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sed_cobertura_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedCoberturaResource(SedCobertura::all());
    }

    public function store(StoreSedCoberturaRequest $request)
    {
        $sedCobertura = SedCobertura::create($request->all());

        return (new SedCoberturaResource($sedCobertura))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SedCobertura $sedCobertura)
    {
        abort_if(Gate::denies('sed_cobertura_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedCoberturaResource($sedCobertura);
    }

    public function update(UpdateSedCoberturaRequest $request, SedCobertura $sedCobertura)
    {
        $sedCobertura->update($request->all());

        return (new SedCoberturaResource($sedCobertura))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SedCobertura $sedCobertura)
    {
        abort_if(Gate::denies('sed_cobertura_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedCobertura->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
