<?php

namespace App\Http\Requests;

use App\Models\SedEstimulosGestore;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSedEstimulosGestoreRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sed_estimulos_gestore_create');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'required',
            ],
            'linea_participacion' => [
                'string',
                'required',
            ],
            'proyecto' => [
                'string',
                'nullable',
            ],
            'estado' => [
                'required',
            ],
            'fecha_presentacion' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
