<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Models\AgentStudent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AgentStudentController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('agent_student_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AgentStudent::query()->select(sprintf('%s.*', (new AgentStudent())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'agent_student_show';
                $editGate = 'agent_student_edit';
                $deleteGate = 'agent_student_delete';
                $crudRoutePart = 'agent-students';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('tuition_package_efk', function ($row) {
                return $row->tuition_package_efk ? $row->tuition_package_efk : '';
            });
            $table->editColumn('student_efk', function ($row) {
                return $row->student_efk ? $row->student_efk : '';
            });
            $table->editColumn('referral_efk', function ($row) {
                return $row->referral_efk ? $row->referral_efk : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.agentStudents.index');
    }
}
