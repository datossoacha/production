@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.municipio.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.municipios.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.municipio.fields.id') }}
                        </th>
                        <td>
                            {{ $municipio->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.municipio.fields.name') }}
                        </th>
                        <td>
                            {{ $municipio->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.municipio.fields.code') }}
                        </th>
                        <td>
                            {{ $municipio->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.municipio.fields.departamento') }}
                        </th>
                        <td>
                            {{ $municipio->departamento->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.municipios.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection