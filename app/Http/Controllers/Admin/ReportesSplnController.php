<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReportesSplnRequest;
use App\Http\Requests\StoreReportesSplnRequest;
use App\Http\Requests\UpdateReportesSplnRequest;
use App\Models\ReportesSpln;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ReportesSplnController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('reportes_spln_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ReportesSpln::with(['usuario'])->select(sprintf('%s.*', (new ReportesSpln())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'reportes_spln_show';
                $editGate = 'reportes_spln_edit';
                $deleteGate = 'reportes_spln_delete';
                $crudRoutePart = 'reportes-splns';

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

        return view('admin.reportesSplns.index');
    }

    public function create()
    {
        abort_if(Gate::denies('reportes_spln_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reportesSplns.create', compact('usuarios'));
    }

    public function store(StoreReportesSplnRequest $request)
    {
        $reportesSpln = ReportesSpln::create($request->all());

        return redirect()->route('admin.reportes-splns.index');
    }

    public function edit(ReportesSpln $reportesSpln)
    {
        abort_if(Gate::denies('reportes_spln_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reportesSpln->load('usuario');

        return view('admin.reportesSplns.edit', compact('usuarios', 'reportesSpln'));
    }

    public function update(UpdateReportesSplnRequest $request, ReportesSpln $reportesSpln)
    {
        $reportesSpln->update($request->all());

        return redirect()->route('admin.reportes-splns.index');
    }

    public function show(ReportesSpln $reportesSpln)
    {
        abort_if(Gate::denies('reportes_spln_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesSpln->load('usuario');

        return view('admin.reportesSplns.show', compact('reportesSpln'));
    }

    public function destroy(ReportesSpln $reportesSpln)
    {
        abort_if(Gate::denies('reportes_spln_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesSpln->delete();

        return back();
    }

    public function massDestroy(MassDestroyReportesSplnRequest $request)
    {
        ReportesSpln::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
