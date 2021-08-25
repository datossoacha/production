<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReportesSmovRequest;
use App\Http\Requests\StoreReportesSmovRequest;
use App\Http\Requests\UpdateReportesSmovRequest;
use App\Models\ReportesSmov;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ReportesSmovController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('reportes_smov_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ReportesSmov::with(['usuario'])->select(sprintf('%s.*', (new ReportesSmov())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'reportes_smov_show';
                $editGate = 'reportes_smov_edit';
                $deleteGate = 'reportes_smov_delete';
                $crudRoutePart = 'reportes-smovs';

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

        return view('admin.reportesSmovs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('reportes_smov_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reportesSmovs.create', compact('usuarios'));
    }

    public function store(StoreReportesSmovRequest $request)
    {
        $reportesSmov = ReportesSmov::create($request->all());

        return redirect()->route('admin.reportes-smovs.index');
    }

    public function edit(ReportesSmov $reportesSmov)
    {
        abort_if(Gate::denies('reportes_smov_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reportesSmov->load('usuario');

        return view('admin.reportesSmovs.edit', compact('usuarios', 'reportesSmov'));
    }

    public function update(UpdateReportesSmovRequest $request, ReportesSmov $reportesSmov)
    {
        $reportesSmov->update($request->all());

        return redirect()->route('admin.reportes-smovs.index');
    }

    public function show(ReportesSmov $reportesSmov)
    {
        abort_if(Gate::denies('reportes_smov_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesSmov->load('usuario');

        return view('admin.reportesSmovs.show', compact('reportesSmov'));
    }

    public function destroy(ReportesSmov $reportesSmov)
    {
        abort_if(Gate::denies('reportes_smov_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesSmov->delete();

        return back();
    }

    public function massDestroy(MassDestroyReportesSmovRequest $request)
    {
        ReportesSmov::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
