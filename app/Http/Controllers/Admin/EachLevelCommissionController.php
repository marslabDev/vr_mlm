<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EachLevelCommission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EachLevelCommissionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('each_level_commission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eachLevelCommissions = EachLevelCommission::all();

        return view('admin.eachLevelCommissions.index', compact('eachLevelCommissions'));
    }
}
