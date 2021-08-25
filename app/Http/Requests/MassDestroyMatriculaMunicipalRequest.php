<?php

namespace App\Http\Requests;

use App\Models\MatriculaMunicipal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMatriculaMunicipalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('matricula_municipal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:matricula_municipals,id',
        ];
    }
}
