<?php

namespace App\Http\Requests;

use App\Models\CommissionTypeStatement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCommissionTypeStatementRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('commission_type_statement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:commission_type_statements,id',
        ];
    }
}
