<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReportesSgenRequest;
use App\Http\Requests\StoreReportesSgenRequest;
use App\Http\Requests\UpdateReportesSgenRequest;
use App\Models\ReportesSgen;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ReportesSgenController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('reportes_sgen_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ReportesSgen::with(['usuario'])->select(sprintf('%s.*', (new ReportesSgen())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'reportes_sgen_show';
                $editGate = 'reportes_sgen_edit';
                $deleteGate = 'reportes_sgen_delete';
                $crudRoutePart = 'reportes-sgens';

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

        return view('admin.reportesSgens.index');
    }

    public function create()
    {
        abort_if(Gate::denies('reportes_sgen_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reportesSgens.create', compact('usuarios'));
    }

    public function store(StoreReportesSgenRequest $request)
    {
        $reportesSgen = ReportesSgen::create($request->all());

        return redirect()->route('admin.reportes-sgens.index');
    }

    public function edit(ReportesSgen $reportesSgen)
    {
        abort_if(Gate::denies('reportes_sgen_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reportesSgen->load('usuario');

        return view('admin.reportesSgens.edit', compact('usuarios', 'reportesSgen'));
    }

    public function update(UpdateReportesSgenRequest $request, ReportesSgen $reportesSgen)
    {
        $reportesSgen->update($request->all());

        return redirect()->route('admin.reportes-sgens.index');
    }

    public function show(ReportesSgen $reportesSgen)
    {
        abort_if(Gate::denies('reportes_sgen_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesSgen->load('usuario');

        return view('admin.reportesSgens.show', compact('reportesSgen'));
    }

    public function destroy(ReportesSgen $reportesSgen)
    {
        abort_if(Gate::denies('reportes_sgen_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesSgen->delete();

        return back();
    }

    public function massDestroy(MassDestroyReportesSgenRequest $request)
    {
        ReportesSgen::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
