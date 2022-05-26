<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AgentStudentResource;
use App\Models\AgentStudent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgentStudentApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('agent_student_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AgentStudentResource(AgentStudent::all());
    }
}
