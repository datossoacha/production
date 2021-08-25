@extends('layouts.admin')
@section('content')
@can('sed_planta_personal_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.sed-planta-personals.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.sedPlantaPersonal.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'SedPlantaPersonal', 'route' => 'admin.sed-planta-personals.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.sedPlantaPersonal.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-SedPlantaPersonal">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.sedPlantaPersonal.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedPlantaPersonal.fields.establecimiento_datos') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedPlantaPersonal.fields.dane') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedPlantaPersonal.fields.comuna') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedPlantaPersonal.fields.area_formacion') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedPlantaPersonal.fields.nivel_educativo') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedPlantaPersonal.fields.area_dicta') }}
                    </th>
                    <th>
                        {{ trans('cruds.sedPlantaPersonal.fields.vigencia') }}
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
@can('sed_planta_personal_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sed-planta-personals.massDestroy') }}",
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
    ajax: "{{ route('admin.sed-planta-personals.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'establecimiento_datos', name: 'establecimiento_datos' },
{ data: 'dane', name: 'dane' },
{ data: 'comuna_nombre', name: 'comuna.nombre' },
{ data: 'area_formacion', name: 'area_formacion' },
{ data: 'nivel_educativo', name: 'nivel_educativo' },
{ data: 'area_dicta', name: 'area_dicta' },
{ data: 'vigencia', name: 'vigencia' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 50,
  };
  let table = $('.datatable-SedPlantaPersonal').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection