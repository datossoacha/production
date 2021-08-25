@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sedEstimulosGestore.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-estimulos-gestores.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sedEstimulosGestore.fields.id') }}
                        </th>
                        <td>
                            {{ $sedEstimulosGestore->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedEstimulosGestore.fields.nombre') }}
                        </th>
                        <td>
                            {{ $sedEstimulosGestore->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedEstimulosGestore.fields.linea_participacion') }}
                        </th>
                        <td>
                            {{ $sedEstimulosGestore->linea_participacion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedEstimulosGestore.fields.proyecto') }}
                        </th>
                        <td>
                            {{ $sedEstimulosGestore->proyecto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedEstimulosGestore.fields.estado') }}
                        </th>
                        <td>
                            {{ App\Models\SedEstimulosGestore::ESTADO_SELECT[$sedEstimulosGestore->estado] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedEstimulosGestore.fields.fecha_presentacion') }}
                        </th>
                        <td>
                            {{ $sedEstimulosGestore->fecha_presentacion }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-estimulos-gestores.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection