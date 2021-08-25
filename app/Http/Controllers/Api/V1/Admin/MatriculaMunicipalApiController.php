<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMatriculaMunicipalRequest;
use App\Http\Requests\UpdateMatriculaMunicipalRequest;
use App\Http\Resources\Admin\MatriculaMunicipalResource;
use App\Models\MatriculaMunicipal;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MatriculaMunicipalApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('matricula_municipal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MatriculaMunicipalResource(MatriculaMunicipal::with(['comuna'])->get());
    }

    public function store(StoreMatriculaMunicipalRequest $request)
    {
        $matriculaMunicipal = MatriculaMunicipal::create($request->all());

        return (new MatriculaMunicipalResource($matriculaMunicipal))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MatriculaMunicipal $matriculaMunicipal)
    {
        abort_if(Gate::denies('matricula_municipal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MatriculaMunicipalResource($matriculaMunicipal->load(['comuna']));
    }

    public function update(UpdateMatriculaMunicipalRequest $request, MatriculaMunicipal $matriculaMunicipal)
    {
        $matriculaMunicipal->update($request->all());

        return (new MatriculaMunicipalResource($matriculaMunicipal))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MatriculaMunicipal $matriculaMunicipal)
    {
        abort_if(Gate::denies('matricula_municipal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $matriculaMunicipal->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
