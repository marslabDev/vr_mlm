@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.mlmLevel.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.mlm-levels.update", [$mlmLevel->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.mlmLevel.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $mlmLevel->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mlmLevel.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="current_plan_id">{{ trans('cruds.mlmLevel.fields.current_plan') }}</label>
                <select class="form-control select2 {{ $errors->has('current_plan') ? 'is-invalid' : '' }}" name="current_plan_id" id="current_plan_id" required>
                    @foreach($current_plans as $id => $entry)
                        <option value="{{ $id }}" {{ (old('current_plan_id') ? old('current_plan_id') : $mlmLevel->current_plan->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('current_plan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('current_plan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mlmLevel.fields.current_plan_helper') }}</span>
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