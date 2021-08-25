<?php

namespace App\Http\Requests;

use App\Models\SedCalificacionDocente;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySedCalificacionDocenteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sed_calificacion_docente_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sed_calificacion_docentes,id',
        ];
    }
}
