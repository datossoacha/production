<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySedEstimulosGestoreRequest;
use App\Http\Requests\StoreSedEstimulosGestoreRequest;
use App\Http\Requests\UpdateSedEstimulosGestoreRequest;
use App\Models\SedEstimulosGestore;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SedEstimulosGestoresController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('sed_estimulos_gestore_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SedEstimulosGestore::query()->select(sprintf('%s.*', (new SedEstimulosGestore())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'sed_estimulos_gestore_show';
                $editGate = 'sed_estimulos_gestore_edit';
                $deleteGate = 'sed_estimulos_gestore_delete';
                $crudRoutePart = 'sed-estimulos-gestores';

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
            $table->editColumn('linea_participacion', function ($row) {
                return $row->linea_participacion ? $row->linea_participacion : '';
            });
            $table->editColumn('proyecto', function ($row) {
                return $row->proyecto ? $row->proyecto : '';
            });
            $table->editColumn('estado', function ($row) {
                return $row->estado ? SedEstimulosGestore::ESTADO_SELECT[$row->estado] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.sedEstimulosGestores.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sed_estimulos_gestore_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sedEstimulosGestores.create');
    }

    public function store(StoreSedEstimulosGestoreRequest $request)
    {
        $sedEstimulosGestore = SedEstimulosGestore::create($request->all());

        return redirect()->route('admin.sed-estimulos-gestores.index');
    }

    public function edit(SedEstimulosGestore $sedEstimulosGestore)
    {
        abort_if(Gate::denies('sed_estimulos_gestore_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sedEstimulosGestores.edit', compact('sedEstimulosGestore'));
    }

    public function update(UpdateSedEstimulosGestoreRequest $request, SedEstimulosGestore $sedEstimulosGestore)
    {
        $sedEstimulosGestore->update($request->all());

        return redirect()->route('admin.sed-estimulos-gestores.index');
    }

    public function show(SedEstimulosGestore $sedEstimulosGestore)
    {
        abort_if(Gate::denies('sed_estimulos_gestore_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sedEstimulosGestores.show', compact('sedEstimulosGestore'));
    }

    public function destroy(SedEstimulosGestore $sedEstimulosGestore)
    {
        abort_if(Gate::denies('sed_estimulos_gestore_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedEstimulosGestore->delete();

        return back();
    }

    public function massDestroy(MassDestroySedEstimulosGestoreRequest $request)
    {
        SedEstimulosGestore::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
