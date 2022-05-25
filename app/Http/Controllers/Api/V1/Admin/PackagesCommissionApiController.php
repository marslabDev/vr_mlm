<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\PackagesCommissionResource;
use App\Models\PackagesCommission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PackagesCommissionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('packages_commission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PackagesCommissionResource(PackagesCommission::with(['commission'])->get());
    }
}
