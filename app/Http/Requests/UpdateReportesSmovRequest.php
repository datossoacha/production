<?php

namespace App\Http\Requests;

use App\Models\ReportesSmov;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReportesSmovRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reportes_smov_edit');
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
