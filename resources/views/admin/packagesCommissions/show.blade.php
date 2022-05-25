@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.packagesCommission.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.packages-commissions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.packagesCommission.fields.id') }}
                        </th>
                        <td>
                            {{ $packagesCommission->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.packagesCommission.fields.tuition_package_efk') }}
                        </th>
                        <td>
                            {{ $packagesCommission->tuition_package_efk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.packagesCommission.fields.commission') }}
                        </th>
                        <td>
                            {{ $packagesCommission->commission->commission ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.packages-commissions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection