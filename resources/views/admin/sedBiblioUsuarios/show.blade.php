@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sedBiblioUsuario.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-biblio-usuarios.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sedBiblioUsuario.fields.id') }}
                        </th>
                        <td>
                            {{ $sedBiblioUsuario->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedBiblioUsuario.fields.sede_biblioteca') }}
                        </th>
                        <td>
                            {{ $sedBiblioUsuario->sede_biblioteca }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedBiblioUsuario.fields.motivo_visita') }}
                        </th>
                        <td>
                            {{ $sedBiblioUsuario->motivo_visita }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedBiblioUsuario.fields.grupo_etario') }}
                        </th>
                        <td>
                            {{ $sedBiblioUsuario->grupo_etario }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedBiblioUsuario.fields.genero') }}
                        </th>
                        <td>
                            {{ $sedBiblioUsuario->genero }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedBiblioUsuario.fields.tipo_poblacion') }}
                        </th>
                        <td>
                            {{ $sedBiblioUsuario->tipo_poblacion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedBiblioUsuario.fields.fecha_visita') }}
                        </th>
                        <td>
                            {{ $sedBiblioUsuario->fecha_visita }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedBiblioUsuario.fields.cantidad_asistentes') }}
                        </th>
                        <td>
                            {{ $sedBiblioUsuario->cantidad_asistentes }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-biblio-usuarios.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection