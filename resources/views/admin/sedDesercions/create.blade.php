@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.sedDesercion.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sed-desercions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="matricula_aplicable">{{ trans('cruds.sedDesercion.fields.matricula_aplicable') }}</label>
                <input class="form-control {{ $errors->has('matricula_aplicable') ? 'is-invalid' : '' }}" type="number" name="matricula_aplicable" id="matricula_aplicable" value="{{ old('matricula_aplicable', '') }}" step="1" required>
                @if($errors->has('matricula_aplicable'))
                    <div class="invalid-feedback">
                        {{ $errors->first('matricula_aplicable') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedDesercion.fields.matricula_aplicable_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="retiros">{{ trans('cruds.sedDesercion.fields.retiros') }}</label>
                <input class="form-control {{ $errors->has('retiros') ? 'is-invalid' : '' }}" type="number" name="retiros" id="retiros" value="{{ old('retiros', '') }}" step="1" required>
                @if($errors->has('retiros'))
                    <div class="invalid-feedback">
                        {{ $errors->first('retiros') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedDesercion.fields.retiros_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="desercion">{{ trans('cruds.sedDesercion.fields.desercion') }}</label>
                <input class="form-control {{ $errors->has('desercion') ? 'is-invalid' : '' }}" type="number" name="desercion" id="desercion" value="{{ old('desercion', '') }}" step="0.01" required>
                @if($errors->has('desercion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('desercion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedDesercion.fields.desercion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha_corte">{{ trans('cruds.sedDesercion.fields.fecha_corte') }}</label>
                <input class="form-control {{ $errors->has('fecha_corte') ? 'is-invalid' : '' }}" type="text" name="fecha_corte" id="fecha_corte" value="{{ old('fecha_corte', '') }}" required>
                @if($errors->has('fecha_corte'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fecha_corte') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedDesercion.fields.fecha_corte_helper') }}</span>
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