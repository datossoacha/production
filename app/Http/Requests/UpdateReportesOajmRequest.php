<?php

namespace App\Http\Requests;

use App\Models\ReportesOajm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReportesOajmRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reportes_oajm_edit');
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
