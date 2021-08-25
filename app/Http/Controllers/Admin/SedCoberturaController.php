<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySedCoberturaRequest;
use App\Http\Requests\StoreSedCoberturaRequest;
use App\Http\Requests\UpdateSedCoberturaRequest;
use App\Models\SedCobertura;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SedCoberturaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sed_cobertura_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedCoberturas = SedCobertura::all();

        return view('admin.sedCoberturas.index', compact('sedCoberturas'));
    }

    public function create()
    {
        abort_if(Gate::denies('sed_cobertura_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sedCoberturas.create');
    }

    public function store(StoreSedCoberturaRequest $request)
    {
        $sedCobertura = SedCobertura::create($request->all());

        return redirect()->route('admin.sed-coberturas.index');
    }

    public function edit(SedCobertura $sedCobertura)
    {
        abort_if(Gate::denies('sed_cobertura_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sedCoberturas.edit', compact('sedCobertura'));
    }

    public function update(UpdateSedCoberturaRequest $request, SedCobertura $sedCobertura)
    {
        $sedCobertura->update($request->all());

        return redirect()->route('admin.sed-coberturas.index');
    }

    public function show(SedCobertura $sedCobertura)
    {
        abort_if(Gate::denies('sed_cobertura_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sedCoberturas.show', compact('sedCobertura'));
    }

    public function destroy(SedCobertura $sedCobertura)
    {
        abort_if(Gate::denies('sed_cobertura_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedCobertura->delete();

        return back();
    }

    public function massDestroy(MassDestroySedCoberturaRequest $request)
    {
        SedCobertura::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
