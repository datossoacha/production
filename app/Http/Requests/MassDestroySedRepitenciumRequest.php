<?php

namespace App\Http\Requests;

use App\Models\SedRepitencium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySedRepitenciumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sed_repitencium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sed_repitencia,id',
        ];
    }
}
