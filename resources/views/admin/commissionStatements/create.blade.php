@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.commissionStatement.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.commission-statements.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="agent_id">{{ trans('cruds.commissionStatement.fields.agent') }}</label>
                <select class="form-control select2 {{ $errors->has('agent') ? 'is-invalid' : '' }}" name="agent_id" id="agent_id">
                    @foreach($agents as $id => $entry)
                        <option value="{{ $id }}" {{ old('agent_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commissionStatement.fields.agent_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total">{{ trans('cruds.commissionStatement.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', '0') }}" step="0.01" required>
                @if($errors->has('total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commissionStatement.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="commission_groups">{{ trans('cruds.commissionStatement.fields.commission_group') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('commission_groups') ? 'is-invalid' : '' }}" name="commission_groups[]" id="commission_groups" multiple>
                    @foreach($commission_groups as $id => $commission_group)
                        <option value="{{ $id }}" {{ in_array($id, old('commission_groups', [])) ? 'selected' : '' }}>{{ $commission_group }}</option>
                    @endforeach
                </select>
                @if($errors->has('commission_groups'))
                    <div class="invalid-feedback">
                        {{ $errors->first('commission_groups') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commissionStatement.fields.commission_group_helper') }}</span>
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