@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sedClasificacionSaber.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-clasificacion-sabers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sedClasificacionSaber.fields.id') }}
                        </th>
                        <td>
                            {{ $sedClasificacionSaber->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedClasificacionSaber.fields.dane') }}
                        </th>
                        <td>
                            {{ $sedClasificacionSaber->dane }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedClasificacionSaber.fields.zona') }}
                        </th>
                        <td>
                            {{ App\Models\SedClasificacionSaber::ZONA_SELECT[$sedClasificacionSaber->zona] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedClasificacionSaber.fields.sector') }}
                        </th>
                        <td>
                            {{ App\Models\SedClasificacionSaber::SECTOR_SELECT[$sedClasificacionSaber->sector] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedClasificacionSaber.fields.comuna') }}
                        </th>
                        <td>
                            {{ $sedClasificacionSaber->comuna->codigo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedClasificacionSaber.fields.clasificacion') }}
                        </th>
                        <td>
                            {{ $sedClasificacionSaber->clasificacion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedClasificacionSaber.fields.matriculas_3_ult') }}
                        </th>
                        <td>
                            {{ $sedClasificacionSaber->matriculas_3_ult }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedClasificacionSaber.fields.evaluados_3_ult') }}
                        </th>
                        <td>
                            {{ $sedClasificacionSaber->evaluados_3_ult }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedClasificacionSaber.fields.indice_matematica') }}
                        </th>
                        <td>
                            {{ $sedClasificacionSaber->indice_matematica }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedClasificacionSaber.fields.indice_ciencias') }}
                        </th>
                        <td>
                            {{ $sedClasificacionSaber->indice_ciencias }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedClasificacionSaber.fields.indice_sociales') }}
                        </th>
                        <td>
                            {{ $sedClasificacionSaber->indice_sociales }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedClasificacionSaber.fields.indice_lectura') }}
                        </th>
                        <td>
                            {{ $sedClasificacionSaber->indice_lectura }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedClasificacionSaber.fields.indice_ingles') }}
                        </th>
                        <td>
                            {{ $sedClasificacionSaber->indice_ingles }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedClasificacionSaber.fields.indice_total') }}
                        </th>
                        <td>
                            {{ $sedClasificacionSaber->indice_total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedClasificacionSaber.fields.fecha_corte') }}
                        </th>
                        <td>
                            {{ $sedClasificacionSaber->fecha_corte }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-clasificacion-sabers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection