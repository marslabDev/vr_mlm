<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Models\CommissionTypeStatement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CommissionTypeStatementController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('commission_type_statement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CommissionTypeStatement::with(['items'])->select(sprintf('%s.*', (new CommissionTypeStatement())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'commission_type_statement_show';
                $editGate = 'commission_type_statement_edit';
                $deleteGate = 'commission_type_statement_delete';
                $crudRoutePart = 'commission-type-statements';

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
            $table->editColumn('type', function ($row) {
                return $row->type ? CommissionTypeStatement::TYPE_SELECT[$row->type] : '';
            });
            $table->editColumn('sub_total', function ($row) {
                return $row->sub_total ? $row->sub_total : '';
            });
            $table->editColumn('items', function ($row) {
                $labels = [];
                foreach ($row->items as $item) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $item->tuition_package_efk);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'items']);

            return $table->make(true);
        }

        return view('admin.commissionTypeStatements.index');
    }
}
