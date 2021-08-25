@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sedArtisticaFormacione.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-artistica-formaciones.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sedArtisticaFormacione.fields.id') }}
                        </th>
                        <td>
                            {{ $sedArtisticaFormacione->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedArtisticaFormacione.fields.area_formacion') }}
                        </th>
                        <td>
                            {{ $sedArtisticaFormacione->area_formacion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedArtisticaFormacione.fields.categoria') }}
                        </th>
                        <td>
                            {{ $sedArtisticaFormacione->categoria }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedArtisticaFormacione.fields.atendidos') }}
                        </th>
                        <td>
                            {{ $sedArtisticaFormacione->atendidos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedArtisticaFormacione.fields.vigencia') }}
                        </th>
                        <td>
                            {{ $sedArtisticaFormacione->vigencia }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-artistica-formaciones.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection