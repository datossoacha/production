<?php

namespace App\Http\Requests;

use App\Models\SedCobertura;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSedCoberturaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sed_cobertura_create');
    }

    public function rules()
    {
        return [
            'poblacion' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'poblacion_edad_escolar' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'matricula' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'cobertura_bruta' => [
                'numeric',
                'required',
            ],
            'cobertura_neta' => [
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
