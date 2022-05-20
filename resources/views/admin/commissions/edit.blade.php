@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.commission.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.commissions.update", [$commission->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="tuition_package_efk">{{ trans('cruds.commission.fields.tuition_package_efk') }}</label>
                <input class="form-control {{ $errors->has('tuition_package_efk') ? 'is-invalid' : '' }}" type="number" name="tuition_package_efk" id="tuition_package_efk" value="{{ old('tuition_package_efk', $commission->tuition_package_efk) }}" step="1" required>
                @if($errors->has('tuition_package_efk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tuition_package_efk') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commission.fields.tuition_package_efk_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="agent_plan_id">{{ trans('cruds.commission.fields.agent_plan') }}</label>
                <select class="form-control select2 {{ $errors->has('agent_plan') ? 'is-invalid' : '' }}" name="agent_plan_id" id="agent_plan_id">
                    @foreach($agent_plans as $id => $entry)
                        <option value="{{ $id }}" {{ (old('agent_plan_id') ? old('agent_plan_id') : $commission->agent_plan->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('agent_plan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('agent_plan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commission.fields.agent_plan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="commission">{{ trans('cruds.commission.fields.commission') }}</label>
                <input class="form-control {{ $errors->has('commission') ? 'is-invalid' : '' }}" type="number" name="commission" id="commission" value="{{ old('commission', $commission->commission) }}" step="0.01">
                @if($errors->has('commission'))
                    <div class="invalid-feedback">
                        {{ $errors->first('commission') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commission.fields.commission_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection