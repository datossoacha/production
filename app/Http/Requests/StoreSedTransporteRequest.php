<?php

namespace App\Http\Requests;

use App\Models\SedTransporte;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSedTransporteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sed_transporte_create');
    }

    public function rules()
    {
        return [
            'grado' => [
                'string',
                'nullable',
            ],
            'beneficiarios' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
