<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreMlmPackageRequest;
use App\Http\Requests\UpdateMlmPackageRequest;
use App\Http\Resources\Admin\MlmPackageResource;
use App\Models\MlmPackage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MlmPackagesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('mlm_package_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MlmPackageResource(MlmPackage::with(['roles'])->get());
    }

    public function store(StoreMlmPackageRequest $request)
    {
        $mlmPackage = MlmPackage::create($request->all());

        return (new MlmPackageResource($mlmPackage))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MlmPackage $mlmPackage)
    {
        abort_if(Gate::denies('mlm_package_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MlmPackageResource($mlmPackage->load(['roles']));
    }

    public function update(UpdateMlmPackageRequest $request, MlmPackage $mlmPackage)
    {
        $mlmPackage->update($request->all());

        return (new MlmPackageResource($mlmPackage))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MlmPackage $mlmPackage)
    {
        abort_if(Gate::denies('mlm_package_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mlmPackage->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
