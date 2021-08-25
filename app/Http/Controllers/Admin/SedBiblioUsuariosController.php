<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySedBiblioUsuarioRequest;
use App\Http\Requests\StoreSedBiblioUsuarioRequest;
use App\Http\Requests\UpdateSedBiblioUsuarioRequest;
use App\Models\SedBiblioUsuario;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SedBiblioUsuariosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sed_biblio_usuario_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedBiblioUsuarios = SedBiblioUsuario::all();

        return view('admin.sedBiblioUsuarios.index', compact('sedBiblioUsuarios'));
    }

    public function create()
    {
        abort_if(Gate::denies('sed_biblio_usuario_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sedBiblioUsuarios.create');
    }

    public function store(StoreSedBiblioUsuarioRequest $request)
    {
        $sedBiblioUsuario = SedBiblioUsuario::create($request->all());

        return redirect()->route('admin.sed-biblio-usuarios.index');
    }

    public function edit(SedBiblioUsuario $sedBiblioUsuario)
    {
        abort_if(Gate::denies('sed_biblio_usuario_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sedBiblioUsuarios.edit', compact('sedBiblioUsuario'));
    }

    public function update(UpdateSedBiblioUsuarioRequest $request, SedBiblioUsuario $sedBiblioUsuario)
    {
        $sedBiblioUsuario->update($request->all());

        return redirect()->route('admin.sed-biblio-usuarios.index');
    }

    public function show(SedBiblioUsuario $sedBiblioUsuario)
    {
        abort_if(Gate::denies('sed_biblio_usuario_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sedBiblioUsuarios.show', compact('sedBiblioUsuario'));
    }

    public function destroy(SedBiblioUsuario $sedBiblioUsuario)
    {
        abort_if(Gate::denies('sed_biblio_usuario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sedBiblioUsuario->delete();

        return back();
    }

    public function massDestroy(MassDestroySedBiblioUsuarioRequest $request)
    {
        SedBiblioUsuario::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
