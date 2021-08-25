<?php

namespace App\Http\Requests;

use App\Models\SedCobertura;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySedCoberturaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sed_cobertura_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sed_coberturas,id',
        ];
    }
}
