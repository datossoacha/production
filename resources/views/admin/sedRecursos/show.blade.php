@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sedRecurso.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-recursos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sedRecurso.fields.id') }}
                        </th>
                        <td>
                            {{ $sedRecurso->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedRecurso.fields.area') }}
                        </th>
                        <td>
                            {{ App\Models\SedRecurso::AREA_SELECT[$sedRecurso->area] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedRecurso.fields.asignados') }}
                        </th>
                        <td>
                            {{ $sedRecurso->asignados }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedRecurso.fields.ejecutados') }}
                        </th>
                        <td>
                            {{ $sedRecurso->ejecutados }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedRecurso.fields.ejecucion') }}
                        </th>
                        <td>
                            {{ $sedRecurso->ejecucion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedRecurso.fields.vigencia') }}
                        </th>
                        <td>
                            {{ $sedRecurso->vigencia }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-recursos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection