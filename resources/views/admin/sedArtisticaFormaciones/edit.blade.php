@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.sedArtisticaFormacione.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sed-artistica-formaciones.update", [$sedArtisticaFormacione->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="area_formacion">{{ trans('cruds.sedArtisticaFormacione.fields.area_formacion') }}</label>
                <input class="form-control {{ $errors->has('area_formacion') ? 'is-invalid' : '' }}" type="text" name="area_formacion" id="area_formacion" value="{{ old('area_formacion', $sedArtisticaFormacione->area_formacion) }}">
                @if($errors->has('area_formacion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('area_formacion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedArtisticaFormacione.fields.area_formacion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="categoria">{{ trans('cruds.sedArtisticaFormacione.fields.categoria') }}</label>
                <input class="form-control {{ $errors->has('categoria') ? 'is-invalid' : '' }}" type="text" name="categoria" id="categoria" value="{{ old('categoria', $sedArtisticaFormacione->categoria) }}">
                @if($errors->has('categoria'))
                    <div class="invalid-feedback">
                        {{ $errors->first('categoria') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedArtisticaFormacione.fields.categoria_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="atendidos">{{ trans('cruds.sedArtisticaFormacione.fields.atendidos') }}</label>
                <input class="form-control {{ $errors->has('atendidos') ? 'is-invalid' : '' }}" type="number" name="atendidos" id="atendidos" value="{{ old('atendidos', $sedArtisticaFormacione->atendidos) }}" step="1">
                @if($errors->has('atendidos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('atendidos') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedArtisticaFormacione.fields.atendidos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vigencia">{{ trans('cruds.sedArtisticaFormacione.fields.vigencia') }}</label>
                <input class="form-control {{ $errors->has('vigencia') ? 'is-invalid' : '' }}" type="number" name="vigencia" id="vigencia" value="{{ old('vigencia', $sedArtisticaFormacione->vigencia) }}" step="1">
                @if($errors->has('vigencia'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vigencia') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sedArtisticaFormacione.fields.vigencia_helper') }}</span>
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