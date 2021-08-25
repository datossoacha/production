@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.reportesSgen.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reportes-sgens.update", [$reportesSgen->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nombre">{{ trans('cruds.reportesSgen.fields.nombre') }}</label>
                <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', $reportesSgen->nombre) }}" required>
                @if($errors->has('nombre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reportesSgen.fields.nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha">{{ trans('cruds.reportesSgen.fields.fecha') }}</label>
                <input class="form-control date {{ $errors->has('fecha') ? 'is-invalid' : '' }}" type="text" name="fecha" id="fecha" value="{{ old('fecha', $reportesSgen->fecha) }}">
                @if($errors->has('fecha'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fecha') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reportesSgen.fields.fecha_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="usuario_id">{{ trans('cruds.reportesSgen.fields.usuario') }}</label>
                <select class="form-control select2 {{ $errors->has('usuario') ? 'is-invalid' : '' }}" name="usuario_id" id="usuario_id">
                    @foreach($usuarios as $id => $entry)
                        <option value="{{ $id }}" {{ (old('usuario_id') ? old('usuario_id') : $reportesSgen->usuario->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('usuario'))
                    <div class="invalid-feedback">
                        {{ $errors->first('usuario') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reportesSgen.fields.usuario_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="observaciones">{{ trans('cruds.reportesSgen.fields.observaciones') }}</label>
                <textarea class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" name="observaciones" id="observaciones">{{ old('observaciones', $reportesSgen->observaciones) }}</textarea>
                @if($errors->has('observaciones'))
                    <div class="invalid-feedback">
                        {{ $errors->first('observaciones') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reportesSgen.fields.observaciones_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection