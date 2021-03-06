@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.reportesShac.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reportes-shacs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nombre">{{ trans('cruds.reportesShac.fields.nombre') }}</label>
                <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', '') }}" required>
                @if($errors->has('nombre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reportesShac.fields.nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha">{{ trans('cruds.reportesShac.fields.fecha') }}</label>
                <input class="form-control date {{ $errors->has('fecha') ? 'is-invalid' : '' }}" type="text" name="fecha" id="fecha" value="{{ old('fecha') }}">
                @if($errors->has('fecha'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fecha') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reportesShac.fields.fecha_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="usuario_id">{{ trans('cruds.reportesShac.fields.usuario') }}</label>
                <select class="form-control select2 {{ $errors->has('usuario') ? 'is-invalid' : '' }}" name="usuario_id" id="usuario_id">
                    @foreach($usuarios as $id => $entry)
                        <option value="{{ $id }}" {{ old('usuario_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('usuario'))
                    <div class="invalid-feedback">
                        {{ $errors->first('usuario') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reportesShac.fields.usuario_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="observaciones">{{ trans('cruds.reportesShac.fields.observaciones') }}</label>
                <textarea class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" name="observaciones" id="observaciones">{{ old('observaciones') }}</textarea>
                @if($errors->has('observaciones'))
                    <div class="invalid-feedback">
                        {{ $errors->first('observaciones') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reportesShac.fields.observaciones_helper') }}</span>
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