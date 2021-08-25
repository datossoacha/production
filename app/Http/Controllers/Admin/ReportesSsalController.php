<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReportesSsalRequest;
use App\Http\Requests\StoreReportesSsalRequest;
use App\Http\Requests\UpdateReportesSsalRequest;
use App\Models\ReportesSsal;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ReportesSsalController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('reportes_ssal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ReportesSsal::with(['usuario'])->select(sprintf('%s.*', (new ReportesSsal())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'reportes_ssal_show';
                $editGate = 'reportes_ssal_edit';
                $deleteGate = 'reportes_ssal_delete';
                $crudRoutePart = 'reportes-ssals';

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

        return view('admin.reportesSsals.index');
    }

    public function create()
    {
        abort_if(Gate::denies('reportes_ssal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reportesSsals.create', compact('usuarios'));
    }

    public function store(StoreReportesSsalRequest $request)
    {
        $reportesSsal = ReportesSsal::create($request->all());

        return redirect()->route('admin.reportes-ssals.index');
    }

    public function edit(ReportesSsal $reportesSsal)
    {
        abort_if(Gate::denies('reportes_ssal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reportesSsal->load('usuario');

        return view('admin.reportesSsals.edit', compact('usuarios', 'reportesSsal'));
    }

    public function update(UpdateReportesSsalRequest $request, ReportesSsal $reportesSsal)
    {
        $reportesSsal->update($request->all());

        return redirect()->route('admin.reportes-ssals.index');
    }

    public function show(ReportesSsal $reportesSsal)
    {
        abort_if(Gate::denies('reportes_ssal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesSsal->load('usuario');

        return view('admin.reportesSsals.show', compact('reportesSsal'));
    }

    public function destroy(ReportesSsal $reportesSsal)
    {
        abort_if(Gate::denies('reportes_ssal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesSsal->delete();

        return back();
    }

    public function massDestroy(MassDestroyReportesSsalRequest $request)
    {
        ReportesSsal::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
