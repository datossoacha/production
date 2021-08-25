@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.sedEstimulosGestore.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sed-estimulos-gestores.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nombre">{{ trans('cruds.sedEstimulosGestore.fields.nombre') }}</label>
                <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', '') }}" required>
                @if($errors->has('nombre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedEstimulosGestore.fields.nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="linea_participacion">{{ trans('cruds.sedEstimulosGestore.fields.linea_participacion') }}</label>
                <input class="form-control {{ $errors->has('linea_participacion') ? 'is-invalid' : '' }}" type="text" name="linea_participacion" id="linea_participacion" value="{{ old('linea_participacion', '') }}" required>
                @if($errors->has('linea_participacion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('linea_participacion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedEstimulosGestore.fields.linea_participacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="proyecto">{{ trans('cruds.sedEstimulosGestore.fields.proyecto') }}</label>
                <input class="form-control {{ $errors->has('proyecto') ? 'is-invalid' : '' }}" type="text" name="proyecto" id="proyecto" value="{{ old('proyecto', '') }}">
                @if($errors->has('proyecto'))
                    <div class="invalid-feedback">
                        {{ $errors->first('proyecto') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedEstimulosGestore.fields.proyecto_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.sedEstimulosGestore.fields.estado') }}</label>
                <select class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}" name="estado" id="estado" required>
                    <option value disabled {{ old('estado', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\SedEstimulosGestore::ESTADO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('estado', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('estado'))
                    <div class="invalid-feedback">
                        {{ $errors->first('estado') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedEstimulosGestore.fields.estado_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha_presentacion">{{ trans('cruds.sedEstimulosGestore.fields.fecha_presentacion') }}</label>
                <input class="form-control date {{ $errors->has('fecha_presentacion') ? 'is-invalid' : '' }}" type="text" name="fecha_presentacion" id="fecha_presentacion" value="{{ old('fecha_presentacion') }}" required>
                @if($errors->has('fecha_presentacion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fecha_presentacion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedEstimulosGestore.fields.fecha_presentacion_helper') }}</span>
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