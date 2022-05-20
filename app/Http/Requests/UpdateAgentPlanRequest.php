<?php

namespace App\Http\Requests;

use App\Models\AgentPlan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAgentPlanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('agent_plan_edit');
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
            'commissionable_level' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
