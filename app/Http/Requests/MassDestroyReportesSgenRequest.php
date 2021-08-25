<?php

namespace App\Http\Requests;

use App\Models\ReportesSgen;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReportesSgenRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reportes_sgen_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:reportes_sgens,id',
        ];
    }
}
