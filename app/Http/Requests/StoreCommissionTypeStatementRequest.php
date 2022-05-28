<?php

namespace App\Http\Requests;

use App\Models\CommissionTypeStatement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCommissionTypeStatementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('commission_type_statement_create');
    }

    public function rules()
    {
        return [
            'items.*' => [
                'integer',
            ],
            'items' => [
                'array',
            ],
        ];
    }
}
