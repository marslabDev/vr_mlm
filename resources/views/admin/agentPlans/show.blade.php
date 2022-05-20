@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.agentPlan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agent-plans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.agentPlan.fields.id') }}
                        </th>
                        <td>
                            {{ $agentPlan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentPlan.fields.name') }}
                        </th>
                        <td>
                            {{ $agentPlan->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentPlan.fields.price') }}
                        </th>
                        <td>
                            {{ $agentPlan->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentPlan.fields.description') }}
                        </th>
                        <td>
                            {!! $agentPlan->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentPlan.fields.roles') }}
                        </th>
                        <td>
                            {{ $agentPlan->roles->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agentPlan.fields.commissionable_level') }}
                        </th>
                        <td>
                            {{ $agentPlan->commissionable_level }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agent-plans.index') }}">
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
            <a class="nav-link" href="#current_plan_mlm_levels" role="tab" data-toggle="tab">
                {{ trans('cruds.mlmLevel.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#agent_plan_commissions" role="tab" data-toggle="tab">
                {{ trans('cruds.commission.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="current_plan_mlm_levels">
            @includeIf('admin.agentPlans.relationships.currentPlanMlmLevels', ['mlmLevels' => $agentPlan->currentPlanMlmLevels])
        </div>
        <div class="tab-pane" role="tabpanel" id="agent_plan_commissions">
            @includeIf('admin.agentPlans.relationships.agentPlanCommissions', ['commissions' => $agentPlan->agentPlanCommissions])
        </div>
    </div>
</div>

@endsection