<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInstitucioneRequest;
use App\Http\Requests\UpdateInstitucioneRequest;
use App\Http\Resources\Admin\InstitucioneResource;
use App\Models\Institucione;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InstitucionesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('institucione_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InstitucioneResource(Institucione::with(['comuna'])->get());
    }

    public function store(StoreInstitucioneRequest $request)
    {
        $institucione = Institucione::create($request->all());

        return (new InstitucioneResource($institucione))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Institucione $institucione)
    {
        abort_if(Gate::denies('institucione_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InstitucioneResource($institucione->load(['comuna']));
    }

    public function update(UpdateInstitucioneRequest $request, Institucione $institucione)
    {
        $institucione->update($request->all());

        return (new InstitucioneResource($institucione))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Institucione $institucione)
    {
        abort_if(Gate::denies('institucione_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $institucione->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
