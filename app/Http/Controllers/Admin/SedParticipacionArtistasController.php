<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySedParticipacionArtistumRequest;
use App\Http\Requests\StoreSedParticipacionArtistumRequest;
use App\Http\Requests\UpdateSedParticipacionArtistumRequest;
use App\Models\SedParticipacionArtistum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SedParticipacionArtistasController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('sed_participacion_artistum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SedParticipacionArtistum::query()->select(sprintf('%s.*', (new SedParticipacionArtistum())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'sed_participacion_artistum_show';
                $editGate = 'sed_participacion_artistum_edit';
                $deleteGate = 'sed_participacion_artistum_delete';
                $crudRoutePart = 'sed-participacion-artista';

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
            $table->editColumn('nombre_artista', function ($row) {
                return $row->nombre_artista ? $row->nombre_artista : '';
            });
            $table->editColumn('nombre_festival', function ($row) {
                return $row->nombre_festival ? $row->nombre_festival : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.sedParticipacionArtista.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sed_participacion_artistum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sedParticipacionArtista.create');
    }

    public function store(StoreSedParticipacionArtistumRequest $request)
    {
        $sedParticipacionArtistum = SedParticipacionArtistum::create($request->all());

        return redirect()->route('admin.sed-participacion-artista.index');
    }

    public function edit(SedParticipacionArtistum $sedParticipacionArtistum)
    {
        abort_if(Gate::denies('sed_participacion_artistum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sedParticipacionArtista.edit', compact('sedParticipacionArtistum'));
    }

    public function update(UpdateSedParticipacionArtistumRequest $request, SedParticipacionArtistum $sedParticipacionArtistum)
    {
        $sedParticipacionArtistum->update($request->all());

        return redirect()->route('admin.sed-participacion-artista.index');
    }

    public function show(SedParticipacionArtistum $sedParticipacionArtistum)
    {
        abort_if(Gate::denies('sed_participacion_artistum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sedParticipacionArtista.show', compact('sedParticipacionArtistum'));
    }

    public function destroy(SedParticipacionArtistum $sedParticipacionArtistum)
    {
        abort_if(Gate::denies('sed_participacion_artistum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedParticipacionArtistum->delete();

        return back();
    }

    public function massDestroy(MassDestroySedParticipacionArtistumRequest $request)
    {
        SedParticipacionArtistum::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
