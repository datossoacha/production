<?php

namespace App\Http\Requests;

use App\Models\SedBiblioUsuario;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySedBiblioUsuarioRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sed_biblio_usuario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sed_biblio_usuarios,id',
        ];
    }
}
