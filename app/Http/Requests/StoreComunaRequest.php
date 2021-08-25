<?php

namespace App\Http\Requests;

use App\Models\Comuna;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreComunaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('comuna_create');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'nullable',
            ],
            'codigo' => [
                'string',
                'nullable',
            ],
        ];
    }
}
