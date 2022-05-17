<?php

namespace App\Http\Requests;

use App\Models\MlmLevel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMlmLevelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mlm_level_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'current_plan_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
