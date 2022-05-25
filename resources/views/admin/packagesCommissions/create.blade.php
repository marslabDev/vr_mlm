@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.packagesCommission.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.packages-commissions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tuition_package_efk">{{ trans('cruds.packagesCommission.fields.tuition_package_efk') }}</label>
                <input class="form-control {{ $errors->has('tuition_package_efk') ? 'is-invalid' : '' }}" type="number" name="tuition_package_efk" id="tuition_package_efk" value="{{ old('tuition_package_efk', '') }}" step="1">
                @if($errors->has('tuition_package_efk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tuition_package_efk') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.packagesCommission.fields.tuition_package_efk_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="commission_id">{{ trans('cruds.packagesCommission.fields.commission') }}</label>
                <select class="form-control select2 {{ $errors->has('commission') ? 'is-invalid' : '' }}" name="commission_id" id="commission_id">
                    @foreach($commissions as $id => $entry)
                        <option value="{{ $id }}" {{ old('commission_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('commission'))
                    <div class="invalid-feedback">
                        {{ $errors->first('commission') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.packagesCommission.fields.commission_helper') }}</span>
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