@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.commission.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.commissions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.commission.fields.id') }}
                        </th>
                        <td>
                            {{ $commission->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commission.fields.commission') }}
                        </th>
                        <td>
                            {{ $commission->commission }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commission.fields.level') }}
                        </th>
                        <td>
                            {{ $commission->level }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commission.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Commission::TYPE_SELECT[$commission->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commission.fields.agent_plan') }}
                        </th>
                        <td>
                            {{ $commission->agent_plan->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.commissions.index') }}">
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
            <a class="nav-link" href="#commission_packages_commissions" role="tab" data-toggle="tab">
                {{ trans('cruds.packagesCommission.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="commission_packages_commissions">
            @includeIf('admin.commissions.relationships.commissionPackagesCommissions', ['packagesCommissions' => $commission->commissionPackagesCommissions])
        </div>
    </div>
</div>

@endsection