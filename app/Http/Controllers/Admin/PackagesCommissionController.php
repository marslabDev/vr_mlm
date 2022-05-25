<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Models\PackagesCommission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PackagesCommissionController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('packages_commission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PackagesCommission::with(['commission'])->select(sprintf('%s.*', (new PackagesCommission())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'packages_commission_show';
                $editGate = 'packages_commission_edit';
                $deleteGate = 'packages_commission_delete';
                $crudRoutePart = 'packages-commissions';

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
            $table->addColumn('commission_commission', function ($row) {
                return $row->commission ? $row->commission->commission : '';
            });

            $table->editColumn('commission.level', function ($row) {
                return $row->commission ? (is_string($row->commission) ? $row->commission : $row->commission->level) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'commission']);

            return $table->make(true);
        }

        return view('admin.packagesCommissions.index');
    }
}
