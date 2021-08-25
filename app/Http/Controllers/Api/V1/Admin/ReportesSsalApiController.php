<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportesSsalRequest;
use App\Http\Requests\UpdateReportesSsalRequest;
use App\Http\Resources\Admin\ReportesSsalResource;
use App\Models\ReportesSsal;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReportesSsalApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reportes_ssal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReportesSsalResource(ReportesSsal::with(['usuario'])->get());
    }

    public function store(StoreReportesSsalRequest $request)
    {
        $reportesSsal = ReportesSsal::create($request->all());

        return (new ReportesSsalResource($reportesSsal))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ReportesSsal $reportesSsal)
    {
        abort_if(Gate::denies('reportes_ssal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReportesSsalResource($reportesSsal->load(['usuario']));
    }

    public function update(UpdateReportesSsalRequest $request, ReportesSsal $reportesSsal)
    {
        $reportesSsal->update($request->all());

        return (new ReportesSsalResource($reportesSsal))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ReportesSsal $reportesSsal)
    {
        abort_if(Gate::denies('reportes_ssal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesSsal->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
