<?php

namespace App\Http\Requests;

use App\Models\Municipio;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMunicipioRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('municipio_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'code' => [
                'string',
                'required',
            ],
            'departamento_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
