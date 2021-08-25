<?php

namespace App\Http\Requests;

use App\Models\SedClasificacionSaber;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSedClasificacionSaberRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sed_clasificacion_saber_edit');
    }

    public function rules()
    {
        return [
            'dane' => [
                'string',
                'required',
            ],
            'zona' => [
                'required',
            ],
            'sector' => [
                'required',
            ],
            'comuna_id' => [
                'required',
                'integer',
            ],
            'clasificacion' => [
                'string',
                'required',
            ],
            'matriculas_3_ult' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'evaluados_3_ult' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'indice_matematica' => [
                'numeric',
                'required',
            ],
            'indice_ciencias' => [
                'numeric',
                'required',
            ],
            'indice_sociales' => [
                'numeric',
                'required',
            ],
            'indice_lectura' => [
                'numeric',
                'required',
            ],
            'indice_ingles' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'indice_total' => [
                'string',
                'required',
            ],
            'fecha_corte' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
