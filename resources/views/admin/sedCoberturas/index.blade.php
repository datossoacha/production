@extends('layouts.admin')
@section('content')
@can('sed_cobertura_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.sed-coberturas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.sedCobertura.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.sedCobertura.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SedCobertura">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.sedCobertura.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.sedCobertura.fields.poblacion') }}
                        </th>
                        <th>
                            {{ trans('cruds.sedCobertura.fields.poblacion_edad_escolar') }}
                        </th>
                        <th>
                            {{ trans('cruds.sedCobertura.fields.matricula') }}
                        </th>
                        <th>
                            {{ trans('cruds.sedCobertura.fields.cobertura_bruta') }}
                        </th>
                        <th>
                            {{ trans('cruds.sedCobertura.fields.cobertura_neta') }}
                        </th>
                        <th>
                            {{ trans('cruds.sedCobertura.fields.fecha_corte') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sedCoberturas as $key => $sedCobertura)
                        <tr data-entry-id="{{ $sedCobertura->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $sedCobertura->id ?? '' }}
                            </td>
                            <td>
                                {{ $sedCobertura->poblacion ?? '' }}
                            </td>
                            <td>
                                {{ $sedCobertura->poblacion_edad_escolar ?? '' }}
                            </td>
                            <td>
                                {{ $sedCobertura->matricula ?? '' }}
                            </td>
                            <td>
                                {{ $sedCobertura->cobertura_bruta ?? '' }}
                            </td>
                            <td>
                                {{ $sedCobertura->cobertura_neta ?? '' }}
                            </td>
                            <td>
                                {{ $sedCobertura->fecha_corte ?? '' }}
                            </td>
                            <td>
                                @can('sed_cobertura_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.sed-coberturas.show', $sedCobertura->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('sed_cobertura_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.sed-coberturas.edit', $sedCobertura->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('sed_cobertura_delete')
                                    <form action="{{ route('admin.sed-coberturas.destroy', $sedCobertura->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('sed_cobertura_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sed-coberturas.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-SedCobertura:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection