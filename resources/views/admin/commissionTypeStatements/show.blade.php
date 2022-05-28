@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.commissionTypeStatement.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.commission-type-statements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.commissionTypeStatement.fields.id') }}
                        </th>
                        <td>
                            {{ $commissionTypeStatement->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commissionTypeStatement.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\CommissionTypeStatement::TYPE_SELECT[$commissionTypeStatement->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commissionTypeStatement.fields.sub_total') }}
                        </th>
                        <td>
                            {{ $commissionTypeStatement->sub_total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commissionTypeStatement.fields.items') }}
                        </th>
                        <td>
                            @foreach($commissionTypeStatement->items as $key => $items)
                                <span class="label label-info">{{ $items->tuition_package_efk }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.commission-type-statements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#commission_group_commission_statements" role="tab" data-toggle="tab">
                {{ trans('cruds.commissionStatement.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="commission_group_commission_statements">
            @includeIf('admin.commissionTypeStatements.relationships.commissionGroupCommissionStatements', ['commissionStatements' => $commissionTypeStatement->commissionGroupCommissionStatements])
        </div>
    </div>
</div>

@endsection