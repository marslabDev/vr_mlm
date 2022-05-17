@can('mlm_level_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.mlm-levels.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.mlmLevel.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.mlmLevel.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-userMlmLevels">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.mlmLevel.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.mlmLevel.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.mlmLevel.fields.current_plan') }}
                        </th>
                        <th>
                            {{ trans('cruds.mlmLevel.fields.children_count') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mlmLevels as $key => $mlmLevel)
                        <tr data-entry-id="{{ $mlmLevel->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $mlmLevel->id ?? '' }}
                            </td>
                            <td>
                                {{ $mlmLevel->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $mlmLevel->current_plan->name ?? '' }}
                            </td>
                            <td>
                                {{ $mlmLevel->children_count ?? '' }}
                            </td>
                            <td>
                                @can('mlm_level_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.mlm-levels.show', $mlmLevel->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('mlm_level_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.mlm-levels.edit', $mlmLevel->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('mlm_level_delete')
                                    <form action="{{ route('admin.mlm-levels.destroy', $mlmLevel->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('mlm_level_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.mlm-levels.massDestroy') }}",
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
    pageLength: 100,
  });
  let table = $('.datatable-userMlmLevels:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection