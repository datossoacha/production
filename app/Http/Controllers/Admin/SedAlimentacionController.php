<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySedAlimentacionRequest;
use App\Http\Requests\StoreSedAlimentacionRequest;
use App\Http\Requests\UpdateSedAlimentacionRequest;
use App\Models\Comuna;
use App\Models\Institucione;
use App\Models\SedAlimentacion;
use App\Models\Sede;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SedAlimentacionController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('sed_alimentacion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SedAlimentacion::with(['comuna', 'institucion', 'sede'])->select(sprintf('%s.*', (new SedAlimentacion())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'sed_alimentacion_show';
                $editGate = 'sed_alimentacion_edit';
                $deleteGate = 'sed_alimentacion_delete';
                $crudRoutePart = 'sed-alimentacions';

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
                return $row->zona ? SedAlimentacion::ZONA_SELECT[$row->zona] : '';
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

        return view('admin.sedAlimentacions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sed_alimentacion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comunas = Comuna::all()->pluck('codigo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $institucions = Institucione::all()->pluck('nombre_institucion', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sedes = Sede::all()->pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.sedAlimentacions.create', compact('comunas', 'institucions', 'sedes'));
    }

    public function store(StoreSedAlimentacionRequest $request)
    {
        $sedAlimentacion = SedAlimentacion::create($request->all());

        return redirect()->route('admin.sed-alimentacions.index');
    }

    public function edit(SedAlimentacion $sedAlimentacion)
    {
        abort_if(Gate::denies('sed_alimentacion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comunas = Comuna::all()->pluck('codigo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $institucions = Institucione::all()->pluck('nombre_institucion', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sedes = Sede::all()->pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sedAlimentacion->load('comuna', 'institucion', 'sede');

        return view('admin.sedAlimentacions.edit', compact('comunas', 'institucions', 'sedes', 'sedAlimentacion'));
    }

    public function update(UpdateSedAlimentacionRequest $request, SedAlimentacion $sedAlimentacion)
    {
        $sedAlimentacion->update($request->all());

        return redirect()->route('admin.sed-alimentacions.index');
    }

    public function show(SedAlimentacion $sedAlimentacion)
    {
        abort_if(Gate::denies('sed_alimentacion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedAlimentacion->load('comuna', 'institucion', 'sede');

        return view('admin.sedAlimentacions.show', compact('sedAlimentacion'));
    }

    public function destroy(SedAlimentacion $sedAlimentacion)
    {
        abort_if(Gate::denies('sed_alimentacion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedAlimentacion->delete();

        return back();
    }

    public function massDestroy(MassDestroySedAlimentacionRequest $request)
    {
        SedAlimentacion::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
