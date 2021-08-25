<?php

namespace App\Http\Requests;

use App\Models\SedRecurso;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSedRecursoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sed_recurso_edit');
    }

    public function rules()
    {
        return [
            'area' => [
                'required',
            ],
            'asignados' => [
                'numeric',
                'required',
            ],
            'ejecutados' => [
                'numeric',
                'required',
            ],
            'ejecucion' => [
                'numeric',
            ],
            'vigencia' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
