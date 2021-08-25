@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sedCalificacionDocente.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-calificacion-docentes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sedCalificacionDocente.fields.id') }}
                        </th>
                        <td>
                            {{ $sedCalificacionDocente->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedCalificacionDocente.fields.dane') }}
                        </th>
                        <td>
                            {{ $sedCalificacionDocente->dane }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedCalificacionDocente.fields.institucion') }}
                        </th>
                        <td>
                            {{ $sedCalificacionDocente->institucion->nombre_institucion ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedCalificacionDocente.fields.sede') }}
                        </th>
                        <td>
                            {{ $sedCalificacionDocente->sede->nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedCalificacionDocente.fields.zona') }}
                        </th>
                        <td>
                            {{ App\Models\SedCalificacionDocente::ZONA_SELECT[$sedCalificacionDocente->zona] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedCalificacionDocente.fields.comuna') }}
                        </th>
                        <td>
                            {{ $sedCalificacionDocente->comuna->nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedCalificacionDocente.fields.cargo') }}
                        </th>
                        <td>
                            {{ $sedCalificacionDocente->cargo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedCalificacionDocente.fields.area') }}
                        </th>
                        <td>
                            {{ $sedCalificacionDocente->area }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedCalificacionDocente.fields.calificacion') }}
                        </th>
                        <td>
                            {{ $sedCalificacionDocente->calificacion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedCalificacionDocente.fields.valoracion') }}
                        </th>
                        <td>
                            {{ $sedCalificacionDocente->valoracion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedCalificacionDocente.fields.vigencia') }}
                        </th>
                        <td>
                            {{ $sedCalificacionDocente->vigencia }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-calificacion-docentes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection