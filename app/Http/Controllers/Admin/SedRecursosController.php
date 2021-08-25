<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySedRecursoRequest;
use App\Http\Requests\StoreSedRecursoRequest;
use App\Http\Requests\UpdateSedRecursoRequest;
use App\Models\SedRecurso;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SedRecursosController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('sed_recurso_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedRecursos = SedRecurso::all();

        return view('admin.sedRecursos.index', compact('sedRecursos'));
    }

    public function create()
    {
        abort_if(Gate::denies('sed_recurso_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sedRecursos.create');
    }

    public function store(StoreSedRecursoRequest $request)
    {
        $sedRecurso = SedRecurso::create($request->all());

        return redirect()->route('admin.sed-recursos.index');
    }

    public function edit(SedRecurso $sedRecurso)
    {
        abort_if(Gate::denies('sed_recurso_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sedRecursos.edit', compact('sedRecurso'));
    }

    public function update(UpdateSedRecursoRequest $request, SedRecurso $sedRecurso)
    {
        $sedRecurso->update($request->all());

        return redirect()->route('admin.sed-recursos.index');
    }

    public function show(SedRecurso $sedRecurso)
    {
        abort_if(Gate::denies('sed_recurso_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sedRecursos.show', compact('sedRecurso'));
    }

    public function destroy(SedRecurso $sedRecurso)
    {
        abort_if(Gate::denies('sed_recurso_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedRecurso->delete();

        return back();
    }

    public function massDestroy(MassDestroySedRecursoRequest $request)
    {
        SedRecurso::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
