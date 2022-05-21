@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.eachLevelCommission.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.each-level-commissions.update", [$eachLevelCommission->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="commission">{{ trans('cruds.eachLevelCommission.fields.commission') }}</label>
                <input class="form-control {{ $errors->has('commission') ? 'is-invalid' : '' }}" type="text" name="commission" id="commission" value="{{ old('commission', $eachLevelCommission->commission) }}" required>
                @if($errors->has('commission'))
                    <div class="invalid-feedback">
                        {{ $errors->first('commission') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.eachLevelCommission.fields.commission_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="level">{{ trans('cruds.eachLevelCommission.fields.level') }}</label>
                <input class="form-control {{ $errors->has('level') ? 'is-invalid' : '' }}" type="number" name="level" id="level" value="{{ old('level', $eachLevelCommission->level) }}" step="1" required>
                @if($errors->has('level'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.eachLevelCommission.fields.level_helper') }}</span>
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