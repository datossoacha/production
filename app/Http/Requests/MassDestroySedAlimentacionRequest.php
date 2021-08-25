<?php

namespace App\Http\Requests;

use App\Models\SedAlimentacion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySedAlimentacionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sed_alimentacion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sed_alimentacions,id',
        ];
    }
}
