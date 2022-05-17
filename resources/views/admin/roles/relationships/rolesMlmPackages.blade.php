@can('mlm_package_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.mlm-packages.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.mlmPackage.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.mlmPackage.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-rolesMlmPackages">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.mlmPackage.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.mlmPackage.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.mlmPackage.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.mlmPackage.fields.roles') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mlmPackages as $key => $mlmPackage)
                        <tr data-entry-id="{{ $mlmPackage->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $mlmPackage->id ?? '' }}
                            </td>
                            <td>
                                {{ $mlmPackage->name ?? '' }}
                            </td>
                            <td>
                                {{ $mlmPackage->price ?? '' }}
                            </td>
                            <td>
                                {{ $mlmPackage->roles->title ?? '' }}
                            </td>
                            <td>
                                @can('mlm_package_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.mlm-packages.show', $mlmPackage->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('mlm_package_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.mlm-packages.edit', $mlmPackage->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('mlm_package_delete')
                                    <form action="{{ route('admin.mlm-packages.destroy', $mlmPackage->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('mlm_package_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.mlm-packages.massDestroy') }}",
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
    order: [[ 2, 'desc' ]],
    pageLength: 10,
  });
  let table = $('.datatable-rolesMlmPackages:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection