@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sedTransporte.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-transportes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sedTransporte.fields.id') }}
                        </th>
                        <td>
                            {{ $sedTransporte->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedTransporte.fields.zona') }}
                        </th>
                        <td>
                            {{ App\Models\SedTransporte::ZONA_SELECT[$sedTransporte->zona] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedTransporte.fields.comuna') }}
                        </th>
                        <td>
                            {{ $sedTransporte->comuna->codigo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedTransporte.fields.institucion') }}
                        </th>
                        <td>
                            {{ $sedTransporte->institucion->nombre_institucion ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedTransporte.fields.sede') }}
                        </th>
                        <td>
                            {{ $sedTransporte->sede->nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedTransporte.fields.grado') }}
                        </th>
                        <td>
                            {{ $sedTransporte->grado }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedTransporte.fields.beneficiarios') }}
                        </th>
                        <td>
                            {{ $sedTransporte->beneficiarios }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-transportes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection