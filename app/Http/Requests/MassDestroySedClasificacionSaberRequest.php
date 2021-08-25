<?php

namespace App\Http\Requests;

use App\Models\SedClasificacionSaber;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySedClasificacionSaberRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sed_clasificacion_saber_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sed_clasificacion_sabers,id',
        ];
    }
}
