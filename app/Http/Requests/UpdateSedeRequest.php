<?php

namespace App\Http\Requests;

use App\Models\Sede;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSedeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sede_edit');
    }

    public function rules()
    {
        return [
            'institucion_id' => [
                'required',
                'integer',
            ],
            'nombre' => [
                'string',
                'required',
            ],
            'jornadas.*' => [
                'integer',
            ],
            'jornadas' => [
                'required',
                'array',
            ],
        ];
    }
}
