<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSedRecursoRequest;
use App\Http\Requests\UpdateSedRecursoRequest;
use App\Http\Resources\Admin\SedRecursoResource;
use App\Models\SedRecurso;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SedRecursosApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sed_recurso_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedRecursoResource(SedRecurso::all());
    }

    public function store(StoreSedRecursoRequest $request)
    {
        $sedRecurso = SedRecurso::create($request->all());

        return (new SedRecursoResource($sedRecurso))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SedRecurso $sedRecurso)
    {
        abort_if(Gate::denies('sed_recurso_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedRecursoResource($sedRecurso);
    }

    public function update(UpdateSedRecursoRequest $request, SedRecurso $sedRecurso)
    {
        $sedRecurso->update($request->all());

        return (new SedRecursoResource($sedRecurso))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SedRecurso $sedRecurso)
    {
        abort_if(Gate::denies('sed_recurso_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedRecurso->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
