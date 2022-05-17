@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.dealerStudent.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.dealer-students.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="tuition_package_efk">{{ trans('cruds.dealerStudent.fields.tuition_package_efk') }}</label>
                <input class="form-control {{ $errors->has('tuition_package_efk') ? 'is-invalid' : '' }}" type="number" name="tuition_package_efk" id="tuition_package_efk" value="{{ old('tuition_package_efk', '') }}" step="1" required>
                @if($errors->has('tuition_package_efk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tuition_package_efk') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dealerStudent.fields.tuition_package_efk_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="student_efk">{{ trans('cruds.dealerStudent.fields.student_efk') }}</label>
                <input class="form-control {{ $errors->has('student_efk') ? 'is-invalid' : '' }}" type="number" name="student_efk" id="student_efk" value="{{ old('student_efk', '') }}" step="1" required>
                @if($errors->has('student_efk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('student_efk') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dealerStudent.fields.student_efk_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="referral_efk">{{ trans('cruds.dealerStudent.fields.referral_efk') }}</label>
                <input class="form-control {{ $errors->has('referral_efk') ? 'is-invalid' : '' }}" type="number" name="referral_efk" id="referral_efk" value="{{ old('referral_efk', '') }}" step="1" required>
                @if($errors->has('referral_efk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('referral_efk') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dealerStudent.fields.referral_efk_helper') }}</span>
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