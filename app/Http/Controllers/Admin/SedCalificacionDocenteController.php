<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySedCalificacionDocenteRequest;
use App\Http\Requests\StoreSedCalificacionDocenteRequest;
use App\Http\Requests\UpdateSedCalificacionDocenteRequest;
use App\Models\Comuna;
use App\Models\Institucione;
use App\Models\SedCalificacionDocente;
use App\Models\Sede;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SedCalificacionDocenteController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('sed_calificacion_docente_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SedCalificacionDocente::with(['institucion', 'sede', 'comuna'])->select(sprintf('%s.*', (new SedCalificacionDocente())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'sed_calificacion_docente_show';
                $editGate = 'sed_calificacion_docente_edit';
                $deleteGate = 'sed_calificacion_docente_delete';
                $crudRoutePart = 'sed-calificacion-docentes';

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
            $table->editColumn('dane', function ($row) {
                return $row->dane ? $row->dane : '';
            });
            $table->addColumn('institucion_nombre_institucion', function ($row) {
                return $row->institucion ? $row->institucion->nombre_institucion : '';
            });

            $table->addColumn('sede_nombre', function ($row) {
                return $row->sede ? $row->sede->nombre : '';
            });

            $table->editColumn('zona', function ($row) {
                return $row->zona ? SedCalificacionDocente::ZONA_SELECT[$row->zona] : '';
            });
            $table->addColumn('comuna_nombre', function ($row) {
                return $row->comuna ? $row->comuna->nombre : '';
            });

            $table->editColumn('cargo', function ($row) {
                return $row->cargo ? $row->cargo : '';
            });
            $table->editColumn('area', function ($row) {
                return $row->area ? $row->area : '';
            });
            $table->editColumn('calificacion', function ($row) {
                return $row->calificacion ? $row->calificacion : '';
            });
            $table->editColumn('valoracion', function ($row) {
                return $row->valoracion ? $row->valoracion : '';
            });
            $table->editColumn('vigencia', function ($row) {
                return $row->vigencia ? $row->vigencia : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'institucion', 'sede', 'comuna']);

            return $table->make(true);
        }

        return view('admin.sedCalificacionDocentes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sed_calificacion_docente_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $institucions = Institucione::all()->pluck('nombre_institucion', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sedes = Sede::all()->pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comunas = Comuna::all()->pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.sedCalificacionDocentes.create', compact('institucions', 'sedes', 'comunas'));
    }

    public function store(StoreSedCalificacionDocenteRequest $request)
    {
        $sedCalificacionDocente = SedCalificacionDocente::create($request->all());

        return redirect()->route('admin.sed-calificacion-docentes.index');
    }

    public function edit(SedCalificacionDocente $sedCalificacionDocente)
    {
        abort_if(Gate::denies('sed_calificacion_docente_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $institucions = Institucione::all()->pluck('nombre_institucion', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sedes = Sede::all()->pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comunas = Comuna::all()->pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sedCalificacionDocente->load('institucion', 'sede', 'comuna');

        return view('admin.sedCalificacionDocentes.edit', compact('institucions', 'sedes', 'comunas', 'sedCalificacionDocente'));
    }

    public function update(UpdateSedCalificacionDocenteRequest $request, SedCalificacionDocente $sedCalificacionDocente)
    {
        $sedCalificacionDocente->update($request->all());

        return redirect()->route('admin.sed-calificacion-docentes.index');
    }

    public function show(SedCalificacionDocente $sedCalificacionDocente)
    {
        abort_if(Gate::denies('sed_calificacion_docente_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedCalificacionDocente->load('institucion', 'sede', 'comuna');

        return view('admin.sedCalificacionDocentes.show', compact('sedCalificacionDocente'));
    }

    public function destroy(SedCalificacionDocente $sedCalificacionDocente)
    {
        abort_if(Gate::denies('sed_calificacion_docente_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedCalificacionDocente->delete();

        return back();
    }

    public function massDestroy(MassDestroySedCalificacionDocenteRequest $request)
    {
        SedCalificacionDocente::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
