<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReportesSinfRequest;
use App\Http\Requests\StoreReportesSinfRequest;
use App\Http\Requests\UpdateReportesSinfRequest;
use App\Models\ReportesSinf;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ReportesSinfController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('reportes_sinf_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ReportesSinf::with(['usuario'])->select(sprintf('%s.*', (new ReportesSinf())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'reportes_sinf_show';
                $editGate = 'reportes_sinf_edit';
                $deleteGate = 'reportes_sinf_delete';
                $crudRoutePart = 'reportes-sinfs';

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

        return view('admin.reportesSinfs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('reportes_sinf_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reportesSinfs.create', compact('usuarios'));
    }

    public function store(StoreReportesSinfRequest $request)
    {
        $reportesSinf = ReportesSinf::create($request->all());

        return redirect()->route('admin.reportes-sinfs.index');
    }

    public function edit(ReportesSinf $reportesSinf)
    {
        abort_if(Gate::denies('reportes_sinf_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reportesSinf->load('usuario');

        return view('admin.reportesSinfs.edit', compact('usuarios', 'reportesSinf'));
    }

    public function update(UpdateReportesSinfRequest $request, ReportesSinf $reportesSinf)
    {
        $reportesSinf->update($request->all());

        return redirect()->route('admin.reportes-sinfs.index');
    }

    public function show(ReportesSinf $reportesSinf)
    {
        abort_if(Gate::denies('reportes_sinf_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesSinf->load('usuario');

        return view('admin.reportesSinfs.show', compact('reportesSinf'));
    }

    public function destroy(ReportesSinf $reportesSinf)
    {
        abort_if(Gate::denies('reportes_sinf_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesSinf->delete();

        return back();
    }

    public function massDestroy(MassDestroyReportesSinfRequest $request)
    {
        ReportesSinf::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
