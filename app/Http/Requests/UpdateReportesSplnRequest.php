<?php

namespace App\Http\Requests;

use App\Models\ReportesSpln;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReportesSplnRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reportes_spln_edit');
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
