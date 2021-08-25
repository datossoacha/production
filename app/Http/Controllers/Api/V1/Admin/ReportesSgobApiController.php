<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportesSgobRequest;
use App\Http\Requests\UpdateReportesSgobRequest;
use App\Http\Resources\Admin\ReportesSgobResource;
use App\Models\ReportesSgob;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReportesSgobApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reportes_sgob_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReportesSgobResource(ReportesSgob::with(['usuario'])->get());
    }

    public function store(StoreReportesSgobRequest $request)
    {
        $reportesSgob = ReportesSgob::create($request->all());

        return (new ReportesSgobResource($reportesSgob))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ReportesSgob $reportesSgob)
    {
        abort_if(Gate::denies('reportes_sgob_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReportesSgobResource($reportesSgob->load(['usuario']));
    }

    public function update(UpdateReportesSgobRequest $request, ReportesSgob $reportesSgob)
    {
        $reportesSgob->update($request->all());

        return (new ReportesSgobResource($reportesSgob))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ReportesSgob $reportesSgob)
    {
        abort_if(Gate::denies('reportes_sgob_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesSgob->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
