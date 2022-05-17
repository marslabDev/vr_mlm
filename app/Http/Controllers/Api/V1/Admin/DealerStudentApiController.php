<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\DealerStudentResource;
use App\Models\DealerStudent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DealerStudentApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dealer_student_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DealerStudentResource(DealerStudent::all());
    }
}
