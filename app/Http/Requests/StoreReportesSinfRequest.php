<?php

namespace App\Http\Requests;

use App\Models\ReportesSinf;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReportesSinfRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reportes_sinf_create');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'required',
            ],
            'fecha' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
