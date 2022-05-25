<?php

namespace App\Http\Requests;

use App\Models\PackagesCommission;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePackagesCommissionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('packages_commission_create');
    }

    public function rules()
    {
        return [
            'tuition_package_efk' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
