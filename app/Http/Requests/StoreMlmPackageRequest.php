<?php

namespace App\Http\Requests;

use App\Models\MlmPackage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMlmPackageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mlm_package_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'price' => [
                'required',
            ],
        ];
    }
}
