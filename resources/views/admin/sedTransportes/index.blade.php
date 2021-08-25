@extends('layouts.admin')
@section('content')
@can('sed_transporte_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.sed-transportes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.sedTransporte.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'SedTransporte', 'route' => 'admin.sed-transportes.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.sedTransporte.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-SedTransporte">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.sedTransporte.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedTransporte.fields.zona') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedTransporte.fields.comuna') }}
                    </th>
                    <th>
                        {{ trans('cruds.comuna.fields.nombre') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedTransporte.fields.institucion') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedTransporte.fields.sede') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedTransporte.fields.grado') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedTransporte.fields.beneficiarios') }}
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
@can('sed_transporte_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sed-transportes.massDestroy') }}",
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
    ajax: "{{ route('admin.sed-transportes.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'zona', name: 'zona' },
{ data: 'comuna_codigo', name: 'comuna.codigo' },
{ data: 'comuna.nombre', name: 'comuna.nombre' },
{ data: 'institucion_nombre_institucion', name: 'institucion.nombre_institucion' },
{ data: 'sede_nombre', name: 'sede.nombre' },
{ data: 'grado', name: 'grado' },
{ data: 'beneficiarios', name: 'beneficiarios' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 50,
  };
  let table = $('.datatable-SedTransporte').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection