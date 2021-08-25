<?php

namespace App\Http\Requests;

use App\Models\SedRecurso;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySedRecursoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sed_recurso_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sed_recursos,id',
        ];
    }
}
