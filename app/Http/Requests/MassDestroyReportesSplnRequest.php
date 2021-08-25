<?php

namespace App\Http\Requests;

use App\Models\ReportesSpln;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReportesSplnRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reportes_spln_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:reportes_splns,id',
        ];
    }
}
