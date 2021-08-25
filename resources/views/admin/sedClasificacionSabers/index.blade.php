@extends('layouts.admin')
@section('content')
@can('sed_clasificacion_saber_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.sed-clasificacion-sabers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.sedClasificacionSaber.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'SedClasificacionSaber', 'route' => 'admin.sed-clasificacion-sabers.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.sedClasificacionSaber.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-SedClasificacionSaber">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.sedClasificacionSaber.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedClasificacionSaber.fields.dane') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedClasificacionSaber.fields.zona') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedClasificacionSaber.fields.sector') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedClasificacionSaber.fields.comuna') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedClasificacionSaber.fields.clasificacion') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedClasificacionSaber.fields.matriculas_3_ult') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedClasificacionSaber.fields.evaluados_3_ult') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedClasificacionSaber.fields.indice_matematica') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedClasificacionSaber.fields.indice_ciencias') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedClasificacionSaber.fields.indice_sociales') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedClasificacionSaber.fields.indice_lectura') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedClasificacionSaber.fields.indice_ingles') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedClasificacionSaber.fields.indice_total') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedClasificacionSaber.fields.fecha_corte') }}
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
@can('sed_clasificacion_saber_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sed-clasificacion-sabers.massDestroy') }}",
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
    ajax: "{{ route('admin.sed-clasificacion-sabers.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'dane', name: 'dane' },
{ data: 'zona', name: 'zona' },
{ data: 'sector', name: 'sector' },
{ data: 'comuna_codigo', name: 'comuna.codigo' },
{ data: 'clasificacion', name: 'clasificacion' },
{ data: 'matriculas_3_ult', name: 'matriculas_3_ult' },
{ data: 'evaluados_3_ult', name: 'evaluados_3_ult' },
{ data: 'indice_matematica', name: 'indice_matematica' },
{ data: 'indice_ciencias', name: 'indice_ciencias' },
{ data: 'indice_sociales', name: 'indice_sociales' },
{ data: 'indice_lectura', name: 'indice_lectura' },
{ data: 'indice_ingles', name: 'indice_ingles' },
{ data: 'indice_total', name: 'indice_total' },
{ data: 'fecha_corte', name: 'fecha_corte' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 50,
  };
  let table = $('.datatable-SedClasificacionSaber').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection