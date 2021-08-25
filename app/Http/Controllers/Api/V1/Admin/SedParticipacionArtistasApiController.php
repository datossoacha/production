<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSedParticipacionArtistumRequest;
use App\Http\Requests\UpdateSedParticipacionArtistumRequest;
use App\Http\Resources\Admin\SedParticipacionArtistumResource;
use App\Models\SedParticipacionArtistum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SedParticipacionArtistasApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sed_participacion_artistum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedParticipacionArtistumResource(SedParticipacionArtistum::all());
    }

    public function store(StoreSedParticipacionArtistumRequest $request)
    {
        $sedParticipacionArtistum = SedParticipacionArtistum::create($request->all());

        return (new SedParticipacionArtistumResource($sedParticipacionArtistum))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SedParticipacionArtistum $sedParticipacionArtistum)
    {
        abort_if(Gate::denies('sed_participacion_artistum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedParticipacionArtistumResource($sedParticipacionArtistum);
    }

    public function update(UpdateSedParticipacionArtistumRequest $request, SedParticipacionArtistum $sedParticipacionArtistum)
    {
        $sedParticipacionArtistum->update($request->all());

        return (new SedParticipacionArtistumResource($sedParticipacionArtistum))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SedParticipacionArtistum $sedParticipacionArtistum)
    {
        abort_if(Gate::denies('sed_participacion_artistum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedParticipacionArtistum->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
