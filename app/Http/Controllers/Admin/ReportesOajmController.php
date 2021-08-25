<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReportesOajmRequest;
use App\Http\Requests\StoreReportesOajmRequest;
use App\Http\Requests\UpdateReportesOajmRequest;
use App\Models\ReportesOajm;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ReportesOajmController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('reportes_oajm_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ReportesOajm::with(['usuario'])->select(sprintf('%s.*', (new ReportesOajm())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'reportes_oajm_show';
                $editGate = 'reportes_oajm_edit';
                $deleteGate = 'reportes_oajm_delete';
                $crudRoutePart = 'reportes-oajms';

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

        return view('admin.reportesOajms.index');
    }

    public function create()
    {
        abort_if(Gate::denies('reportes_oajm_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reportesOajms.create', compact('usuarios'));
    }

    public function store(StoreReportesOajmRequest $request)
    {
        $reportesOajm = ReportesOajm::create($request->all());

        return redirect()->route('admin.reportes-oajms.index');
    }

    public function edit(ReportesOajm $reportesOajm)
    {
        abort_if(Gate::denies('reportes_oajm_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usuarios = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reportesOajm->load('usuario');

        return view('admin.reportesOajms.edit', compact('usuarios', 'reportesOajm'));
    }

    public function update(UpdateReportesOajmRequest $request, ReportesOajm $reportesOajm)
    {
        $reportesOajm->update($request->all());

        return redirect()->route('admin.reportes-oajms.index');
    }

    public function show(ReportesOajm $reportesOajm)
    {
        abort_if(Gate::denies('reportes_oajm_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesOajm->load('usuario');

        return view('admin.reportesOajms.show', compact('reportesOajm'));
    }

    public function destroy(ReportesOajm $reportesOajm)
    {
        abort_if(Gate::denies('reportes_oajm_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportesOajm->delete();

        return back();
    }

    public function massDestroy(MassDestroyReportesOajmRequest $request)
    {
        ReportesOajm::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
