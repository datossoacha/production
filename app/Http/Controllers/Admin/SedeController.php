<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySedeRequest;
use App\Http\Requests\StoreSedeRequest;
use App\Http\Requests\UpdateSedeRequest;
use App\Models\Institucione;
use App\Models\Jornada;
use App\Models\Sede;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SedeController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('sede_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Sede::with(['institucion', 'jornadas'])->select(sprintf('%s.*', (new Sede())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'sede_show';
                $editGate = 'sede_edit';
                $deleteGate = 'sede_delete';
                $crudRoutePart = 'sedes';

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
            $table->addColumn('institucion_nombre_institucion', function ($row) {
                return $row->institucion ? $row->institucion->nombre_institucion : '';
            });

            $table->editColumn('nombre', function ($row) {
                return $row->nombre ? $row->nombre : '';
            });
            $table->editColumn('jornadas', function ($row) {
                $labels = [];
                foreach ($row->jornadas as $jornada) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $jornada->nombre);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'institucion', 'jornadas']);

            return $table->make(true);
        }

        return view('admin.sedes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sede_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $institucions = Institucione::pluck('nombre_institucion', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jornadas = Jornada::pluck('nombre', 'id');

        return view('admin.sedes.create', compact('institucions', 'jornadas'));
    }

    public function store(StoreSedeRequest $request)
    {
        $sede = Sede::create($request->all());
        $sede->jornadas()->sync($request->input('jornadas', []));

        return redirect()->route('admin.sedes.index');
    }

    public function edit(Sede $sede)
    {
        abort_if(Gate::denies('sede_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $institucions = Institucione::pluck('nombre_institucion', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jornadas = Jornada::pluck('nombre', 'id');

        $sede->load('institucion', 'jornadas');

        return view('admin.sedes.edit', compact('institucions', 'jornadas', 'sede'));
    }

    public function update(UpdateSedeRequest $request, Sede $sede)
    {
        $sede->update($request->all());
        $sede->jornadas()->sync($request->input('jornadas', []));

        return redirect()->route('admin.sedes.index');
    }

    public function show(Sede $sede)
    {
        abort_if(Gate::denies('sede_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sede->load('institucion', 'jornadas');

        return view('admin.sedes.show', compact('sede'));
    }

    public function destroy(Sede $sede)
    {
        abort_if(Gate::denies('sede_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sede->delete();

        return back();
    }

    public function massDestroy(MassDestroySedeRequest $request)
    {
        Sede::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
