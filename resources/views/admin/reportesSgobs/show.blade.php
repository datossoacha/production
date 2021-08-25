@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.reportesSgob.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reportes-sgobs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.reportesSgob.fields.id') }}
                        </th>
                        <td>
                            {{ $reportesSgob->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reportesSgob.fields.nombre') }}
                        </th>
                        <td>
                            {{ $reportesSgob->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reportesSgob.fields.fecha') }}
                        </th>
                        <td>
                            {{ $reportesSgob->fecha }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reportesSgob.fields.usuario') }}
                        </th>
                        <td>
                            {{ $reportesSgob->usuario->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reportesSgob.fields.observaciones') }}
                        </th>
                        <td>
                            {{ $reportesSgob->observaciones }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reportes-sgobs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection