@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.sede.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sedes.update", [$sede->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="institucion_id">{{ trans('cruds.sede.fields.institucion') }}</label>
                <select class="form-control select2 {{ $errors->has('institucion') ? 'is-invalid' : '' }}" name="institucion_id" id="institucion_id" required>
                    @foreach($institucions as $id => $entry)
                        <option value="{{ $id }}" {{ (old('institucion_id') ? old('institucion_id') : $sede->institucion->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('institucion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('institucion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sede.fields.institucion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nombre">{{ trans('cruds.sede.fields.nombre') }}</label>
                <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', $sede->nombre) }}" required>
                @if($errors->has('nombre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sede.fields.nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jornadas">{{ trans('cruds.sede.fields.jornadas') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('jornadas') ? 'is-invalid' : '' }}" name="jornadas[]" id="jornadas" multiple required>
                    @foreach($jornadas as $id => $jornada)
                        <option value="{{ $id }}" {{ (in_array($id, old('jornadas', [])) || $sede->jornadas->contains($id)) ? 'selected' : '' }}>{{ $jornada }}</option>
                    @endforeach
                </select>
                @if($errors->has('jornadas'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jornadas') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sede.fields.jornadas_helper') }}</span>
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