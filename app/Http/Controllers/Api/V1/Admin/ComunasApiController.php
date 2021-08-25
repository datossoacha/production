<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreComunaRequest;
use App\Http\Requests\UpdateComunaRequest;
use App\Http\Resources\Admin\ComunaResource;
use App\Models\Comuna;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ComunasApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('comuna_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ComunaResource(Comuna::all());
    }

    public function store(StoreComunaRequest $request)
    {
        $comuna = Comuna::create($request->all());

        return (new ComunaResource($comuna))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Comuna $comuna)
    {
        abort_if(Gate::denies('comuna_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ComunaResource($comuna);
    }

    public function update(UpdateComunaRequest $request, Comuna $comuna)
    {
        $comuna->update($request->all());

        return (new ComunaResource($comuna))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Comuna $comuna)
    {
        abort_if(Gate::denies('comuna_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comuna->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
