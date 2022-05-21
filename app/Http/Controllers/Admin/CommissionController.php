<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCommissionRequest;
use App\Http\Requests\StoreCommissionRequest;
use App\Http\Requests\UpdateCommissionRequest;
use App\Models\AgentPlan;
use App\Models\Commission;
use App\Models\EachLevelCommission;
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
            $query = Commission::with(['agent_plan', 'commissions'])->select(sprintf('%s.*', (new Commission())->table));
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
                $labels = [];
                foreach ($row->commissions as $commission) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $commission->commission);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'agent_plan', 'commission']);

            return $table->make(true);
        }

        $agent_plans            = AgentPlan::get();
        $each_level_commissions = EachLevelCommission::get();

        return view('admin.commissions.index', compact('agent_plans', 'each_level_commissions'));
    }

    public function create()
    {
        abort_if(Gate::denies('commission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agent_plans = AgentPlan::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $commissions = EachLevelCommission::pluck('commission', 'id');

        return view('admin.commissions.create', compact('agent_plans', 'commissions'));
    }

    public function store(StoreCommissionRequest $request)
    {
        $commission = Commission::create($request->all());
        $commission->commissions()->sync($request->input('commissions', []));

        return redirect()->route('admin.commissions.index');
    }

    public function edit(Commission $commission)
    {
        abort_if(Gate::denies('commission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agent_plans = AgentPlan::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $commissions = EachLevelCommission::pluck('commission', 'id');

        $commission->load('agent_plan', 'commissions');

        return view('admin.commissions.edit', compact('agent_plans', 'commission', 'commissions'));
    }

    public function update(UpdateCommissionRequest $request, Commission $commission)
    {
        $commission->update($request->all());
        $commission->commissions()->sync($request->input('commissions', []));

        return redirect()->route('admin.commissions.index');
    }

    public function show(Commission $commission)
    {
        abort_if(Gate::denies('commission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commission->load('agent_plan', 'commissions');

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
