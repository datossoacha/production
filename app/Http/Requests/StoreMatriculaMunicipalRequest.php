<?php

namespace App\Http\Requests;

use App\Models\MatriculaMunicipal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMatriculaMunicipalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('matricula_municipal_create');
    }

    public function rules()
    {
        return [
            'institucion' => [
                'string',
                'nullable',
            ],
            'sede' => [
                'string',
                'nullable',
            ],
            'jornada' => [
                'string',
                'nullable',
            ],
            'grado_0' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'grado_1' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'grado_2' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'grado_3' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'grado_4' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'grado_5' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'grado_6' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'grado_7' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'grado_8' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'grado_9' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'grado_10' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'grado_11' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'grado_22' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'grado_23' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'grado_24' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'grado_25' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'grado_99' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
