@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.institucione.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.instituciones.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.institucione.fields.id') }}
                        </th>
                        <td>
                            {{ $institucione->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.institucione.fields.sector') }}
                        </th>
                        <td>
                            {{ App\Models\Institucione::SECTOR_SELECT[$institucione->sector] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.institucione.fields.nombre_institucion') }}
                        </th>
                        <td>
                            {{ $institucione->nombre_institucion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.institucione.fields.comuna') }}
                        </th>
                        <td>
                            {{ $institucione->comuna->codigo ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.instituciones.index') }}">
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
            <a class="nav-link" href="#institucion_sedes" role="tab" data-toggle="tab">
                {{ trans('cruds.sede.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="institucion_sedes">
            @includeIf('admin.instituciones.relationships.institucionSedes', ['sedes' => $institucione->institucionSedes])
        </div>
    </div>
</div>

@endsection