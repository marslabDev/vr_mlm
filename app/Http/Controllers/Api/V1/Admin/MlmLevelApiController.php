<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\MlmLevelResource;
use App\Models\MlmLevel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MlmLevelApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mlm_level_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MlmLevelResource(MlmLevel::with(['user', 'current_plan', 'up_line'])->get());
    }
}
