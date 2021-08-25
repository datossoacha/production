<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMunicipioRequest;
use App\Http\Requests\StoreMunicipioRequest;
use App\Http\Requests\UpdateMunicipioRequest;
use App\Models\Departamento;
use App\Models\Municipio;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MunicipiosController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('municipio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Municipio::with(['departamento'])->select(sprintf('%s.*', (new Municipio())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'municipio_show';
                $editGate = 'municipio_edit';
                $deleteGate = 'municipio_delete';
                $crudRoutePart = 'municipios';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : '';
            });
            $table->addColumn('departamento_name', function ($row) {
                return $row->departamento ? $row->departamento->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'departamento']);

            return $table->make(true);
        }

        return view('admin.municipios.index');
    }

    public function create()
    {
        abort_if(Gate::denies('municipio_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departamentos = Departamento::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.municipios.create', compact('departamentos'));
    }

    public function store(StoreMunicipioRequest $request)
    {
        $municipio = Municipio::create($request->all());

        return redirect()->route('admin.municipios.index');
    }

    public function edit(Municipio $municipio)
    {
        abort_if(Gate::denies('municipio_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departamentos = Departamento::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $municipio->load('departamento');

        return view('admin.municipios.edit', compact('departamentos', 'municipio'));
    }

    public function update(UpdateMunicipioRequest $request, Municipio $municipio)
    {
        $municipio->update($request->all());

        return redirect()->route('admin.municipios.index');
    }

    public function show(Municipio $municipio)
    {
        abort_if(Gate::denies('municipio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $municipio->load('departamento');

        return view('admin.municipios.show', compact('municipio'));
    }

    public function destroy(Municipio $municipio)
    {
        abort_if(Gate::denies('municipio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $municipio->delete();

        return back();
    }

    public function massDestroy(MassDestroyMunicipioRequest $request)
    {
        Municipio::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
