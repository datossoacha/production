<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyMatriculaMunicipalRequest;
use App\Http\Requests\StoreMatriculaMunicipalRequest;
use App\Http\Requests\UpdateMatriculaMunicipalRequest;
use App\Models\Comuna;
use App\Models\MatriculaMunicipal;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MatriculaMunicipalController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('matricula_municipal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MatriculaMunicipal::with(['comuna'])->select(sprintf('%s.*', (new MatriculaMunicipal())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'matricula_municipal_show';
                $editGate = 'matricula_municipal_edit';
                $deleteGate = 'matricula_municipal_delete';
                $crudRoutePart = 'matricula-municipals';

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
            $table->editColumn('sector', function ($row) {
                return $row->sector ? MatriculaMunicipal::SECTOR_SELECT[$row->sector] : '';
            });
            $table->editColumn('institucion', function ($row) {
                return $row->institucion ? $row->institucion : '';
            });
            $table->editColumn('sede', function ($row) {
                return $row->sede ? $row->sede : '';
            });
            $table->editColumn('jornada', function ($row) {
                return $row->jornada ? $row->jornada : '';
            });
            $table->addColumn('comuna_nombre', function ($row) {
                return $row->comuna ? $row->comuna->nombre : '';
            });

            $table->editColumn('grado_0', function ($row) {
                return $row->grado_0 ? $row->grado_0 : '';
            });
            $table->editColumn('grado_1', function ($row) {
                return $row->grado_1 ? $row->grado_1 : '';
            });
            $table->editColumn('grado_2', function ($row) {
                return $row->grado_2 ? $row->grado_2 : '';
            });
            $table->editColumn('grado_3', function ($row) {
                return $row->grado_3 ? $row->grado_3 : '';
            });
            $table->editColumn('grado_4', function ($row) {
                return $row->grado_4 ? $row->grado_4 : '';
            });
            $table->editColumn('grado_5', function ($row) {
                return $row->grado_5 ? $row->grado_5 : '';
            });
            $table->editColumn('grado_6', function ($row) {
                return $row->grado_6 ? $row->grado_6 : '';
            });
            $table->editColumn('grado_7', function ($row) {
                return $row->grado_7 ? $row->grado_7 : '';
            });
            $table->editColumn('grado_8', function ($row) {
                return $row->grado_8 ? $row->grado_8 : '';
            });
            $table->editColumn('grado_9', function ($row) {
                return $row->grado_9 ? $row->grado_9 : '';
            });
            $table->editColumn('grado_10', function ($row) {
                return $row->grado_10 ? $row->grado_10 : '';
            });
            $table->editColumn('grado_11', function ($row) {
                return $row->grado_11 ? $row->grado_11 : '';
            });
            $table->editColumn('grado_22', function ($row) {
                return $row->grado_22 ? $row->grado_22 : '';
            });
            $table->editColumn('grado_23', function ($row) {
                return $row->grado_23 ? $row->grado_23 : '';
            });
            $table->editColumn('grado_24', function ($row) {
                return $row->grado_24 ? $row->grado_24 : '';
            });
            $table->editColumn('grado_25', function ($row) {
                return $row->grado_25 ? $row->grado_25 : '';
            });
            $table->editColumn('grado_99', function ($row) {
                return $row->grado_99 ? $row->grado_99 : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'comuna']);

            return $table->make(true);
        }

        return view('admin.matriculaMunicipals.index');
    }

    public function create()
    {
        abort_if(Gate::denies('matricula_municipal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comunas = Comuna::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.matriculaMunicipals.create', compact('comunas'));
    }

    public function store(StoreMatriculaMunicipalRequest $request)
    {
        $matriculaMunicipal = MatriculaMunicipal::create($request->all());

        return redirect()->route('admin.matricula-municipals.index');
    }

    public function edit(MatriculaMunicipal $matriculaMunicipal)
    {
        abort_if(Gate::denies('matricula_municipal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comunas = Comuna::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $matriculaMunicipal->load('comuna');

        return view('admin.matriculaMunicipals.edit', compact('comunas', 'matriculaMunicipal'));
    }

    public function update(UpdateMatriculaMunicipalRequest $request, MatriculaMunicipal $matriculaMunicipal)
    {
        $matriculaMunicipal->update($request->all());

        return redirect()->route('admin.matricula-municipals.index');
    }

    public function show(MatriculaMunicipal $matriculaMunicipal)
    {
        abort_if(Gate::denies('matricula_municipal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $matriculaMunicipal->load('comuna');

        return view('admin.matriculaMunicipals.show', compact('matriculaMunicipal'));
    }

    public function destroy(MatriculaMunicipal $matriculaMunicipal)
    {
        abort_if(Gate::denies('matricula_municipal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $matriculaMunicipal->delete();

        return back();
    }

    public function massDestroy(MassDestroyMatriculaMunicipalRequest $request)
    {
        MatriculaMunicipal::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
