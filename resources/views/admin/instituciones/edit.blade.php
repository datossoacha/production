@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.institucione.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.instituciones.update", [$institucione->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.institucione.fields.sector') }}</label>
                <select class="form-control {{ $errors->has('sector') ? 'is-invalid' : '' }}" name="sector" id="sector" required>
                    <option value disabled {{ old('sector', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Institucione::SECTOR_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('sector', $institucione->sector) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('sector'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sector') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.institucione.fields.sector_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nombre_institucion">{{ trans('cruds.institucione.fields.nombre_institucion') }}</label>
                <input class="form-control {{ $errors->has('nombre_institucion') ? 'is-invalid' : '' }}" type="text" name="nombre_institucion" id="nombre_institucion" value="{{ old('nombre_institucion', $institucione->nombre_institucion) }}" required>
                @if($errors->has('nombre_institucion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre_institucion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.institucione.fields.nombre_institucion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comuna_id">{{ trans('cruds.institucione.fields.comuna') }}</label>
                <select class="form-control select2 {{ $errors->has('comuna') ? 'is-invalid' : '' }}" name="comuna_id" id="comuna_id">
                    @foreach($comunas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('comuna_id') ? old('comuna_id') : $institucione->comuna->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('comuna'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comuna') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.institucione.fields.comuna_helper') }}</span>
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