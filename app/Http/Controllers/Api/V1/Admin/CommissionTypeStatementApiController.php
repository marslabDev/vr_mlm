<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CommissionTypeStatementResource;
use App\Models\CommissionTypeStatement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommissionTypeStatementApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('commission_type_statement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CommissionTypeStatementResource(CommissionTypeStatement::with(['items'])->get());
    }
}
