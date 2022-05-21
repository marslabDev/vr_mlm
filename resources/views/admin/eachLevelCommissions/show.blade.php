@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.eachLevelCommission.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.each-level-commissions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.eachLevelCommission.fields.id') }}
                        </th>
                        <td>
                            {{ $eachLevelCommission->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.eachLevelCommission.fields.commission') }}
                        </th>
                        <td>
                            {{ $eachLevelCommission->commission }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.eachLevelCommission.fields.level') }}
                        </th>
                        <td>
                            {{ $eachLevelCommission->level }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.each-level-commissions.index') }}">
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
            <a class="nav-link" href="#commission_commissions" role="tab" data-toggle="tab">
                {{ trans('cruds.commission.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="commission_commissions">
            @includeIf('admin.eachLevelCommissions.relationships.commissionCommissions', ['commissions' => $eachLevelCommission->commissionCommissions])
        </div>
    </div>
</div>

@endsection