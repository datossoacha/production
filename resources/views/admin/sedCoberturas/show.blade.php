@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sedCobertura.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-coberturas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sedCobertura.fields.id') }}
                        </th>
                        <td>
                            {{ $sedCobertura->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedCobertura.fields.poblacion') }}
                        </th>
                        <td>
                            {{ $sedCobertura->poblacion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedCobertura.fields.poblacion_edad_escolar') }}
                        </th>
                        <td>
                            {{ $sedCobertura->poblacion_edad_escolar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedCobertura.fields.matricula') }}
                        </th>
                        <td>
                            {{ $sedCobertura->matricula }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedCobertura.fields.cobertura_bruta') }}
                        </th>
                        <td>
                            {{ $sedCobertura->cobertura_bruta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedCobertura.fields.cobertura_neta') }}
                        </th>
                        <td>
                            {{ $sedCobertura->cobertura_neta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedCobertura.fields.fecha_corte') }}
                        </th>
                        <td>
                            {{ $sedCobertura->fecha_corte }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-coberturas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection