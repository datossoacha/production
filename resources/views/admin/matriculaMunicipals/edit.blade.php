@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.matriculaMunicipal.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.matricula-municipals.update", [$matriculaMunicipal->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.matriculaMunicipal.fields.sector') }}</label>
                <select class="form-control {{ $errors->has('sector') ? 'is-invalid' : '' }}" name="sector" id="sector">
                    <option value disabled {{ old('sector', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\MatriculaMunicipal::SECTOR_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('sector', $matriculaMunicipal->sector) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('sector'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sector') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matriculaMunicipal.fields.sector_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="institucion">{{ trans('cruds.matriculaMunicipal.fields.institucion') }}</label>
                <input class="form-control {{ $errors->has('institucion') ? 'is-invalid' : '' }}" type="text" name="institucion" id="institucion" value="{{ old('institucion', $matriculaMunicipal->institucion) }}">
                @if($errors->has('institucion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('institucion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matriculaMunicipal.fields.institucion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sede">{{ trans('cruds.matriculaMunicipal.fields.sede') }}</label>
                <input class="form-control {{ $errors->has('sede') ? 'is-invalid' : '' }}" type="text" name="sede" id="sede" value="{{ old('sede', $matriculaMunicipal->sede) }}">
                @if($errors->has('sede'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sede') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matriculaMunicipal.fields.sede_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jornada">{{ trans('cruds.matriculaMunicipal.fields.jornada') }}</label>
                <input class="form-control {{ $errors->has('jornada') ? 'is-invalid' : '' }}" type="text" name="jornada" id="jornada" value="{{ old('jornada', $matriculaMunicipal->jornada) }}">
                @if($errors->has('jornada'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jornada') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matriculaMunicipal.fields.jornada_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comuna_id">{{ trans('cruds.matriculaMunicipal.fields.comuna') }}</label>
                <select class="form-control select2 {{ $errors->has('comuna') ? 'is-invalid' : '' }}" name="comuna_id" id="comuna_id">
                    @foreach($comunas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('comuna_id') ? old('comuna_id') : $matriculaMunicipal->comuna->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('comuna'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comuna') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matriculaMunicipal.fields.comuna_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="grado_0">{{ trans('cruds.matriculaMunicipal.fields.grado_0') }}</label>
                <input class="form-control {{ $errors->has('grado_0') ? 'is-invalid' : '' }}" type="number" name="grado_0" id="grado_0" value="{{ old('grado_0', $matriculaMunicipal->grado_0) }}" step="1">
                @if($errors->has('grado_0'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grado_0') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matriculaMunicipal.fields.grado_0_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="grado_1">{{ trans('cruds.matriculaMunicipal.fields.grado_1') }}</label>
                <input class="form-control {{ $errors->has('grado_1') ? 'is-invalid' : '' }}" type="number" name="grado_1" id="grado_1" value="{{ old('grado_1', $matriculaMunicipal->grado_1) }}" step="1">
                @if($errors->has('grado_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grado_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matriculaMunicipal.fields.grado_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="grado_2">{{ trans('cruds.matriculaMunicipal.fields.grado_2') }}</label>
                <input class="form-control {{ $errors->has('grado_2') ? 'is-invalid' : '' }}" type="number" name="grado_2" id="grado_2" value="{{ old('grado_2', $matriculaMunicipal->grado_2) }}" step="1">
                @if($errors->has('grado_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grado_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matriculaMunicipal.fields.grado_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="grado_3">{{ trans('cruds.matriculaMunicipal.fields.grado_3') }}</label>
                <input class="form-control {{ $errors->has('grado_3') ? 'is-invalid' : '' }}" type="number" name="grado_3" id="grado_3" value="{{ old('grado_3', $matriculaMunicipal->grado_3) }}" step="1">
                @if($errors->has('grado_3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grado_3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matriculaMunicipal.fields.grado_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="grado_4">{{ trans('cruds.matriculaMunicipal.fields.grado_4') }}</label>
                <input class="form-control {{ $errors->has('grado_4') ? 'is-invalid' : '' }}" type="number" name="grado_4" id="grado_4" value="{{ old('grado_4', $matriculaMunicipal->grado_4) }}" step="1">
                @if($errors->has('grado_4'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grado_4') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matriculaMunicipal.fields.grado_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="grado_5">{{ trans('cruds.matriculaMunicipal.fields.grado_5') }}</label>
                <input class="form-control {{ $errors->has('grado_5') ? 'is-invalid' : '' }}" type="number" name="grado_5" id="grado_5" value="{{ old('grado_5', $matriculaMunicipal->grado_5) }}" step="1">
                @if($errors->has('grado_5'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grado_5') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matriculaMunicipal.fields.grado_5_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="grado_6">{{ trans('cruds.matriculaMunicipal.fields.grado_6') }}</label>
                <input class="form-control {{ $errors->has('grado_6') ? 'is-invalid' : '' }}" type="number" name="grado_6" id="grado_6" value="{{ old('grado_6', $matriculaMunicipal->grado_6) }}" step="1">
                @if($errors->has('grado_6'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grado_6') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matriculaMunicipal.fields.grado_6_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="grado_7">{{ trans('cruds.matriculaMunicipal.fields.grado_7') }}</label>
                <input class="form-control {{ $errors->has('grado_7') ? 'is-invalid' : '' }}" type="number" name="grado_7" id="grado_7" value="{{ old('grado_7', $matriculaMunicipal->grado_7) }}" step="1">
                @if($errors->has('grado_7'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grado_7') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matriculaMunicipal.fields.grado_7_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="grado_8">{{ trans('cruds.matriculaMunicipal.fields.grado_8') }}</label>
                <input class="form-control {{ $errors->has('grado_8') ? 'is-invalid' : '' }}" type="number" name="grado_8" id="grado_8" value="{{ old('grado_8', $matriculaMunicipal->grado_8) }}" step="1">
                @if($errors->has('grado_8'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grado_8') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matriculaMunicipal.fields.grado_8_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="grado_9">{{ trans('cruds.matriculaMunicipal.fields.grado_9') }}</label>
                <input class="form-control {{ $errors->has('grado_9') ? 'is-invalid' : '' }}" type="number" name="grado_9" id="grado_9" value="{{ old('grado_9', $matriculaMunicipal->grado_9) }}" step="1">
                @if($errors->has('grado_9'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grado_9') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matriculaMunicipal.fields.grado_9_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="grado_10">{{ trans('cruds.matriculaMunicipal.fields.grado_10') }}</label>
                <input class="form-control {{ $errors->has('grado_10') ? 'is-invalid' : '' }}" type="number" name="grado_10" id="grado_10" value="{{ old('grado_10', $matriculaMunicipal->grado_10) }}" step="1">
                @if($errors->has('grado_10'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grado_10') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matriculaMunicipal.fields.grado_10_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="grado_11">{{ trans('cruds.matriculaMunicipal.fields.grado_11') }}</label>
                <input class="form-control {{ $errors->has('grado_11') ? 'is-invalid' : '' }}" type="number" name="grado_11" id="grado_11" value="{{ old('grado_11', $matriculaMunicipal->grado_11) }}" step="1">
                @if($errors->has('grado_11'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grado_11') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matriculaMunicipal.fields.grado_11_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="grado_22">{{ trans('cruds.matriculaMunicipal.fields.grado_22') }}</label>
                <input class="form-control {{ $errors->has('grado_22') ? 'is-invalid' : '' }}" type="number" name="grado_22" id="grado_22" value="{{ old('grado_22', $matriculaMunicipal->grado_22) }}" step="1">
                @if($errors->has('grado_22'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grado_22') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matriculaMunicipal.fields.grado_22_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="grado_23">{{ trans('cruds.matriculaMunicipal.fields.grado_23') }}</label>
                <input class="form-control {{ $errors->has('grado_23') ? 'is-invalid' : '' }}" type="number" name="grado_23" id="grado_23" value="{{ old('grado_23', $matriculaMunicipal->grado_23) }}" step="1">
                @if($errors->has('grado_23'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grado_23') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matriculaMunicipal.fields.grado_23_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="grado_24">{{ trans('cruds.matriculaMunicipal.fields.grado_24') }}</label>
                <input class="form-control {{ $errors->has('grado_24') ? 'is-invalid' : '' }}" type="number" name="grado_24" id="grado_24" value="{{ old('grado_24', $matriculaMunicipal->grado_24) }}" step="1">
                @if($errors->has('grado_24'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grado_24') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matriculaMunicipal.fields.grado_24_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="grado_25">{{ trans('cruds.matriculaMunicipal.fields.grado_25') }}</label>
                <input class="form-control {{ $errors->has('grado_25') ? 'is-invalid' : '' }}" type="number" name="grado_25" id="grado_25" value="{{ old('grado_25', $matriculaMunicipal->grado_25) }}" step="1">
                @if($errors->has('grado_25'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grado_25') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matriculaMunicipal.fields.grado_25_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="grado_99">{{ trans('cruds.matriculaMunicipal.fields.grado_99') }}</label>
                <input class="form-control {{ $errors->has('grado_99') ? 'is-invalid' : '' }}" type="number" name="grado_99" id="grado_99" value="{{ old('grado_99', $matriculaMunicipal->grado_99) }}" step="1">
                @if($errors->has('grado_99'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grado_99') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matriculaMunicipal.fields.grado_99_helper') }}</span>
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