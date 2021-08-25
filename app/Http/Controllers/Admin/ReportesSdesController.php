<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReportesSdeRequest;
use App\Http\Requests\StoreReportesSdeRequest;
use App\Http\Requests\UpdateReportesSdeRequest;
use App\Models\ReportesSde;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ReportesSdesController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('reportes_sde_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ReportesSde::with(['usuario'])->select(sprintf('%s.*', (new ReportesSde())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'reportes_sde_show';
                $editGate = 'reportes_sde_edit';
                $deleteGate = 'reportes_sde_delete';
                $crudRoutePart = 'reportes-sdes';

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

        return view('admin.reportesSdes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('reportes_sde_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reportesSdes.create', compact('usuarios'));
    }

    public function store(StoreReportesSdeRequest $request)
    {
        $reportesSde = ReportesSde::create($request->all());

        return redirect()->route('admin.reportes-sdes.index');
    }

    public function edit(ReportesSde $reportesSde)
    {
        abort_if(Gate::denies('reportes_sde_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reportesSde->load('usuario');

        return view('admin.reportesSdes.edit', compact('usuarios', 'reportesSde'));
    }

    public function update(UpdateReportesSdeRequest $request, ReportesSde $reportesSde)
    {
        $reportesSde->update($request->all());

        return redirect()->route('admin.reportes-sdes.index');
    }

    public function show(ReportesSde $reportesSde)
    {
        abort_if(Gate::denies('reportes_sde_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesSde->load('usuario');

        return view('admin.reportesSdes.show', compact('reportesSde'));
    }

    public function destroy(ReportesSde $reportesSde)
    {
        abort_if(Gate::denies('reportes_sde_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesSde->delete();

        return back();
    }

    public function massDestroy(MassDestroyReportesSdeRequest $request)
    {
        ReportesSde::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
