<?php

namespace App\Http\Requests;

use App\Models\ReportesSedu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReportesSeduRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reportes_sedu_create');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'required',
            ],
            'codigo' => [
                'string',
                'nullable',
            ],
            'fecha' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
