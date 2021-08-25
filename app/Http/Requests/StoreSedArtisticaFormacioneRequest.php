<?php

namespace App\Http\Requests;

use App\Models\SedArtisticaFormacione;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSedArtisticaFormacioneRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sed_artistica_formacione_create');
    }

    public function rules()
    {
        return [
            'area_formacion' => [
                'string',
                'nullable',
            ],
            'categoria' => [
                'string',
                'nullable',
            ],
            'atendidos' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'vigencia' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
