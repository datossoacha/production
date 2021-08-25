<?php

namespace App\Http\Requests;

use App\Models\ReportesSgob;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReportesSgobRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reportes_sgob_edit');
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
