<?php

namespace App\Http\Requests;

use App\Models\SedAlimentacion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSedAlimentacionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sed_alimentacion_edit');
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
