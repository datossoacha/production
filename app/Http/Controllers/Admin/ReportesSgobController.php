<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReportesSgobRequest;
use App\Http\Requests\StoreReportesSgobRequest;
use App\Http\Requests\UpdateReportesSgobRequest;
use App\Models\ReportesSgob;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ReportesSgobController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('reportes_sgob_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ReportesSgob::with(['usuario'])->select(sprintf('%s.*', (new ReportesSgob())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'reportes_sgob_show';
                $editGate = 'reportes_sgob_edit';
                $deleteGate = 'reportes_sgob_delete';
                $crudRoutePart = 'reportes-sgobs';

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

        return view('admin.reportesSgobs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('reportes_sgob_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reportesSgobs.create', compact('usuarios'));
    }

    public function store(StoreReportesSgobRequest $request)
    {
        $reportesSgob = ReportesSgob::create($request->all());

        return redirect()->route('admin.reportes-sgobs.index');
    }

    public function edit(ReportesSgob $reportesSgob)
    {
        abort_if(Gate::denies('reportes_sgob_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reportesSgob->load('usuario');

        return view('admin.reportesSgobs.edit', compact('usuarios', 'reportesSgob'));
    }

    public function update(UpdateReportesSgobRequest $request, ReportesSgob $reportesSgob)
    {
        $reportesSgob->update($request->all());

        return redirect()->route('admin.reportes-sgobs.index');
    }

    public function show(ReportesSgob $reportesSgob)
    {
        abort_if(Gate::denies('reportes_sgob_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesSgob->load('usuario');

        return view('admin.reportesSgobs.show', compact('reportesSgob'));
    }

    public function destroy(ReportesSgob $reportesSgob)
    {
        abort_if(Gate::denies('reportes_sgob_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesSgob->delete();

        return back();
    }

    public function massDestroy(MassDestroyReportesSgobRequest $request)
    {
        ReportesSgob::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
