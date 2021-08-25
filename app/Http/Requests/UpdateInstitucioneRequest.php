<?php

namespace App\Http\Requests;

use App\Models\Institucione;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInstitucioneRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('institucione_edit');
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
