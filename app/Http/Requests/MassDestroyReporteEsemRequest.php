<?php

namespace App\Http\Requests;

use App\Models\ReporteEsem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReporteEsemRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reporte_esem_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:reporte_esems,id',
        ];
    }
}
