<?php

namespace App\Http\Requests;

use App\Models\ReportesIrdp;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReportesIrdpRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reportes_irdp_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:reportes_irdps,id',
        ];
    }
}
