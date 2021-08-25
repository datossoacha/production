<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReportesShacRequest;
use App\Http\Requests\StoreReportesShacRequest;
use App\Http\Requests\UpdateReportesShacRequest;
use App\Models\ReportesShac;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ReportesShacController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('reportes_shac_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ReportesShac::with(['usuario'])->select(sprintf('%s.*', (new ReportesShac())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'reportes_shac_show';
                $editGate = 'reportes_shac_edit';
                $deleteGate = 'reportes_shac_delete';
                $crudRoutePart = 'reportes-shacs';

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

        return view('admin.reportesShacs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('reportes_shac_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reportesShacs.create', compact('usuarios'));
    }

    public function store(StoreReportesShacRequest $request)
    {
        $reportesShac = ReportesShac::create($request->all());

        return redirect()->route('admin.reportes-shacs.index');
    }

    public function edit(ReportesShac $reportesShac)
    {
        abort_if(Gate::denies('reportes_shac_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reportesShac->load('usuario');

        return view('admin.reportesShacs.edit', compact('usuarios', 'reportesShac'));
    }

    public function update(UpdateReportesShacRequest $request, ReportesShac $reportesShac)
    {
        $reportesShac->update($request->all());

        return redirect()->route('admin.reportes-shacs.index');
    }

    public function show(ReportesShac $reportesShac)
    {
        abort_if(Gate::denies('reportes_shac_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesShac->load('usuario');

        return view('admin.reportesShacs.show', compact('reportesShac'));
    }

    public function destroy(ReportesShac $reportesShac)
    {
        abort_if(Gate::denies('reportes_shac_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesShac->delete();

        return back();
    }

    public function massDestroy(MassDestroyReportesShacRequest $request)
    {
        ReportesShac::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
