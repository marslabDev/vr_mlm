<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CommissionStatementResource;
use App\Models\CommissionStatement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommissionStatementApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('commission_statement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CommissionStatementResource(CommissionStatement::with(['agent', 'commission_groups'])->get());
    }
}
