<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySedClasificacionSaberRequest;
use App\Http\Requests\StoreSedClasificacionSaberRequest;
use App\Http\Requests\UpdateSedClasificacionSaberRequest;
use App\Models\Comuna;
use App\Models\SedClasificacionSaber;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SedClasificacionSaberController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('sed_clasificacion_saber_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SedClasificacionSaber::with(['comuna'])->select(sprintf('%s.*', (new SedClasificacionSaber())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'sed_clasificacion_saber_show';
                $editGate = 'sed_clasificacion_saber_edit';
                $deleteGate = 'sed_clasificacion_saber_delete';
                $crudRoutePart = 'sed-clasificacion-sabers';

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
            $table->editColumn('zona', function ($row) {
                return $row->zona ? SedClasificacionSaber::ZONA_SELECT[$row->zona] : '';
            });
            $table->editColumn('sector', function ($row) {
                return $row->sector ? SedClasificacionSaber::SECTOR_SELECT[$row->sector] : '';
            });
            $table->addColumn('comuna_codigo', function ($row) {
                return $row->comuna ? $row->comuna->codigo : '';
            });

            $table->editColumn('clasificacion', function ($row) {
                return $row->clasificacion ? $row->clasificacion : '';
            });
            $table->editColumn('matriculas_3_ult', function ($row) {
                return $row->matriculas_3_ult ? $row->matriculas_3_ult : '';
            });
            $table->editColumn('evaluados_3_ult', function ($row) {
                return $row->evaluados_3_ult ? $row->evaluados_3_ult : '';
            });
            $table->editColumn('indice_matematica', function ($row) {
                return $row->indice_matematica ? $row->indice_matematica : '';
            });
            $table->editColumn('indice_ciencias', function ($row) {
                return $row->indice_ciencias ? $row->indice_ciencias : '';
            });
            $table->editColumn('indice_sociales', function ($row) {
                return $row->indice_sociales ? $row->indice_sociales : '';
            });
            $table->editColumn('indice_lectura', function ($row) {
                return $row->indice_lectura ? $row->indice_lectura : '';
            });
            $table->editColumn('indice_ingles', function ($row) {
                return $row->indice_ingles ? $row->indice_ingles : '';
            });
            $table->editColumn('indice_total', function ($row) {
                return $row->indice_total ? $row->indice_total : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'comuna']);

            return $table->make(true);
        }

        return view('admin.sedClasificacionSabers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sed_clasificacion_saber_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comunas = Comuna::all()->pluck('codigo', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.sedClasificacionSabers.create', compact('comunas'));
    }

    public function store(StoreSedClasificacionSaberRequest $request)
    {
        $sedClasificacionSaber = SedClasificacionSaber::create($request->all());

        return redirect()->route('admin.sed-clasificacion-sabers.index');
    }

    public function edit(SedClasificacionSaber $sedClasificacionSaber)
    {
        abort_if(Gate::denies('sed_clasificacion_saber_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comunas = Comuna::all()->pluck('codigo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sedClasificacionSaber->load('comuna');

        return view('admin.sedClasificacionSabers.edit', compact('comunas', 'sedClasificacionSaber'));
    }

    public function update(UpdateSedClasificacionSaberRequest $request, SedClasificacionSaber $sedClasificacionSaber)
    {
        $sedClasificacionSaber->update($request->all());

        return redirect()->route('admin.sed-clasificacion-sabers.index');
    }

    public function show(SedClasificacionSaber $sedClasificacionSaber)
    {
        abort_if(Gate::denies('sed_clasificacion_saber_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedClasificacionSaber->load('comuna');

        return view('admin.sedClasificacionSabers.show', compact('sedClasificacionSaber'));
    }

    public function destroy(SedClasificacionSaber $sedClasificacionSaber)
    {
        abort_if(Gate::denies('sed_clasificacion_saber_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedClasificacionSaber->delete();

        return back();
    }

    public function massDestroy(MassDestroySedClasificacionSaberRequest $request)
    {
        SedClasificacionSaber::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
