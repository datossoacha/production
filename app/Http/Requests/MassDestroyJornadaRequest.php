<?php

namespace App\Http\Requests;

use App\Models\Jornada;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyJornadaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('jornada_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:jornadas,id',
        ];
    }
}
