<?php

namespace App\Http\Requests;

use App\Models\SedRepitencium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSedRepitenciumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sed_repitencium_create');
    }

    public function rules()
    {
        return [
            'poblacion' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'matricula' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'repitencia' => [
                'numeric',
                'required',
            ],
            'fecha_corte' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
