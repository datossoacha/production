<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReportesSeduRequest;
use App\Http\Requests\StoreReportesSeduRequest;
use App\Http\Requests\UpdateReportesSeduRequest;
use App\Models\ReportesSedu;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ReportesSeduController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('reportes_sedu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ReportesSedu::with(['created_by'])->select(sprintf('%s.*', (new ReportesSedu())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'reportes_sedu_show';
                $editGate = 'reportes_sedu_edit';
                $deleteGate = 'reportes_sedu_delete';
                $crudRoutePart = 'reportes-sedus';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('nombre', function ($row) {
                return $row->nombre ? $row->nombre : '';
            });
            $table->editColumn('codigo', function ($row) {
                return $row->codigo ? $row->codigo : '';
            });

            $table->editColumn('observaciones', function ($row) {
                return $row->observaciones ? $row->observaciones : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.reportesSedus.index');
    }

    public function create()
    {
        abort_if(Gate::denies('reportes_sedu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reportesSedus.create');
    }

    public function store(StoreReportesSeduRequest $request)
    {
        $reportesSedu = ReportesSedu::create($request->all());

        return redirect()->route('admin.reportes-sedus.index');
    }

    public function edit(ReportesSedu $reportesSedu)
    {
        abort_if(Gate::denies('reportes_sedu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesSedu->load('created_by');

        return view('admin.reportesSedus.edit', compact('reportesSedu'));
    }

    public function update(UpdateReportesSeduRequest $request, ReportesSedu $reportesSedu)
    {
        $reportesSedu->update($request->all());

        return redirect()->route('admin.reportes-sedus.index');
    }

    public function show(ReportesSedu $reportesSedu)
    {
        abort_if(Gate::denies('reportes_sedu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesSedu->load('created_by');

        return view('admin.reportesSedus.show', compact('reportesSedu'));
    }

    public function destroy(ReportesSedu $reportesSedu)
    {
        abort_if(Gate::denies('reportes_sedu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesSedu->delete();

        return back();
    }

    public function massDestroy(MassDestroyReportesSeduRequest $request)
    {
        ReportesSedu::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
