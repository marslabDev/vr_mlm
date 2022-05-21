<?php

namespace App\Http\Requests;

use App\Models\EachLevelCommission;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEachLevelCommissionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('each_level_commission_edit');
    }

    public function rules()
    {
        return [
            'commission' => [
                'string',
                'required',
            ],
            'level' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
