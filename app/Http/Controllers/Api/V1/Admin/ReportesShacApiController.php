<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportesShacRequest;
use App\Http\Requests\UpdateReportesShacRequest;
use App\Http\Resources\Admin\ReportesShacResource;
use App\Models\ReportesShac;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReportesShacApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reportes_shac_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReportesShacResource(ReportesShac::with(['usuario'])->get());
    }

    public function store(StoreReportesShacRequest $request)
    {
        $reportesShac = ReportesShac::create($request->all());

        return (new ReportesShacResource($reportesShac))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ReportesShac $reportesShac)
    {
        abort_if(Gate::denies('reportes_shac_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReportesShacResource($reportesShac->load(['usuario']));
    }

    public function update(UpdateReportesShacRequest $request, ReportesShac $reportesShac)
    {
        $reportesShac->update($request->all());

        return (new ReportesShacResource($reportesShac))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ReportesShac $reportesShac)
    {
        abort_if(Gate::denies('reportes_shac_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesShac->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
