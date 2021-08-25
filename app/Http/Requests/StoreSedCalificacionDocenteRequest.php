<?php

namespace App\Http\Requests;

use App\Models\SedCalificacionDocente;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSedCalificacionDocenteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sed_calificacion_docente_create');
    }

    public function rules()
    {
        return [
            'dane' => [
                'string',
                'required',
            ],
            'institucion_id' => [
                'required',
                'integer',
            ],
            'sede_id' => [
                'required',
                'integer',
            ],
            'zona' => [
                'required',
            ],
            'comuna_id' => [
                'required',
                'integer',
            ],
            'cargo' => [
                'string',
                'required',
            ],
            'area' => [
                'string',
                'required',
            ],
            'calificacion' => [
                'numeric',
                'required',
            ],
            'valoracion' => [
                'string',
                'required',
            ],
            'vigencia' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
