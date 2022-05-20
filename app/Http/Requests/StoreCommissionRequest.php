<?php

namespace App\Http\Requests;

use App\Models\Commission;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCommissionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('commission_create');
    }

    public function rules()
    {
        return [
            'tuition_package_efk' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'commission' => [
                'numeric',
            ],
        ];
    }
}