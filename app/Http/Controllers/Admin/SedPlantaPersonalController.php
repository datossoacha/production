<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySedPlantaPersonalRequest;
use App\Http\Requests\StoreSedPlantaPersonalRequest;
use App\Http\Requests\UpdateSedPlantaPersonalRequest;
use App\Models\Comuna;
use App\Models\SedPlantaPersonal;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SedPlantaPersonalController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('sed_planta_personal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SedPlantaPersonal::with(['comuna'])->select(sprintf('%s.*', (new SedPlantaPersonal())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'sed_planta_personal_show';
                $editGate = 'sed_planta_personal_edit';
                $deleteGate = 'sed_planta_personal_delete';
                $crudRoutePart = 'sed-planta-personals';

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
            $table->editColumn('establecimiento_datos', function ($row) {
                return $row->establecimiento_datos ? $row->establecimiento_datos : '';
            });
            $table->editColumn('dane', function ($row) {
                return $row->dane ? $row->dane : '';
            });
            $table->addColumn('comuna_nombre', function ($row) {
                return $row->comuna ? $row->comuna->nombre : '';
            });

            $table->editColumn('area_formacion', function ($row) {
                return $row->area_formacion ? $row->area_formacion : '';
            });
            $table->editColumn('nivel_educativo', function ($row) {
                return $row->nivel_educativo ? $row->nivel_educativo : '';
            });
            $table->editColumn('area_dicta', function ($row) {
                return $row->area_dicta ? $row->area_dicta : '';
            });
            $table->editColumn('vigencia', function ($row) {
                return $row->vigencia ? $row->vigencia : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'comuna']);

            return $table->make(true);
        }

        return view('admin.sedPlantaPersonals.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sed_planta_personal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comunas = Comuna::all()->pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.sedPlantaPersonals.create', compact('comunas'));
    }

    public function store(StoreSedPlantaPersonalRequest $request)
    {
        $sedPlantaPersonal = SedPlantaPersonal::create($request->all());

        return redirect()->route('admin.sed-planta-personals.index');
    }

    public function edit(SedPlantaPersonal $sedPlantaPersonal)
    {
        abort_if(Gate::denies('sed_planta_personal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comunas = Comuna::all()->pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sedPlantaPersonal->load('comuna');

        return view('admin.sedPlantaPersonals.edit', compact('comunas', 'sedPlantaPersonal'));
    }

    public function update(UpdateSedPlantaPersonalRequest $request, SedPlantaPersonal $sedPlantaPersonal)
    {
        $sedPlantaPersonal->update($request->all());

        return redirect()->route('admin.sed-planta-personals.index');
    }

    public function show(SedPlantaPersonal $sedPlantaPersonal)
    {
        abort_if(Gate::denies('sed_planta_personal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedPlantaPersonal->load('comuna');

        return view('admin.sedPlantaPersonals.show', compact('sedPlantaPersonal'));
    }

    public function destroy(SedPlantaPersonal $sedPlantaPersonal)
    {
        abort_if(Gate::denies('sed_planta_personal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedPlantaPersonal->delete();

        return back();
    }

    public function massDestroy(MassDestroySedPlantaPersonalRequest $request)
    {
        SedPlantaPersonal::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
