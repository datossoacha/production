<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSedClasificacionSaberRequest;
use App\Http\Requests\UpdateSedClasificacionSaberRequest;
use App\Http\Resources\Admin\SedClasificacionSaberResource;
use App\Models\SedClasificacionSaber;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SedClasificacionSaberApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sed_clasificacion_saber_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedClasificacionSaberResource(SedClasificacionSaber::with(['comuna'])->get());
    }

    public function store(StoreSedClasificacionSaberRequest $request)
    {
        $sedClasificacionSaber = SedClasificacionSaber::create($request->all());

        return (new SedClasificacionSaberResource($sedClasificacionSaber))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SedClasificacionSaber $sedClasificacionSaber)
    {
        abort_if(Gate::denies('sed_clasificacion_saber_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedClasificacionSaberResource($sedClasificacionSaber->load(['comuna']));
    }

    public function update(UpdateSedClasificacionSaberRequest $request, SedClasificacionSaber $sedClasificacionSaber)
    {
        $sedClasificacionSaber->update($request->all());

        return (new SedClasificacionSaberResource($sedClasificacionSaber))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SedClasificacionSaber $sedClasificacionSaber)
    {
        abort_if(Gate::denies('sed_clasificacion_saber_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedClasificacionSaber->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
