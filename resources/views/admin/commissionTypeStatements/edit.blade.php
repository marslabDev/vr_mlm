@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.commissionTypeStatement.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.commission-type-statements.update", [$commissionTypeStatement->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.commissionTypeStatement.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type">
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\CommissionTypeStatement::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', $commissionTypeStatement->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commissionTypeStatement.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sub_total">{{ trans('cruds.commissionTypeStatement.fields.sub_total') }}</label>
                <input class="form-control {{ $errors->has('sub_total') ? 'is-invalid' : '' }}" type="number" name="sub_total" id="sub_total" value="{{ old('sub_total', $commissionTypeStatement->sub_total) }}" step="0.01">
                @if($errors->has('sub_total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sub_total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commissionTypeStatement.fields.sub_total_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="items">{{ trans('cruds.commissionTypeStatement.fields.items') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('items') ? 'is-invalid' : '' }}" name="items[]" id="items" multiple>
                    @foreach($items as $id => $item)
                        <option value="{{ $id }}" {{ (in_array($id, old('items', [])) || $commissionTypeStatement->items->contains($id)) ? 'selected' : '' }}>{{ $item }}</option>
                    @endforeach
                </select>
                @if($errors->has('items'))
                    <div class="invalid-feedback">
                        {{ $errors->first('items') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commissionTypeStatement.fields.items_helper') }}</span>
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