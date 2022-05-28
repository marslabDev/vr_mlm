@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.commissionStatement.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.commission-statements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.commissionStatement.fields.id') }}
                        </th>
                        <td>
                            {{ $commissionStatement->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commissionStatement.fields.agent') }}
                        </th>
                        <td>
                            {{ $commissionStatement->agent->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commissionStatement.fields.total') }}
                        </th>
                        <td>
                            {{ $commissionStatement->total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commissionStatement.fields.commission_group') }}
                        </th>
                        <td>
                            @foreach($commissionStatement->commission_groups as $key => $commission_group)
                                <span class="label label-info">{{ $commission_group->type }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.commission-statements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection