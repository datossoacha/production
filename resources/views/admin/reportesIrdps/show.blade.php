@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.reportesIrdp.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reportes-irdps.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.reportesIrdp.fields.id') }}
                        </th>
                        <td>
                            {{ $reportesIrdp->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reportesIrdp.fields.nombre') }}
                        </th>
                        <td>
                            {{ $reportesIrdp->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reportesIrdp.fields.fecha') }}
                        </th>
                        <td>
                            {{ $reportesIrdp->fecha }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reportesIrdp.fields.usuario') }}
                        </th>
                        <td>
                            {{ $reportesIrdp->usuario->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reportesIrdp.fields.observaciones') }}
                        </th>
                        <td>
                            {{ $reportesIrdp->observaciones }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reportes-irdps.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection