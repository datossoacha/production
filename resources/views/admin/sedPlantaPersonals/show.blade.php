@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sedPlantaPersonal.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-planta-personals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sedPlantaPersonal.fields.id') }}
                        </th>
                        <td>
                            {{ $sedPlantaPersonal->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedPlantaPersonal.fields.establecimiento_datos') }}
                        </th>
                        <td>
                            {{ $sedPlantaPersonal->establecimiento_datos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedPlantaPersonal.fields.dane') }}
                        </th>
                        <td>
                            {{ $sedPlantaPersonal->dane }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedPlantaPersonal.fields.comuna') }}
                        </th>
                        <td>
                            {{ $sedPlantaPersonal->comuna->nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedPlantaPersonal.fields.area_formacion') }}
                        </th>
                        <td>
                            {{ $sedPlantaPersonal->area_formacion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedPlantaPersonal.fields.nivel_educativo') }}
                        </th>
                        <td>
                            {{ $sedPlantaPersonal->nivel_educativo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedPlantaPersonal.fields.area_dicta') }}
                        </th>
                        <td>
                            {{ $sedPlantaPersonal->area_dicta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedPlantaPersonal.fields.vigencia') }}
                        </th>
                        <td>
                            {{ $sedPlantaPersonal->vigencia }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-planta-personals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection