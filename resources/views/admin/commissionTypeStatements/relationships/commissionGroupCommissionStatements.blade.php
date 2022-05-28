<div class="card">
    <div class="card-header">
        {{ trans('cruds.commissionStatement.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-commissionGroupCommissionStatements">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.commissionStatement.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.commissionStatement.fields.agent') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.commissionStatement.fields.total') }}
                        </th>
                        <th>
                            {{ trans('cruds.commissionStatement.fields.commission_group') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commissionStatements as $key => $commissionStatement)
                        <tr data-entry-id="{{ $commissionStatement->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $commissionStatement->id ?? '' }}
                            </td>
                            <td>
                                {{ $commissionStatement->agent->name ?? '' }}
                            </td>
                            <td>
                                {{ $commissionStatement->agent->email ?? '' }}
                            </td>
                            <td>
                                {{ $commissionStatement->total ?? '' }}
                            </td>
                            <td>
                                @foreach($commissionStatement->commission_groups as $key => $item)
                                    <span class="badge badge-info">{{ $item->type }}</span>
                                @endforeach
                            </td>
                            <td>



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
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-commissionGroupCommissionStatements:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection