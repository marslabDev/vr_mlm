<?php

namespace App\Http\Requests;

use App\Models\DealerStudent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDealerStudentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dealer_student_create');
    }

    public function rules()
    {
        return [
            'tuition_package_efk' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'student_efk' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'referral_efk' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
