<?php

namespace App\Http\Requests;

use App\Models\Jornada;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreJornadaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('jornada_create');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'nullable',
            ],
        ];
    }
}
