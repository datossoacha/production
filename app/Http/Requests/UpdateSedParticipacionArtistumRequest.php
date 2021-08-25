<?php

namespace App\Http\Requests;

use App\Models\SedParticipacionArtistum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSedParticipacionArtistumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sed_participacion_artistum_edit');
    }

    public function rules()
    {
        return [
            'nombre_artista' => [
                'string',
                'required',
            ],
            'nombre_festival' => [
                'string',
                'required',
            ],
            'fecha_inicial' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'fecha_final' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
