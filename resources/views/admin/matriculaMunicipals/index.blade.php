@extends('layouts.admin')
@section('content')
@can('matricula_municipal_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.matricula-municipals.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.matriculaMunicipal.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'MatriculaMunicipal', 'route' => 'admin.matricula-municipals.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.matriculaMunicipal.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-MatriculaMunicipal">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.matriculaMunicipal.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.matriculaMunicipal.fields.sector') }}
                    </th>
                    <th>
                        {{ trans('cruds.matriculaMunicipal.fields.institucion') }}
                    </th>
                    <th>
                        {{ trans('cruds.matriculaMunicipal.fields.sede') }}
                    </th>
                    <th>
                        {{ trans('cruds.matriculaMunicipal.fields.jornada') }}
                    </th>
                    <th>
                        {{ trans('cruds.matriculaMunicipal.fields.comuna') }}
                    </th>
                    <th>
                        {{ trans('cruds.matriculaMunicipal.fields.grado_0') }}
                    </th>
                    <th>
                        {{ trans('cruds.matriculaMunicipal.fields.grado_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.matriculaMunicipal.fields.grado_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.matriculaMunicipal.fields.grado_3') }}
                    </th>
                    <th>
                        {{ trans('cruds.matriculaMunicipal.fields.grado_4') }}
                    </th>
                    <th>
                        {{ trans('cruds.matriculaMunicipal.fields.grado_5') }}
                    </th>
                    <th>
                        {{ trans('cruds.matriculaMunicipal.fields.grado_6') }}
                    </th>
                    <th>
                        {{ trans('cruds.matriculaMunicipal.fields.grado_7') }}
                    </th>
                    <th>
                        {{ trans('cruds.matriculaMunicipal.fields.grado_8') }}
                    </th>
                    <th>
                        {{ trans('cruds.matriculaMunicipal.fields.grado_9') }}
                    </th>
                    <th>
                        {{ trans('cruds.matriculaMunicipal.fields.grado_10') }}
                    </th>
                    <th>
                        {{ trans('cruds.matriculaMunicipal.fields.grado_11') }}
                    </th>
                    <th>
                        {{ trans('cruds.matriculaMunicipal.fields.grado_22') }}
                    </th>
                    <th>
                        {{ trans('cruds.matriculaMunicipal.fields.grado_23') }}
                    </th>
                    <th>
                        {{ trans('cruds.matriculaMunicipal.fields.grado_24') }}
                    </th>
                    <th>
                        {{ trans('cruds.matriculaMunicipal.fields.grado_25') }}
                    </th>
                    <th>
                        {{ trans('cruds.matriculaMunicipal.fields.grado_99') }}
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
@can('matricula_municipal_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.matricula-municipals.massDestroy') }}",
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
    ajax: "{{ route('admin.matricula-municipals.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'sector', name: 'sector' },
{ data: 'institucion', name: 'institucion' },
{ data: 'sede', name: 'sede' },
{ data: 'jornada', name: 'jornada' },
{ data: 'comuna_nombre', name: 'comuna.nombre' },
{ data: 'grado_0', name: 'grado_0' },
{ data: 'grado_1', name: 'grado_1' },
{ data: 'grado_2', name: 'grado_2' },
{ data: 'grado_3', name: 'grado_3' },
{ data: 'grado_4', name: 'grado_4' },
{ data: 'grado_5', name: 'grado_5' },
{ data: 'grado_6', name: 'grado_6' },
{ data: 'grado_7', name: 'grado_7' },
{ data: 'grado_8', name: 'grado_8' },
{ data: 'grado_9', name: 'grado_9' },
{ data: 'grado_10', name: 'grado_10' },
{ data: 'grado_11', name: 'grado_11' },
{ data: 'grado_22', name: 'grado_22' },
{ data: 'grado_23', name: 'grado_23' },
{ data: 'grado_24', name: 'grado_24' },
{ data: 'grado_25', name: 'grado_25' },
{ data: 'grado_99', name: 'grado_99' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 50,
  };
  let table = $('.datatable-MatriculaMunicipal').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection