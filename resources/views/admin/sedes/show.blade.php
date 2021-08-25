@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sede.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sedes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sede.fields.id') }}
                        </th>
                        <td>
                            {{ $sede->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sede.fields.institucion') }}
                        </th>
                        <td>
                            {{ $sede->institucion->nombre_institucion ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sede.fields.nombre') }}
                        </th>
                        <td>
                            {{ $sede->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sede.fields.jornadas') }}
                        </th>
                        <td>
                            @foreach($sede->jornadas as $key => $jornadas)
                                <span class="label label-info">{{ $jornadas->nombre }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sedes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection