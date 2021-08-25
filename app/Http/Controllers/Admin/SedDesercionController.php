<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySedDesercionRequest;
use App\Http\Requests\StoreSedDesercionRequest;
use App\Http\Requests\UpdateSedDesercionRequest;
use App\Models\SedDesercion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SedDesercionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sed_desercion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedDesercions = SedDesercion::all();

        return view('admin.sedDesercions.index', compact('sedDesercions'));
    }

    public function create()
    {
        abort_if(Gate::denies('sed_desercion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sedDesercions.create');
    }

    public function store(StoreSedDesercionRequest $request)
    {
        $sedDesercion = SedDesercion::create($request->all());

        return redirect()->route('admin.sed-desercions.index');
    }

    public function edit(SedDesercion $sedDesercion)
    {
        abort_if(Gate::denies('sed_desercion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sedDesercions.edit', compact('sedDesercion'));
    }

    public function update(UpdateSedDesercionRequest $request, SedDesercion $sedDesercion)
    {
        $sedDesercion->update($request->all());

        return redirect()->route('admin.sed-desercions.index');
    }

    public function show(SedDesercion $sedDesercion)
    {
        abort_if(Gate::denies('sed_desercion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sedDesercions.show', compact('sedDesercion'));
    }

    public function destroy(SedDesercion $sedDesercion)
    {
        abort_if(Gate::denies('sed_desercion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedDesercion->delete();

        return back();
    }

    public function massDestroy(MassDestroySedDesercionRequest $request)
    {
        SedDesercion::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
