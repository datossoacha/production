<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSedPlantaPersonalRequest;
use App\Http\Requests\UpdateSedPlantaPersonalRequest;
use App\Http\Resources\Admin\SedPlantaPersonalResource;
use App\Models\SedPlantaPersonal;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SedPlantaPersonalApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sed_planta_personal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedPlantaPersonalResource(SedPlantaPersonal::with(['comuna'])->get());
    }

    public function store(StoreSedPlantaPersonalRequest $request)
    {
        $sedPlantaPersonal = SedPlantaPersonal::create($request->all());

        return (new SedPlantaPersonalResource($sedPlantaPersonal))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SedPlantaPersonal $sedPlantaPersonal)
    {
        abort_if(Gate::denies('sed_planta_personal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedPlantaPersonalResource($sedPlantaPersonal->load(['comuna']));
    }

    public function update(UpdateSedPlantaPersonalRequest $request, SedPlantaPersonal $sedPlantaPersonal)
    {
        $sedPlantaPersonal->update($request->all());

        return (new SedPlantaPersonalResource($sedPlantaPersonal))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SedPlantaPersonal $sedPlantaPersonal)
    {
        abort_if(Gate::denies('sed_planta_personal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedPlantaPersonal->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
