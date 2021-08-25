<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSedAlimentacionRequest;
use App\Http\Requests\UpdateSedAlimentacionRequest;
use App\Http\Resources\Admin\SedAlimentacionResource;
use App\Models\SedAlimentacion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SedAlimentacionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sed_alimentacion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedAlimentacionResource(SedAlimentacion::with(['comuna', 'institucion', 'sede'])->get());
    }

    public function store(StoreSedAlimentacionRequest $request)
    {
        $sedAlimentacion = SedAlimentacion::create($request->all());

        return (new SedAlimentacionResource($sedAlimentacion))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SedAlimentacion $sedAlimentacion)
    {
        abort_if(Gate::denies('sed_alimentacion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedAlimentacionResource($sedAlimentacion->load(['comuna', 'institucion', 'sede']));
    }

    public function update(UpdateSedAlimentacionRequest $request, SedAlimentacion $sedAlimentacion)
    {
        $sedAlimentacion->update($request->all());

        return (new SedAlimentacionResource($sedAlimentacion))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SedAlimentacion $sedAlimentacion)
    {
        abort_if(Gate::denies('sed_alimentacion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedAlimentacion->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
