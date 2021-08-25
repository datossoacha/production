<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportesSeduRequest;
use App\Http\Requests\UpdateReportesSeduRequest;
use App\Http\Resources\Admin\ReportesSeduResource;
use App\Models\ReportesSedu;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReportesSeduApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reportes_sedu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReportesSeduResource(ReportesSedu::with(['created_by'])->get());
    }

    public function store(StoreReportesSeduRequest $request)
    {
        $reportesSedu = ReportesSedu::create($request->all());

        return (new ReportesSeduResource($reportesSedu))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ReportesSedu $reportesSedu)
    {
        abort_if(Gate::denies('reportes_sedu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReportesSeduResource($reportesSedu->load(['created_by']));
    }

    public function update(UpdateReportesSeduRequest $request, ReportesSedu $reportesSedu)
    {
        $reportesSedu->update($request->all());

        return (new ReportesSeduResource($reportesSedu))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ReportesSedu $reportesSedu)
    {
        abort_if(Gate::denies('reportes_sedu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesSedu->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
