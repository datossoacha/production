<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSedArtisticaFormacioneRequest;
use App\Http\Requests\UpdateSedArtisticaFormacioneRequest;
use App\Http\Resources\Admin\SedArtisticaFormacioneResource;
use App\Models\SedArtisticaFormacione;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SedArtisticaFormacionesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sed_artistica_formacione_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedArtisticaFormacioneResource(SedArtisticaFormacione::all());
    }

    public function store(StoreSedArtisticaFormacioneRequest $request)
    {
        $sedArtisticaFormacione = SedArtisticaFormacione::create($request->all());

        return (new SedArtisticaFormacioneResource($sedArtisticaFormacione))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SedArtisticaFormacione $sedArtisticaFormacione)
    {
        abort_if(Gate::denies('sed_artistica_formacione_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedArtisticaFormacioneResource($sedArtisticaFormacione);
    }

    public function update(UpdateSedArtisticaFormacioneRequest $request, SedArtisticaFormacione $sedArtisticaFormacione)
    {
        $sedArtisticaFormacione->update($request->all());

        return (new SedArtisticaFormacioneResource($sedArtisticaFormacione))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SedArtisticaFormacione $sedArtisticaFormacione)
    {
        abort_if(Gate::denies('sed_artistica_formacione_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedArtisticaFormacione->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
