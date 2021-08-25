<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReporteEsemRequest;
use App\Http\Requests\StoreReporteEsemRequest;
use App\Http\Requests\UpdateReporteEsemRequest;
use App\Models\ReporteEsem;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ReporteEsemController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('reporte_esem_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ReporteEsem::with(['usuario'])->select(sprintf('%s.*', (new ReporteEsem())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'reporte_esem_show';
                $editGate = 'reporte_esem_edit';
                $deleteGate = 'reporte_esem_delete';
                $crudRoutePart = 'reporte-esems';

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

        return view('admin.reporteEsems.index');
    }

    public function create()
    {
        abort_if(Gate::denies('reporte_esem_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reporteEsems.create', compact('usuarios'));
    }

    public function store(StoreReporteEsemRequest $request)
    {
        $reporteEsem = ReporteEsem::create($request->all());

        return redirect()->route('admin.reporte-esems.index');
    }

    public function edit(ReporteEsem $reporteEsem)
    {
        abort_if(Gate::denies('reporte_esem_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reporteEsem->load('usuario');

        return view('admin.reporteEsems.edit', compact('usuarios', 'reporteEsem'));
    }

    public function update(UpdateReporteEsemRequest $request, ReporteEsem $reporteEsem)
    {
        $reporteEsem->update($request->all());

        return redirect()->route('admin.reporte-esems.index');
    }

    public function show(ReporteEsem $reporteEsem)
    {
        abort_if(Gate::denies('reporte_esem_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reporteEsem->load('usuario');

        return view('admin.reporteEsems.show', compact('reporteEsem'));
    }

    public function destroy(ReporteEsem $reporteEsem)
    {
        abort_if(Gate::denies('reporte_esem_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reporteEsem->delete();

        return back();
    }

    public function massDestroy(MassDestroyReporteEsemRequest $request)
    {
        ReporteEsem::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
