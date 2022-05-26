<?php

namespace App\Http\Requests;

use App\Models\AgentStudent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAgentStudentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('agent_student_create');
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
            'student_efk' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'referral_efk' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
