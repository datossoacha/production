<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReportesIrdpRequest;
use App\Http\Requests\StoreReportesIrdpRequest;
use App\Http\Requests\UpdateReportesIrdpRequest;
use App\Models\ReportesIrdp;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ReportesIrdpController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('reportes_irdp_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ReportesIrdp::with(['usuario'])->select(sprintf('%s.*', (new ReportesIrdp())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'reportes_irdp_show';
                $editGate = 'reportes_irdp_edit';
                $deleteGate = 'reportes_irdp_delete';
                $crudRoutePart = 'reportes-irdps';

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

            $table->addColumn('usuario_name', function ($row) {
                return $row->usuario ? $row->usuario->name : '';
            });

            $table->editColumn('observaciones', function ($row) {
                return $row->observaciones ? $row->observaciones : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'usuario']);

            return $table->make(true);
        }

        return view('admin.reportesIrdps.index');
    }

    public function create()
    {
        abort_if(Gate::denies('reportes_irdp_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reportesIrdps.create', compact('usuarios'));
    }

    public function store(StoreReportesIrdpRequest $request)
    {
        $reportesIrdp = ReportesIrdp::create($request->all());

        return redirect()->route('admin.reportes-irdps.index');
    }

    public function edit(ReportesIrdp $reportesIrdp)
    {
        abort_if(Gate::denies('reportes_irdp_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reportesIrdp->load('usuario');

        return view('admin.reportesIrdps.edit', compact('usuarios', 'reportesIrdp'));
    }

    public function update(UpdateReportesIrdpRequest $request, ReportesIrdp $reportesIrdp)
    {
        $reportesIrdp->update($request->all());

        return redirect()->route('admin.reportes-irdps.index');
    }

    public function show(ReportesIrdp $reportesIrdp)
    {
        abort_if(Gate::denies('reportes_irdp_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesIrdp->load('usuario');

        return view('admin.reportesIrdps.show', compact('reportesIrdp'));
    }

    public function destroy(ReportesIrdp $reportesIrdp)
    {
        abort_if(Gate::denies('reportes_irdp_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesIrdp->delete();

        return back();
    }

    public function massDestroy(MassDestroyReportesIrdpRequest $request)
    {
        ReportesIrdp::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
