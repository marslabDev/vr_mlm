<?php

namespace App\Http\Requests;

use App\Models\MlmLevel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMlmLevelRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mlm_level_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:mlm_levels,id',
        ];
    }
}
