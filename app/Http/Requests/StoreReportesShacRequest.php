<?php

namespace App\Http\Requests;

use App\Models\ReportesShac;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReportesShacRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reportes_shac_create');
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
