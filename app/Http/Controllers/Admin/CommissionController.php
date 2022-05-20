<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCommissionRequest;
use App\Http\Requests\StoreCommissionRequest;
use App\Http\Requests\UpdateCommissionRequest;
use App\Models\AgentPlan;
use App\Models\Commission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CommissionController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('commission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Commission::with(['agent_plan'])->select(sprintf('%s.*', (new Commission())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'commission_show';
                $editGate = 'commission_edit';
                $deleteGate = 'commission_delete';
                $crudRoutePart = 'commissions';

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
            $table->addColumn('agent_plan_name', function ($row) {
                return $row->agent_plan ? $row->agent_plan->name : '';
            });

            $table->editColumn('commission', function ($row) {
                return $row->commission ? $row->commission : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'agent_plan']);

            return $table->make(true);
        }

        $agent_plans = AgentPlan::get();

        return view('admin.commissions.index', compact('agent_plans'));
    }

    public function create()
    {
        abort_if(Gate::denies('commission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agent_plans = AgentPlan::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.commissions.create', compact('agent_plans'));
    }

    public function store(StoreCommissionRequest $request)
    {
        $commission = Commission::create($request->all());

        return redirect()->route('admin.commissions.index');
    }

    public function edit(Commission $commission)
    {
        abort_if(Gate::denies('commission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agent_plans = AgentPlan::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $commission->load('agent_plan');

        return view('admin.commissions.edit', compact('agent_plans', 'commission'));
    }

    public function update(UpdateCommissionRequest $request, Commission $commission)
    {
        $commission->update($request->all());

        return redirect()->route('admin.commissions.index');
    }

    public function show(Commission $commission)
    {
        abort_if(Gate::denies('commission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commission->load('agent_plan');

        return view('admin.commissions.show', compact('commission'));
    }

    public function destroy(Commission $commission)
    {
        abort_if(Gate::denies('commission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commission->delete();

        return back();
    }

    public function massDestroy(MassDestroyCommissionRequest $request)
    {
        Commission::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
