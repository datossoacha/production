<?php

namespace App\Http\Requests;

use App\Models\SedTransporte;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSedTransporteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sed_transporte_edit');
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
