<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMunicipioRequest;
use App\Http\Requests\UpdateMunicipioRequest;
use App\Http\Resources\Admin\MunicipioResource;
use App\Models\Municipio;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MunicipiosApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('municipio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MunicipioResource(Municipio::with(['departamento'])->get());
    }

    public function store(StoreMunicipioRequest $request)
    {
        $municipio = Municipio::create($request->all());

        return (new MunicipioResource($municipio))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Municipio $municipio)
    {
        abort_if(Gate::denies('municipio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MunicipioResource($municipio->load(['departamento']));
    }

    public function update(UpdateMunicipioRequest $request, Municipio $municipio)
    {
        $municipio->update($request->all());

        return (new MunicipioResource($municipio))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Municipio $municipio)
    {
        abort_if(Gate::denies('municipio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $municipio->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
