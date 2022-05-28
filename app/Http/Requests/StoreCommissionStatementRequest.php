<?php

namespace App\Http\Requests;

use App\Models\CommissionStatement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCommissionStatementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('commission_statement_create');
    }

    public function rules()
    {
        return [
            'total' => [
                'required',
            ],
            'commission_groups.*' => [
                'integer',
            ],
            'commission_groups' => [
                'array',
            ],
        ];
    }
}
