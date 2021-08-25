@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.jornada.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jornadas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.jornada.fields.id') }}
                        </th>
                        <td>
                            {{ $jornada->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jornada.fields.nombre') }}
                        </th>
                        <td>
                            {{ $jornada->nombre }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jornadas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#jornadas_sedes" role="tab" data-toggle="tab">
                {{ trans('cruds.sede.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="jornadas_sedes">
            @includeIf('admin.jornadas.relationships.jornadasSedes', ['sedes' => $jornada->jornadasSedes])
        </div>
    </div>
</div>

@endsection