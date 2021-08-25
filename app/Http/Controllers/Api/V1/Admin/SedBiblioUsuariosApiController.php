<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSedBiblioUsuarioRequest;
use App\Http\Requests\UpdateSedBiblioUsuarioRequest;
use App\Http\Resources\Admin\SedBiblioUsuarioResource;
use App\Models\SedBiblioUsuario;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SedBiblioUsuariosApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sed_biblio_usuario_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedBiblioUsuarioResource(SedBiblioUsuario::all());
    }

    public function store(StoreSedBiblioUsuarioRequest $request)
    {
        $sedBiblioUsuario = SedBiblioUsuario::create($request->all());

        return (new SedBiblioUsuarioResource($sedBiblioUsuario))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SedBiblioUsuario $sedBiblioUsuario)
    {
        abort_if(Gate::denies('sed_biblio_usuario_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedBiblioUsuarioResource($sedBiblioUsuario);
    }

    public function update(UpdateSedBiblioUsuarioRequest $request, SedBiblioUsuario $sedBiblioUsuario)
    {
        $sedBiblioUsuario->update($request->all());

        return (new SedBiblioUsuarioResource($sedBiblioUsuario))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SedBiblioUsuario $sedBiblioUsuario)
    {
        abort_if(Gate::denies('sed_biblio_usuario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedBiblioUsuario->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
