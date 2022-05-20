<div class="card">
    <div class="card-header">
        {{ trans('cruds.mlmLevel.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-currentPlanMlmLevels">
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
  let table = $('.datatable-currentPlanMlmLevels:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection