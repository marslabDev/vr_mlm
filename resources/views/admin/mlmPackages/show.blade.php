@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.mlmPackage.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mlm-packages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.mlmPackage.fields.id') }}
                        </th>
                        <td>
                            {{ $mlmPackage->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mlmPackage.fields.name') }}
                        </th>
                        <td>
                            {{ $mlmPackage->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mlmPackage.fields.price') }}
                        </th>
                        <td>
                            {{ $mlmPackage->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mlmPackage.fields.description') }}
                        </th>
                        <td>
                            {!! $mlmPackage->description !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mlm-packages.index') }}">
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
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="current_plan_mlm_levels">
            @includeIf('admin.mlmPackages.relationships.currentPlanMlmLevels', ['mlmLevels' => $mlmPackage->currentPlanMlmLevels])
        </div>
    </div>
</div>

@endsection