@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.eachLevelCommission.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-EachLevelCommission">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.eachLevelCommission.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.eachLevelCommission.fields.commission') }}
                        </th>
                        <th>
                            {{ trans('cruds.eachLevelCommission.fields.level') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($eachLevelCommissions as $key => $eachLevelCommission)
                        <tr data-entry-id="{{ $eachLevelCommission->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $eachLevelCommission->id ?? '' }}
                            </td>
                            <td>
                                {{ $eachLevelCommission->commission ?? '' }}
                            </td>
                            <td>
                                {{ $eachLevelCommission->level ?? '' }}
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



@endsection
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
  let table = $('.datatable-EachLevelCommission:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection