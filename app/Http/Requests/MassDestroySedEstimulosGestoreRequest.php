<?php

namespace App\Http\Requests;

use App\Models\SedEstimulosGestore;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySedEstimulosGestoreRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sed_estimulos_gestore_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sed_estimulos_gestores,id',
        ];
    }
}
