<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyComunaRequest;
use App\Http\Requests\StoreComunaRequest;
use App\Http\Requests\UpdateComunaRequest;
use App\Models\Comuna;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ComunasController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('comuna_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Comuna::query()->select(sprintf('%s.*', (new Comuna())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'comuna_show';
                $editGate = 'comuna_edit';
                $deleteGate = 'comuna_delete';
                $crudRoutePart = 'comunas';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('nombre', function ($row) {
                return $row->nombre ? $row->nombre : '';
            });
            $table->editColumn('codigo', function ($row) {
                return $row->codigo ? $row->codigo : '';
            });
            $table->editColumn('observaciones', function ($row) {
                return $row->observaciones ? $row->observaciones : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.comunas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('comuna_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.comunas.create');
    }

    public function store(StoreComunaRequest $request)
    {
        $comuna = Comuna::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $comuna->id]);
        }

        return redirect()->route('admin.comunas.index');
    }

    public function edit(Comuna $comuna)
    {
        abort_if(Gate::denies('comuna_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.comunas.edit', compact('comuna'));
    }

    public function update(UpdateComunaRequest $request, Comuna $comuna)
    {
        $comuna->update($request->all());

        return redirect()->route('admin.comunas.index');
    }

    public function show(Comuna $comuna)
    {
        abort_if(Gate::denies('comuna_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comuna->load('comunaInstituciones');

        return view('admin.comunas.show', compact('comuna'));
    }

    public function destroy(Comuna $comuna)
    {
        abort_if(Gate::denies('comuna_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comuna->delete();

        return back();
    }

    public function massDestroy(MassDestroyComunaRequest $request)
    {
        Comuna::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('comuna_create') && Gate::denies('comuna_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Comuna();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
