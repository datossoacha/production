@extends('layouts.admin')
@section('content')
@can('sed_calificacion_docente_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.sed-calificacion-docentes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.sedCalificacionDocente.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'SedCalificacionDocente', 'route' => 'admin.sed-calificacion-docentes.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.sedCalificacionDocente.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-SedCalificacionDocente">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.sedCalificacionDocente.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedCalificacionDocente.fields.dane') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedCalificacionDocente.fields.institucion') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedCalificacionDocente.fields.sede') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedCalificacionDocente.fields.zona') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedCalificacionDocente.fields.comuna') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedCalificacionDocente.fields.cargo') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedCalificacionDocente.fields.area') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedCalificacionDocente.fields.calificacion') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedCalificacionDocente.fields.valoracion') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedCalificacionDocente.fields.vigencia') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('sed_calificacion_docente_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sed-calificacion-docentes.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.sed-calificacion-docentes.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'dane', name: 'dane' },
{ data: 'institucion_nombre_institucion', name: 'institucion.nombre_institucion' },
{ data: 'sede_nombre', name: 'sede.nombre' },
{ data: 'zona', name: 'zona' },
{ data: 'comuna_nombre', name: 'comuna.nombre' },
{ data: 'cargo', name: 'cargo' },
{ data: 'area', name: 'area' },
{ data: 'calificacion', name: 'calificacion' },
{ data: 'valoracion', name: 'valoracion' },
{ data: 'vigencia', name: 'vigencia' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-SedCalificacionDocente').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection