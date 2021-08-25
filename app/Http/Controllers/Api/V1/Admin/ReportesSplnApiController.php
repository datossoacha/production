<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportesSplnRequest;
use App\Http\Requests\UpdateReportesSplnRequest;
use App\Http\Resources\Admin\ReportesSplnResource;
use App\Models\ReportesSpln;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReportesSplnApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reportes_spln_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReportesSplnResource(ReportesSpln::with(['usuario'])->get());
    }

    public function store(StoreReportesSplnRequest $request)
    {
        $reportesSpln = ReportesSpln::create($request->all());

        return (new ReportesSplnResource($reportesSpln))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ReportesSpln $reportesSpln)
    {
        abort_if(Gate::denies('reportes_spln_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReportesSplnResource($reportesSpln->load(['usuario']));
    }

    public function update(UpdateReportesSplnRequest $request, ReportesSpln $reportesSpln)
    {
        $reportesSpln->update($request->all());

        return (new ReportesSplnResource($reportesSpln))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ReportesSpln $reportesSpln)
    {
        abort_if(Gate::denies('reportes_spln_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesSpln->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
