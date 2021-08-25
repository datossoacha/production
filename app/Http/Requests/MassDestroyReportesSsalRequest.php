<?php

namespace App\Http\Requests;

use App\Models\ReportesSsal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReportesSsalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reportes_ssal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:reportes_ssals,id',
        ];
    }
}
