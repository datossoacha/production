<?php

namespace App\Http\Requests;

use App\Models\Institucione;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInstitucioneRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('institucione_create');
    }

    public function rules()
    {
        return [
            'sector' => [
                'required',
            ],
            'nombre_institucion' => [
                'string',
                'required',
            ],
        ];
    }
}
