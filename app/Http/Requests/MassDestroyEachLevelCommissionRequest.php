<?php

namespace App\Http\Requests;

use App\Models\EachLevelCommission;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEachLevelCommissionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('each_level_commission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:each_level_commissions,id',
        ];
    }
}
