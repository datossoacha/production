@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sedDesercion.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-desercions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sedDesercion.fields.id') }}
                        </th>
                        <td>
                            {{ $sedDesercion->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedDesercion.fields.matricula_aplicable') }}
                        </th>
                        <td>
                            {{ $sedDesercion->matricula_aplicable }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedDesercion.fields.retiros') }}
                        </th>
                        <td>
                            {{ $sedDesercion->retiros }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedDesercion.fields.desercion') }}
                        </th>
                        <td>
                            {{ $sedDesercion->desercion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedDesercion.fields.fecha_corte') }}
                        </th>
                        <td>
                            {{ $sedDesercion->fecha_corte }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-desercions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection