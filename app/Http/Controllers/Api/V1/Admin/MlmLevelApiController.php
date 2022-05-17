<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMlmLevelRequest;
use App\Http\Requests\UpdateMlmLevelRequest;
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

    public function store(StoreMlmLevelRequest $request)
    {
        $mlmLevel = MlmLevel::create($request->all());

        return (new MlmLevelResource($mlmLevel))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MlmLevel $mlmLevel)
    {
        abort_if(Gate::denies('mlm_level_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MlmLevelResource($mlmLevel->load(['user', 'current_plan', 'up_line']));
    }

    public function update(UpdateMlmLevelRequest $request, MlmLevel $mlmLevel)
    {
        $mlmLevel->update($request->all());

        return (new MlmLevelResource($mlmLevel))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MlmLevel $mlmLevel)
    {
        abort_if(Gate::denies('mlm_level_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mlmLevel->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
