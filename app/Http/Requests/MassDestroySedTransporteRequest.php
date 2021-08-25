<?php

namespace App\Http\Requests;

use App\Models\SedTransporte;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySedTransporteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sed_transporte_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sed_transportes,id',
        ];
    }
}
