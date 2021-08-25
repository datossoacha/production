@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.comuna.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.comunas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.comuna.fields.id') }}
                        </th>
                        <td>
                            {{ $comuna->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comuna.fields.nombre') }}
                        </th>
                        <td>
                            {{ $comuna->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comuna.fields.codigo') }}
                        </th>
                        <td>
                            {{ $comuna->codigo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comuna.fields.mapa') }}
                        </th>
                        <td>
                            {!! $comuna->mapa !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comuna.fields.observaciones') }}
                        </th>
                        <td>
                            {{ $comuna->observaciones }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.comunas.index') }}">
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
            <a class="nav-link" href="#comuna_instituciones" role="tab" data-toggle="tab">
                {{ trans('cruds.institucione.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="comuna_instituciones">
            @includeIf('admin.comunas.relationships.comunaInstituciones', ['instituciones' => $comuna->comunaInstituciones])
        </div>
    </div>
</div>

@endsection