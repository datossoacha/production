<?php

namespace App\Http\Requests;

use App\Models\ReportesSgob;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReportesSgobRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reportes_sgob_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:reportes_sgobs,id',
        ];
    }
}
