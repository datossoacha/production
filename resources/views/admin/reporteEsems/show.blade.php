@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.reporteEsem.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reporte-esems.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.reporteEsem.fields.id') }}
                        </th>
                        <td>
                            {{ $reporteEsem->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reporteEsem.fields.nombre') }}
                        </th>
                        <td>
                            {{ $reporteEsem->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reporteEsem.fields.fecha') }}
                        </th>
                        <td>
                            {{ $reporteEsem->fecha }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reporteEsem.fields.usuario') }}
                        </th>
                        <td>
                            {{ $reporteEsem->usuario->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reporteEsem.fields.observaciones') }}
                        </th>
                        <td>
                            {{ $reporteEsem->observaciones }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reporte-esems.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection