@can('packages_commission_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.packages-commissions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.packagesCommission.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.packagesCommission.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-commissionPackagesCommissions">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.packagesCommission.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.packagesCommission.fields.tuition_package_efk') }}
                        </th>
                        <th>
                            {{ trans('cruds.packagesCommission.fields.agent_plan') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentPlan.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.packagesCommission.fields.commission') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($packagesCommissions as $key => $packagesCommission)
                        <tr data-entry-id="{{ $packagesCommission->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $packagesCommission->id ?? '' }}
                            </td>
                            <td>
                                {{ $packagesCommission->tuition_package_efk ?? '' }}
                            </td>
                            <td>
                                {{ $packagesCommission->agent_plan->name ?? '' }}
                            </td>
                            <td>
                                {{ $packagesCommission->agent_plan->price ?? '' }}
                            </td>
                            <td>
                                @foreach($packagesCommission->commissions as $key => $item)
                                    <span class="badge badge-info">{{ $item->commission }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('packages_commission_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.packages-commissions.show', $packagesCommission->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('packages_commission_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.packages-commissions.edit', $packagesCommission->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('packages_commission_delete')
                                    <form action="{{ route('admin.packages-commissions.destroy', $packagesCommission->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('packages_commission_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.packages-commissions.massDestroy') }}",
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
  let table = $('.datatable-commissionPackagesCommissions:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection