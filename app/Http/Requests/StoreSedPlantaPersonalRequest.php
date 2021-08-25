<?php

namespace App\Http\Requests;

use App\Models\SedPlantaPersonal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSedPlantaPersonalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sed_planta_personal_create');
    }

    public function rules()
    {
        return [
            'establecimiento_datos' => [
                'string',
                'required',
            ],
            'dane' => [
                'string',
                'required',
            ],
            'comuna_id' => [
                'required',
                'integer',
            ],
            'area_formacion' => [
                'string',
                'required',
            ],
            'nivel_educativo' => [
                'string',
                'required',
            ],
            'area_dicta' => [
                'string',
                'required',
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
