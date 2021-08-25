<?php

namespace App\Http\Requests;

use App\Models\SedDesercion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSedDesercionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sed_desercion_create');
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
