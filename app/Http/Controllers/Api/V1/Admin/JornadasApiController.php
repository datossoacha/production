<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJornadaRequest;
use App\Http\Requests\UpdateJornadaRequest;
use App\Http\Resources\Admin\JornadaResource;
use App\Models\Jornada;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JornadasApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jornada_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JornadaResource(Jornada::all());
    }

    public function store(StoreJornadaRequest $request)
    {
        $jornada = Jornada::create($request->all());

        return (new JornadaResource($jornada))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Jornada $jornada)
    {
        abort_if(Gate::denies('jornada_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JornadaResource($jornada);
    }

    public function update(UpdateJornadaRequest $request, Jornada $jornada)
    {
        $jornada->update($request->all());

        return (new JornadaResource($jornada))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Jornada $jornada)
    {
        abort_if(Gate::denies('jornada_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jornada->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
