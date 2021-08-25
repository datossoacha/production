<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportesSdeRequest;
use App\Http\Requests\UpdateReportesSdeRequest;
use App\Http\Resources\Admin\ReportesSdeResource;
use App\Models\ReportesSde;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReportesSdesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reportes_sde_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReportesSdeResource(ReportesSde::with(['usuario'])->get());
    }

    public function store(StoreReportesSdeRequest $request)
    {
        $reportesSde = ReportesSde::create($request->all());

        return (new ReportesSdeResource($reportesSde))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ReportesSde $reportesSde)
    {
        abort_if(Gate::denies('reportes_sde_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReportesSdeResource($reportesSde->load(['usuario']));
    }

    public function update(UpdateReportesSdeRequest $request, ReportesSde $reportesSde)
    {
        $reportesSde->update($request->all());

        return (new ReportesSdeResource($reportesSde))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ReportesSde $reportesSde)
    {
        abort_if(Gate::denies('reportes_sde_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesSde->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
