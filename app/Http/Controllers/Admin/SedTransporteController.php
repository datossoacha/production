<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySedTransporteRequest;
use App\Http\Requests\StoreSedTransporteRequest;
use App\Http\Requests\UpdateSedTransporteRequest;
use App\Models\Comuna;
use App\Models\Institucione;
use App\Models\Sede;
use App\Models\SedTransporte;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SedTransporteController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('sed_transporte_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SedTransporte::with(['comuna', 'institucion', 'sede'])->select(sprintf('%s.*', (new SedTransporte())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'sed_transporte_show';
                $editGate = 'sed_transporte_edit';
                $deleteGate = 'sed_transporte_delete';
                $crudRoutePart = 'sed-transportes';

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
            $table->editColumn('zona', function ($row) {
                return $row->zona ? SedTransporte::ZONA_SELECT[$row->zona] : '';
            });
            $table->addColumn('comuna_codigo', function ($row) {
                return $row->comuna ? $row->comuna->codigo : '';
            });

            $table->editColumn('comuna.nombre', function ($row) {
                return $row->comuna ? (is_string($row->comuna) ? $row->comuna : $row->comuna->nombre) : '';
            });
            $table->addColumn('institucion_nombre_institucion', function ($row) {
                return $row->institucion ? $row->institucion->nombre_institucion : '';
            });

            $table->addColumn('sede_nombre', function ($row) {
                return $row->sede ? $row->sede->nombre : '';
            });

            $table->editColumn('grado', function ($row) {
                return $row->grado ? $row->grado : '';
            });
            $table->editColumn('beneficiarios', function ($row) {
                return $row->beneficiarios ? $row->beneficiarios : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'comuna', 'institucion', 'sede']);

            return $table->make(true);
        }

        return view('admin.sedTransportes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sed_transporte_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comunas = Comuna::all()->pluck('codigo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $institucions = Institucione::all()->pluck('nombre_institucion', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sedes = Sede::all()->pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.sedTransportes.create', compact('comunas', 'institucions', 'sedes'));
    }

    public function store(StoreSedTransporteRequest $request)
    {
        $sedTransporte = SedTransporte::create($request->all());

        return redirect()->route('admin.sed-transportes.index');
    }

    public function edit(SedTransporte $sedTransporte)
    {
        abort_if(Gate::denies('sed_transporte_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comunas = Comuna::all()->pluck('codigo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $institucions = Institucione::all()->pluck('nombre_institucion', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sedes = Sede::all()->pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sedTransporte->load('comuna', 'institucion', 'sede');

        return view('admin.sedTransportes.edit', compact('comunas', 'institucions', 'sedes', 'sedTransporte'));
    }

    public function update(UpdateSedTransporteRequest $request, SedTransporte $sedTransporte)
    {
        $sedTransporte->update($request->all());

        return redirect()->route('admin.sed-transportes.index');
    }

    public function show(SedTransporte $sedTransporte)
    {
        abort_if(Gate::denies('sed_transporte_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedTransporte->load('comuna', 'institucion', 'sede');

        return view('admin.sedTransportes.show', compact('sedTransporte'));
    }

    public function destroy(SedTransporte $sedTransporte)
    {
        abort_if(Gate::denies('sed_transporte_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedTransporte->delete();

        return back();
    }

    public function massDestroy(MassDestroySedTransporteRequest $request)
    {
        SedTransporte::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
