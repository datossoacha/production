<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSedCalificacionDocenteRequest;
use App\Http\Requests\UpdateSedCalificacionDocenteRequest;
use App\Http\Resources\Admin\SedCalificacionDocenteResource;
use App\Models\SedCalificacionDocente;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SedCalificacionDocenteApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sed_calificacion_docente_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedCalificacionDocenteResource(SedCalificacionDocente::with(['institucion', 'sede', 'comuna'])->get());
    }

    public function store(StoreSedCalificacionDocenteRequest $request)
    {
        $sedCalificacionDocente = SedCalificacionDocente::create($request->all());

        return (new SedCalificacionDocenteResource($sedCalificacionDocente))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SedCalificacionDocente $sedCalificacionDocente)
    {
        abort_if(Gate::denies('sed_calificacion_docente_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedCalificacionDocenteResource($sedCalificacionDocente->load(['institucion', 'sede', 'comuna']));
    }

    public function update(UpdateSedCalificacionDocenteRequest $request, SedCalificacionDocente $sedCalificacionDocente)
    {
        $sedCalificacionDocente->update($request->all());

        return (new SedCalificacionDocenteResource($sedCalificacionDocente))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SedCalificacionDocente $sedCalificacionDocente)
    {
        abort_if(Gate::denies('sed_calificacion_docente_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedCalificacionDocente->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
