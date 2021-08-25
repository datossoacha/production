<?php

namespace App\Http\Requests;

use App\Models\SedBiblioUsuario;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSedBiblioUsuarioRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sed_biblio_usuario_create');
    }

    public function rules()
    {
        return [
            'sede_biblioteca' => [
                'string',
                'nullable',
            ],
            'motivo_visita' => [
                'string',
                'nullable',
            ],
            'grupo_etario' => [
                'string',
                'nullable',
            ],
            'genero' => [
                'string',
                'nullable',
            ],
            'tipo_poblacion' => [
                'string',
                'nullable',
            ],
            'fecha_visita' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'cantidad_asistentes' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
