<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyInstitucioneRequest;
use App\Http\Requests\StoreInstitucioneRequest;
use App\Http\Requests\UpdateInstitucioneRequest;
use App\Models\Comuna;
use App\Models\Institucione;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class InstitucionesController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('institucione_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Institucione::with(['comuna'])->select(sprintf('%s.*', (new Institucione())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'institucione_show';
                $editGate = 'institucione_edit';
                $deleteGate = 'institucione_delete';
                $crudRoutePart = 'instituciones';

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
                return $row->sector ? Institucione::SECTOR_SELECT[$row->sector] : '';
            });
            $table->editColumn('nombre_institucion', function ($row) {
                return $row->nombre_institucion ? $row->nombre_institucion : '';
            });
            $table->addColumn('comuna_codigo', function ($row) {
                return $row->comuna ? $row->comuna->codigo : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'comuna']);

            return $table->make(true);
        }

        return view('admin.instituciones.index');
    }

    public function create()
    {
        abort_if(Gate::denies('institucione_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comunas = Comuna::all()->pluck('codigo', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.instituciones.create', compact('comunas'));
    }

    public function store(StoreInstitucioneRequest $request)
    {
        $institucione = Institucione::create($request->all());

        return redirect()->route('admin.instituciones.index');
    }

    public function edit(Institucione $institucione)
    {
        abort_if(Gate::denies('institucione_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comunas = Comuna::all()->pluck('codigo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $institucione->load('comuna');

        return view('admin.instituciones.edit', compact('comunas', 'institucione'));
    }

    public function update(UpdateInstitucioneRequest $request, Institucione $institucione)
    {
        $institucione->update($request->all());

        return redirect()->route('admin.instituciones.index');
    }

    public function show(Institucione $institucione)
    {
        abort_if(Gate::denies('institucione_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $institucione->load('comuna', 'institucionSedes');

        return view('admin.instituciones.show', compact('institucione'));
    }

    public function destroy(Institucione $institucione)
    {
        abort_if(Gate::denies('institucione_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $institucione->delete();

        return back();
    }

    public function massDestroy(MassDestroyInstitucioneRequest $request)
    {
        Institucione::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
