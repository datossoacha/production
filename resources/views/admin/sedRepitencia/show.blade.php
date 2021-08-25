@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sedRepitencium.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-repitencia.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sedRepitencium.fields.id') }}
                        </th>
                        <td>
                            {{ $sedRepitencium->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedRepitencium.fields.poblacion') }}
                        </th>
                        <td>
                            {{ $sedRepitencium->poblacion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedRepitencium.fields.matricula') }}
                        </th>
                        <td>
                            {{ $sedRepitencium->matricula }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedRepitencium.fields.repitencia') }}
                        </th>
                        <td>
                            {{ $sedRepitencium->repitencia }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedRepitencium.fields.fecha_corte') }}
                        </th>
                        <td>
                            {{ $sedRepitencium->fecha_corte }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-repitencia.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection