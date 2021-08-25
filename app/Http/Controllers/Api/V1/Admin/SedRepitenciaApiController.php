<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSedRepitenciumRequest;
use App\Http\Requests\UpdateSedRepitenciumRequest;
use App\Http\Resources\Admin\SedRepitenciumResource;
use App\Models\SedRepitencium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SedRepitenciaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sed_repitencium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedRepitenciumResource(SedRepitencium::all());
    }

    public function store(StoreSedRepitenciumRequest $request)
    {
        $sedRepitencium = SedRepitencium::create($request->all());

        return (new SedRepitenciumResource($sedRepitencium))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SedRepitencium $sedRepitencium)
    {
        abort_if(Gate::denies('sed_repitencium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedRepitenciumResource($sedRepitencium);
    }

    public function update(UpdateSedRepitenciumRequest $request, SedRepitencium $sedRepitencium)
    {
        $sedRepitencium->update($request->all());

        return (new SedRepitenciumResource($sedRepitencium))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SedRepitencium $sedRepitencium)
    {
        abort_if(Gate::denies('sed_repitencium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedRepitencium->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
