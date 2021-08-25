<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJornadaRequest;
use App\Http\Requests\StoreJornadaRequest;
use App\Http\Requests\UpdateJornadaRequest;
use App\Models\Jornada;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JornadasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jornada_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jornadas = Jornada::all();

        return view('admin.jornadas.index', compact('jornadas'));
    }

    public function create()
    {
        abort_if(Gate::denies('jornada_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jornadas.create');
    }

    public function store(StoreJornadaRequest $request)
    {
        $jornada = Jornada::create($request->all());

        return redirect()->route('admin.jornadas.index');
    }

    public function edit(Jornada $jornada)
    {
        abort_if(Gate::denies('jornada_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jornadas.edit', compact('jornada'));
    }

    public function update(UpdateJornadaRequest $request, Jornada $jornada)
    {
        $jornada->update($request->all());

        return redirect()->route('admin.jornadas.index');
    }

    public function show(Jornada $jornada)
    {
        abort_if(Gate::denies('jornada_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jornada->load('jornadasSedes');

        return view('admin.jornadas.show', compact('jornada'));
    }

    public function destroy(Jornada $jornada)
    {
        abort_if(Gate::denies('jornada_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jornada->delete();

        return back();
    }

    public function massDestroy(MassDestroyJornadaRequest $request)
    {
        Jornada::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
