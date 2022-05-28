<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Models\CommissionStatement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CommissionStatementController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('commission_statement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CommissionStatement::with(['agent', 'commission_groups'])->select(sprintf('%s.*', (new CommissionStatement())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'commission_statement_show';
                $editGate = 'commission_statement_edit';
                $deleteGate = 'commission_statement_delete';
                $crudRoutePart = 'commission-statements';

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
            $table->addColumn('agent_name', function ($row) {
                return $row->agent ? $row->agent->name : '';
            });

            $table->editColumn('agent.email', function ($row) {
                return $row->agent ? (is_string($row->agent) ? $row->agent : $row->agent->email) : '';
            });
            $table->editColumn('total', function ($row) {
                return $row->total ? $row->total : '';
            });
            $table->editColumn('commission_group', function ($row) {
                $labels = [];
                foreach ($row->commission_groups as $commission_group) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $commission_group->type);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'agent', 'commission_group']);

            return $table->make(true);
        }

        return view('admin.commissionStatements.index');
    }
}
