@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.sedTransporte.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sed-transportes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.sedTransporte.fields.zona') }}</label>
                <select class="form-control {{ $errors->has('zona') ? 'is-invalid' : '' }}" name="zona" id="zona">
                    <option value disabled {{ old('zona', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\SedTransporte::ZONA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('zona', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('zona'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zona') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedTransporte.fields.zona_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comuna_id">{{ trans('cruds.sedTransporte.fields.comuna') }}</label>
                <select class="form-control select2 {{ $errors->has('comuna') ? 'is-invalid' : '' }}" name="comuna_id" id="comuna_id">
                    @foreach($comunas as $id => $entry)
                        <option value="{{ $id }}" {{ old('comuna_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('comuna'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comuna') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedTransporte.fields.comuna_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="institucion_id">{{ trans('cruds.sedTransporte.fields.institucion') }}</label>
                <select class="form-control select2 {{ $errors->has('institucion') ? 'is-invalid' : '' }}" name="institucion_id" id="institucion_id">
                    @foreach($institucions as $id => $entry)
                        <option value="{{ $id }}" {{ old('institucion_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('institucion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('institucion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedTransporte.fields.institucion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sede_id">{{ trans('cruds.sedTransporte.fields.sede') }}</label>
                <select class="form-control select2 {{ $errors->has('sede') ? 'is-invalid' : '' }}" name="sede_id" id="sede_id">
                    @foreach($sedes as $id => $entry)
                        <option value="{{ $id }}" {{ old('sede_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('sede'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sede') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedTransporte.fields.sede_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="grado">{{ trans('cruds.sedTransporte.fields.grado') }}</label>
                <input class="form-control {{ $errors->has('grado') ? 'is-invalid' : '' }}" type="text" name="grado" id="grado" value="{{ old('grado', '') }}">
                @if($errors->has('grado'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grado') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedTransporte.fields.grado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="beneficiarios">{{ trans('cruds.sedTransporte.fields.beneficiarios') }}</label>
                <input class="form-control {{ $errors->has('beneficiarios') ? 'is-invalid' : '' }}" type="number" name="beneficiarios" id="beneficiarios" value="{{ old('beneficiarios', '') }}" step="1">
                @if($errors->has('beneficiarios'))
                    <div class="invalid-feedback">
                        {{ $errors->first('beneficiarios') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedTransporte.fields.beneficiarios_helper') }}</span>
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