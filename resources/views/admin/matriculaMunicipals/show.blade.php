@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.matriculaMunicipal.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.matricula-municipals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.matriculaMunicipal.fields.id') }}
                        </th>
                        <td>
                            {{ $matriculaMunicipal->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matriculaMunicipal.fields.sector') }}
                        </th>
                        <td>
                            {{ App\Models\MatriculaMunicipal::SECTOR_SELECT[$matriculaMunicipal->sector] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matriculaMunicipal.fields.institucion') }}
                        </th>
                        <td>
                            {{ $matriculaMunicipal->institucion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matriculaMunicipal.fields.sede') }}
                        </th>
                        <td>
                            {{ $matriculaMunicipal->sede }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matriculaMunicipal.fields.jornada') }}
                        </th>
                        <td>
                            {{ $matriculaMunicipal->jornada }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matriculaMunicipal.fields.comuna') }}
                        </th>
                        <td>
                            {{ $matriculaMunicipal->comuna->nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matriculaMunicipal.fields.grado_0') }}
                        </th>
                        <td>
                            {{ $matriculaMunicipal->grado_0 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matriculaMunicipal.fields.grado_1') }}
                        </th>
                        <td>
                            {{ $matriculaMunicipal->grado_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matriculaMunicipal.fields.grado_2') }}
                        </th>
                        <td>
                            {{ $matriculaMunicipal->grado_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matriculaMunicipal.fields.grado_3') }}
                        </th>
                        <td>
                            {{ $matriculaMunicipal->grado_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matriculaMunicipal.fields.grado_4') }}
                        </th>
                        <td>
                            {{ $matriculaMunicipal->grado_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matriculaMunicipal.fields.grado_5') }}
                        </th>
                        <td>
                            {{ $matriculaMunicipal->grado_5 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matriculaMunicipal.fields.grado_6') }}
                        </th>
                        <td>
                            {{ $matriculaMunicipal->grado_6 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matriculaMunicipal.fields.grado_7') }}
                        </th>
                        <td>
                            {{ $matriculaMunicipal->grado_7 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matriculaMunicipal.fields.grado_8') }}
                        </th>
                        <td>
                            {{ $matriculaMunicipal->grado_8 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matriculaMunicipal.fields.grado_9') }}
                        </th>
                        <td>
                            {{ $matriculaMunicipal->grado_9 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matriculaMunicipal.fields.grado_10') }}
                        </th>
                        <td>
                            {{ $matriculaMunicipal->grado_10 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matriculaMunicipal.fields.grado_11') }}
                        </th>
                        <td>
                            {{ $matriculaMunicipal->grado_11 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matriculaMunicipal.fields.grado_22') }}
                        </th>
                        <td>
                            {{ $matriculaMunicipal->grado_22 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matriculaMunicipal.fields.grado_23') }}
                        </th>
                        <td>
                            {{ $matriculaMunicipal->grado_23 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matriculaMunicipal.fields.grado_24') }}
                        </th>
                        <td>
                            {{ $matriculaMunicipal->grado_24 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matriculaMunicipal.fields.grado_25') }}
                        </th>
                        <td>
                            {{ $matriculaMunicipal->grado_25 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matriculaMunicipal.fields.grado_99') }}
                        </th>
                        <td>
                            {{ $matriculaMunicipal->grado_99 }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.matricula-municipals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection