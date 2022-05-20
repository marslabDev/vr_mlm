@can('agent_plan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.agent-plans.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.agentPlan.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.agentPlan.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-rolesAgentPlans">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.agentPlan.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentPlan.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentPlan.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentPlan.fields.roles') }}
                        </th>
                        <th>
                            {{ trans('cruds.agentPlan.fields.commissionable_level') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agentPlans as $key => $agentPlan)
                        <tr data-entry-id="{{ $agentPlan->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $agentPlan->id ?? '' }}
                            </td>
                            <td>
                                {{ $agentPlan->name ?? '' }}
                            </td>
                            <td>
                                {{ $agentPlan->price ?? '' }}
                            </td>
                            <td>
                                {{ $agentPlan->roles->title ?? '' }}
                            </td>
                            <td>
                                {{ $agentPlan->commissionable_level ?? '' }}
                            </td>
                            <td>
                                @can('agent_plan_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.agent-plans.show', $agentPlan->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('agent_plan_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.agent-plans.edit', $agentPlan->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('agent_plan_delete')
                                    <form action="{{ route('admin.agent-plans.destroy', $agentPlan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('agent_plan_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.agent-plans.massDestroy') }}",
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
  let table = $('.datatable-rolesAgentPlans:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection