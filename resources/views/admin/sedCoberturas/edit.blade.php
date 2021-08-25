@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.sedCobertura.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sed-coberturas.update", [$sedCobertura->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="poblacion">{{ trans('cruds.sedCobertura.fields.poblacion') }}</label>
                <input class="form-control {{ $errors->has('poblacion') ? 'is-invalid' : '' }}" type="number" name="poblacion" id="poblacion" value="{{ old('poblacion', $sedCobertura->poblacion) }}" step="1" required>
                @if($errors->has('poblacion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('poblacion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedCobertura.fields.poblacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="poblacion_edad_escolar">{{ trans('cruds.sedCobertura.fields.poblacion_edad_escolar') }}</label>
                <input class="form-control {{ $errors->has('poblacion_edad_escolar') ? 'is-invalid' : '' }}" type="number" name="poblacion_edad_escolar" id="poblacion_edad_escolar" value="{{ old('poblacion_edad_escolar', $sedCobertura->poblacion_edad_escolar) }}" step="1" required>
                @if($errors->has('poblacion_edad_escolar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('poblacion_edad_escolar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedCobertura.fields.poblacion_edad_escolar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="matricula">{{ trans('cruds.sedCobertura.fields.matricula') }}</label>
                <input class="form-control {{ $errors->has('matricula') ? 'is-invalid' : '' }}" type="number" name="matricula" id="matricula" value="{{ old('matricula', $sedCobertura->matricula) }}" step="1" required>
                @if($errors->has('matricula'))
                    <div class="invalid-feedback">
                        {{ $errors->first('matricula') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedCobertura.fields.matricula_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cobertura_bruta">{{ trans('cruds.sedCobertura.fields.cobertura_bruta') }}</label>
                <input class="form-control {{ $errors->has('cobertura_bruta') ? 'is-invalid' : '' }}" type="number" name="cobertura_bruta" id="cobertura_bruta" value="{{ old('cobertura_bruta', $sedCobertura->cobertura_bruta) }}" step="0.01" required>
                @if($errors->has('cobertura_bruta'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cobertura_bruta') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedCobertura.fields.cobertura_bruta_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cobertura_neta">{{ trans('cruds.sedCobertura.fields.cobertura_neta') }}</label>
                <input class="form-control {{ $errors->has('cobertura_neta') ? 'is-invalid' : '' }}" type="text" name="cobertura_neta" id="cobertura_neta" value="{{ old('cobertura_neta', $sedCobertura->cobertura_neta) }}" required>
                @if($errors->has('cobertura_neta'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cobertura_neta') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedCobertura.fields.cobertura_neta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_corte">{{ trans('cruds.sedCobertura.fields.fecha_corte') }}</label>
                <input class="form-control date {{ $errors->has('fecha_corte') ? 'is-invalid' : '' }}" type="text" name="fecha_corte" id="fecha_corte" value="{{ old('fecha_corte', $sedCobertura->fecha_corte) }}">
                @if($errors->has('fecha_corte'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fecha_corte') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedCobertura.fields.fecha_corte_helper') }}</span>
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