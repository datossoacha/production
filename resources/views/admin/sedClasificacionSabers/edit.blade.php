@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.sedClasificacionSaber.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sed-clasificacion-sabers.update", [$sedClasificacionSaber->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="dane">{{ trans('cruds.sedClasificacionSaber.fields.dane') }}</label>
                <input class="form-control {{ $errors->has('dane') ? 'is-invalid' : '' }}" type="text" name="dane" id="dane" value="{{ old('dane', $sedClasificacionSaber->dane) }}" required>
                @if($errors->has('dane'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dane') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedClasificacionSaber.fields.dane_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.sedClasificacionSaber.fields.zona') }}</label>
                <select class="form-control {{ $errors->has('zona') ? 'is-invalid' : '' }}" name="zona" id="zona" required>
                    <option value disabled {{ old('zona', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\SedClasificacionSaber::ZONA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('zona', $sedClasificacionSaber->zona) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('zona'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zona') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedClasificacionSaber.fields.zona_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.sedClasificacionSaber.fields.sector') }}</label>
                <select class="form-control {{ $errors->has('sector') ? 'is-invalid' : '' }}" name="sector" id="sector" required>
                    <option value disabled {{ old('sector', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\SedClasificacionSaber::SECTOR_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('sector', $sedClasificacionSaber->sector) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('sector'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sector') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedClasificacionSaber.fields.sector_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="comuna_id">{{ trans('cruds.sedClasificacionSaber.fields.comuna') }}</label>
                <select class="form-control select2 {{ $errors->has('comuna') ? 'is-invalid' : '' }}" name="comuna_id" id="comuna_id" required>
                    @foreach($comunas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('comuna_id') ? old('comuna_id') : $sedClasificacionSaber->comuna->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('comuna'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comuna') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedClasificacionSaber.fields.comuna_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="clasificacion">{{ trans('cruds.sedClasificacionSaber.fields.clasificacion') }}</label>
                <input class="form-control {{ $errors->has('clasificacion') ? 'is-invalid' : '' }}" type="text" name="clasificacion" id="clasificacion" value="{{ old('clasificacion', $sedClasificacionSaber->clasificacion) }}" required>
                @if($errors->has('clasificacion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('clasificacion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedClasificacionSaber.fields.clasificacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="matriculas_3_ult">{{ trans('cruds.sedClasificacionSaber.fields.matriculas_3_ult') }}</label>
                <input class="form-control {{ $errors->has('matriculas_3_ult') ? 'is-invalid' : '' }}" type="number" name="matriculas_3_ult" id="matriculas_3_ult" value="{{ old('matriculas_3_ult', $sedClasificacionSaber->matriculas_3_ult) }}" step="1" required>
                @if($errors->has('matriculas_3_ult'))
                    <div class="invalid-feedback">
                        {{ $errors->first('matriculas_3_ult') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedClasificacionSaber.fields.matriculas_3_ult_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="evaluados_3_ult">{{ trans('cruds.sedClasificacionSaber.fields.evaluados_3_ult') }}</label>
                <input class="form-control {{ $errors->has('evaluados_3_ult') ? 'is-invalid' : '' }}" type="number" name="evaluados_3_ult" id="evaluados_3_ult" value="{{ old('evaluados_3_ult', $sedClasificacionSaber->evaluados_3_ult) }}" step="1" required>
                @if($errors->has('evaluados_3_ult'))
                    <div class="invalid-feedback">
                        {{ $errors->first('evaluados_3_ult') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedClasificacionSaber.fields.evaluados_3_ult_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="indice_matematica">{{ trans('cruds.sedClasificacionSaber.fields.indice_matematica') }}</label>
                <input class="form-control {{ $errors->has('indice_matematica') ? 'is-invalid' : '' }}" type="number" name="indice_matematica" id="indice_matematica" value="{{ old('indice_matematica', $sedClasificacionSaber->indice_matematica) }}" step="0.01" required>
                @if($errors->has('indice_matematica'))
                    <div class="invalid-feedback">
                        {{ $errors->first('indice_matematica') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedClasificacionSaber.fields.indice_matematica_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="indice_ciencias">{{ trans('cruds.sedClasificacionSaber.fields.indice_ciencias') }}</label>
                <input class="form-control {{ $errors->has('indice_ciencias') ? 'is-invalid' : '' }}" type="number" name="indice_ciencias" id="indice_ciencias" value="{{ old('indice_ciencias', $sedClasificacionSaber->indice_ciencias) }}" step="0.01" required>
                @if($errors->has('indice_ciencias'))
                    <div class="invalid-feedback">
                        {{ $errors->first('indice_ciencias') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedClasificacionSaber.fields.indice_ciencias_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="indice_sociales">{{ trans('cruds.sedClasificacionSaber.fields.indice_sociales') }}</label>
                <input class="form-control {{ $errors->has('indice_sociales') ? 'is-invalid' : '' }}" type="number" name="indice_sociales" id="indice_sociales" value="{{ old('indice_sociales', $sedClasificacionSaber->indice_sociales) }}" step="0.01" required>
                @if($errors->has('indice_sociales'))
                    <div class="invalid-feedback">
                        {{ $errors->first('indice_sociales') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedClasificacionSaber.fields.indice_sociales_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="indice_lectura">{{ trans('cruds.sedClasificacionSaber.fields.indice_lectura') }}</label>
                <input class="form-control {{ $errors->has('indice_lectura') ? 'is-invalid' : '' }}" type="number" name="indice_lectura" id="indice_lectura" value="{{ old('indice_lectura', $sedClasificacionSaber->indice_lectura) }}" step="0.01" required>
                @if($errors->has('indice_lectura'))
                    <div class="invalid-feedback">
                        {{ $errors->first('indice_lectura') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedClasificacionSaber.fields.indice_lectura_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="indice_ingles">{{ trans('cruds.sedClasificacionSaber.fields.indice_ingles') }}</label>
                <input class="form-control {{ $errors->has('indice_ingles') ? 'is-invalid' : '' }}" type="number" name="indice_ingles" id="indice_ingles" value="{{ old('indice_ingles', $sedClasificacionSaber->indice_ingles) }}" step="1" required>
                @if($errors->has('indice_ingles'))
                    <div class="invalid-feedback">
                        {{ $errors->first('indice_ingles') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedClasificacionSaber.fields.indice_ingles_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="indice_total">{{ trans('cruds.sedClasificacionSaber.fields.indice_total') }}</label>
                <input class="form-control {{ $errors->has('indice_total') ? 'is-invalid' : '' }}" type="text" name="indice_total" id="indice_total" value="{{ old('indice_total', $sedClasificacionSaber->indice_total) }}" required>
                @if($errors->has('indice_total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('indice_total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedClasificacionSaber.fields.indice_total_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_corte">{{ trans('cruds.sedClasificacionSaber.fields.fecha_corte') }}</label>
                <input class="form-control date {{ $errors->has('fecha_corte') ? 'is-invalid' : '' }}" type="text" name="fecha_corte" id="fecha_corte" value="{{ old('fecha_corte', $sedClasificacionSaber->fecha_corte) }}">
                @if($errors->has('fecha_corte'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fecha_corte') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedClasificacionSaber.fields.fecha_corte_helper') }}</span>
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