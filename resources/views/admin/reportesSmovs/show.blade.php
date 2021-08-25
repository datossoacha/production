@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.reportesSmov.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reportes-smovs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.reportesSmov.fields.id') }}
                        </th>
                        <td>
                            {{ $reportesSmov->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reportesSmov.fields.nombre') }}
                        </th>
                        <td>
                            {{ $reportesSmov->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reportesSmov.fields.fecha') }}
                        </th>
                        <td>
                            {{ $reportesSmov->fecha }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reportesSmov.fields.usuario') }}
                        </th>
                        <td>
                            {{ $reportesSmov->usuario->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reportesSmov.fields.observaciones') }}
                        </th>
                        <td>
                            {{ $reportesSmov->observaciones }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reportes-smovs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection