<?php

namespace App\Http\Requests;

use App\Models\Municipio;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMunicipioRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('municipio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:municipios,id',
        ];
    }
}
