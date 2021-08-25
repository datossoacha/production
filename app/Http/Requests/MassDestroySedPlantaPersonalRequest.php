<?php

namespace App\Http\Requests;

use App\Models\SedPlantaPersonal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySedPlantaPersonalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sed_planta_personal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sed_planta_personals,id',
        ];
    }
}
