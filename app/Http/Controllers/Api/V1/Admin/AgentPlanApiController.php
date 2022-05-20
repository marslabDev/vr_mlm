<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAgentPlanRequest;
use App\Http\Requests\UpdateAgentPlanRequest;
use App\Http\Resources\Admin\AgentPlanResource;
use App\Models\AgentPlan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgentPlanApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('agent_plan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AgentPlanResource(AgentPlan::with(['roles'])->get());
    }

    public function store(StoreAgentPlanRequest $request)
    {
        $agentPlan = AgentPlan::create($request->all());

        return (new AgentPlanResource($agentPlan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AgentPlan $agentPlan)
    {
        abort_if(Gate::denies('agent_plan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AgentPlanResource($agentPlan->load(['roles']));
    }

    public function update(UpdateAgentPlanRequest $request, AgentPlan $agentPlan)
    {
        $agentPlan->update($request->all());

        return (new AgentPlanResource($agentPlan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AgentPlan $agentPlan)
    {
        abort_if(Gate::denies('agent_plan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agentPlan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
