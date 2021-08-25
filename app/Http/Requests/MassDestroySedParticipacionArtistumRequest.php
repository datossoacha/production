<?php

namespace App\Http\Requests;

use App\Models\SedParticipacionArtistum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySedParticipacionArtistumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sed_participacion_artistum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sed_participacion_artista,id',
        ];
    }
}
