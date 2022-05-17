<?php

namespace App\Http\Requests;

use App\Models\MlmLevel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMlmLevelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mlm_level_edit');
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
