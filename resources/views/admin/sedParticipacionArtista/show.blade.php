@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sedParticipacionArtistum.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-participacion-artista.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sedParticipacionArtistum.fields.id') }}
                        </th>
                        <td>
                            {{ $sedParticipacionArtistum->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedParticipacionArtistum.fields.nombre_artista') }}
                        </th>
                        <td>
                            {{ $sedParticipacionArtistum->nombre_artista }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedParticipacionArtistum.fields.nombre_festival') }}
                        </th>
                        <td>
                            {{ $sedParticipacionArtistum->nombre_festival }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedParticipacionArtistum.fields.fecha_inicial') }}
                        </th>
                        <td>
                            {{ $sedParticipacionArtistum->fecha_inicial }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sedParticipacionArtistum.fields.fecha_final') }}
                        </th>
                        <td>
                            {{ $sedParticipacionArtistum->fecha_final }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sed-participacion-artista.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection