<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSedEstimulosGestoreRequest;
use App\Http\Requests\UpdateSedEstimulosGestoreRequest;
use App\Http\Resources\Admin\SedEstimulosGestoreResource;
use App\Models\SedEstimulosGestore;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SedEstimulosGestoresApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sed_estimulos_gestore_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedEstimulosGestoreResource(SedEstimulosGestore::all());
    }

    public function store(StoreSedEstimulosGestoreRequest $request)
    {
        $sedEstimulosGestore = SedEstimulosGestore::create($request->all());

        return (new SedEstimulosGestoreResource($sedEstimulosGestore))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SedEstimulosGestore $sedEstimulosGestore)
    {
        abort_if(Gate::denies('sed_estimulos_gestore_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SedEstimulosGestoreResource($sedEstimulosGestore);
    }

    public function update(UpdateSedEstimulosGestoreRequest $request, SedEstimulosGestore $sedEstimulosGestore)
    {
        $sedEstimulosGestore->update($request->all());

        return (new SedEstimulosGestoreResource($sedEstimulosGestore))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SedEstimulosGestore $sedEstimulosGestore)
    {
        abort_if(Gate::denies('sed_estimulos_gestore_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedEstimulosGestore->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
