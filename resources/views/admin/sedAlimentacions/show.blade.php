@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sedAlimentacion.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-alimentacions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sedAlimentacion.fields.id') }}
                        </th>
                        <td>
                            {{ $sedAlimentacion->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedAlimentacion.fields.zona') }}
                        </th>
                        <td>
                            {{ App\Models\SedAlimentacion::ZONA_SELECT[$sedAlimentacion->zona] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedAlimentacion.fields.comuna') }}
                        </th>
                        <td>
                            {{ $sedAlimentacion->comuna->codigo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedAlimentacion.fields.institucion') }}
                        </th>
                        <td>
                            {{ $sedAlimentacion->institucion->nombre_institucion ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedAlimentacion.fields.sede') }}
                        </th>
                        <td>
                            {{ $sedAlimentacion->sede->nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedAlimentacion.fields.grado') }}
                        </th>
                        <td>
                            {{ $sedAlimentacion->grado }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedAlimentacion.fields.beneficiarios') }}
                        </th>
                        <td>
                            {{ $sedAlimentacion->beneficiarios }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-alimentacions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection