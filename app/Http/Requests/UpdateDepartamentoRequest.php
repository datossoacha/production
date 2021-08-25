<?php

namespace App\Http\Requests;

use App\Models\Departamento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDepartamentoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('departamento_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'code' => [
                'string',
                'nullable',
            ],
        ];
    }
}
