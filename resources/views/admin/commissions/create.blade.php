@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.commission.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.commissions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="tuition_package_efk">{{ trans('cruds.commission.fields.tuition_package_efk') }}</label>
                <input class="form-control {{ $errors->has('tuition_package_efk') ? 'is-invalid' : '' }}" type="number" name="tuition_package_efk" id="tuition_package_efk" value="{{ old('tuition_package_efk', '') }}" step="1" required>
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
                        <option value="{{ $id }}" {{ old('agent_plan_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                <label class="required" for="commissions">{{ trans('cruds.commission.fields.commission') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('commissions') ? 'is-invalid' : '' }}" name="commissions[]" id="commissions" multiple required>
                    @foreach($commissions as $id => $commission)
                        <option value="{{ $id }}" {{ in_array($id, old('commissions', [])) ? 'selected' : '' }}>{{ $commission }}</option>
                    @endforeach
                </select>
                @if($errors->has('commissions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('commissions') }}
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