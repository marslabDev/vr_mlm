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
                <label class="required" for="commission">{{ trans('cruds.commission.fields.commission') }}</label>
                <input class="form-control {{ $errors->has('commission') ? 'is-invalid' : '' }}" type="text" name="commission" id="commission" value="{{ old('commission', '') }}" required>
                @if($errors->has('commission'))
                    <div class="invalid-feedback">
                        {{ $errors->first('commission') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commission.fields.commission_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level">{{ trans('cruds.commission.fields.level') }}</label>
                <input class="form-control {{ $errors->has('level') ? 'is-invalid' : '' }}" type="number" name="level" id="level" value="{{ old('level', '0') }}" step="1" required>
                @if($errors->has('level'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commission.fields.level_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.commission.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type">
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Commission::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commission.fields.type_helper') }}</span>
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
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection