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
                            {{ trans('cruds.packagesCommission.fields.commission') }}
                        </th>
                        <th>
                            {{ trans('cruds.commission.fields.level') }}
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
                                {{ $packagesCommission->commission->commission ?? '' }}
                            </td>
                            <td>
                                {{ $packagesCommission->commission->level ?? '' }}
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
  let table = $('.datatable-commissionPackagesCommissions:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection