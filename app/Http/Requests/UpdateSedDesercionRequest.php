<?php

namespace App\Http\Requests;

use App\Models\SedDesercion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSedDesercionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sed_desercion_edit');
    }

    public function rules()
    {
        return [
            'matricula_aplicable' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'retiros' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'desercion' => [
                'numeric',
                'required',
            ],
            'fecha_corte' => [
                'string',
                'required',
            ],
        ];
    }
}
