<?php

namespace App\Http\Requests;

use App\Models\AgentStudent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAgentStudentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('agent_student_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:agent_students,id',
        ];
    }
}
