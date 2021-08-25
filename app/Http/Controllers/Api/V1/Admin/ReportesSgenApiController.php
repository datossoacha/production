<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportesSgenRequest;
use App\Http\Requests\UpdateReportesSgenRequest;
use App\Http\Resources\Admin\ReportesSgenResource;
use App\Models\ReportesSgen;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReportesSgenApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reportes_sgen_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReportesSgenResource(ReportesSgen::with(['usuario'])->get());
    }

    public function store(StoreReportesSgenRequest $request)
    {
        $reportesSgen = ReportesSgen::create($request->all());

        return (new ReportesSgenResource($reportesSgen))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ReportesSgen $reportesSgen)
    {
        abort_if(Gate::denies('reportes_sgen_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReportesSgenResource($reportesSgen->load(['usuario']));
    }

    public function update(UpdateReportesSgenRequest $request, ReportesSgen $reportesSgen)
    {
        $reportesSgen->update($request->all());

        return (new ReportesSgenResource($reportesSgen))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ReportesSgen $reportesSgen)
    {
        abort_if(Gate::denies('reportes_sgen_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesSgen->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
