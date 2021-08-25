<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySedArtisticaFormacioneRequest;
use App\Http\Requests\StoreSedArtisticaFormacioneRequest;
use App\Http\Requests\UpdateSedArtisticaFormacioneRequest;
use App\Models\SedArtisticaFormacione;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SedArtisticaFormacionesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sed_artistica_formacione_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedArtisticaFormaciones = SedArtisticaFormacione::all();

        return view('admin.sedArtisticaFormaciones.index', compact('sedArtisticaFormaciones'));
    }

    public function create()
    {
        abort_if(Gate::denies('sed_artistica_formacione_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sedArtisticaFormaciones.create');
    }

    public function store(StoreSedArtisticaFormacioneRequest $request)
    {
        $sedArtisticaFormacione = SedArtisticaFormacione::create($request->all());

        return redirect()->route('admin.sed-artistica-formaciones.index');
    }

    public function edit(SedArtisticaFormacione $sedArtisticaFormacione)
    {
        abort_if(Gate::denies('sed_artistica_formacione_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sedArtisticaFormaciones.edit', compact('sedArtisticaFormacione'));
    }

    public function update(UpdateSedArtisticaFormacioneRequest $request, SedArtisticaFormacione $sedArtisticaFormacione)
    {
        $sedArtisticaFormacione->update($request->all());

        return redirect()->route('admin.sed-artistica-formaciones.index');
    }

    public function show(SedArtisticaFormacione $sedArtisticaFormacione)
    {
        abort_if(Gate::denies('sed_artistica_formacione_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sedArtisticaFormaciones.show', compact('sedArtisticaFormacione'));
    }

    public function destroy(SedArtisticaFormacione $sedArtisticaFormacione)
    {
        abort_if(Gate::denies('sed_artistica_formacione_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedArtisticaFormacione->delete();

        return back();
    }

    public function massDestroy(MassDestroySedArtisticaFormacioneRequest $request)
    {
        SedArtisticaFormacione::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
