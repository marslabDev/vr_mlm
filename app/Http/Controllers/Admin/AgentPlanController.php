<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAgentPlanRequest;
use App\Http\Requests\StoreAgentPlanRequest;
use App\Http\Requests\UpdateAgentPlanRequest;
use App\Models\AgentPlan;
use App\Models\Role;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AgentPlanController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('agent_plan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AgentPlan::with(['roles'])->select(sprintf('%s.*', (new AgentPlan())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'agent_plan_show';
                $editGate = 'agent_plan_edit';
                $deleteGate = 'agent_plan_delete';
                $crudRoutePart = 'agent-plans';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : '';
            });
            $table->addColumn('roles_title', function ($row) {
                return $row->roles ? $row->roles->title : '';
            });

            $table->editColumn('commissionable_level', function ($row) {
                return $row->commissionable_level ? $row->commissionable_level : '';
            });
            $table->editColumn('refundable', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->refundable ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'roles', 'refundable']);

            return $table->make(true);
        }

        return view('admin.agentPlans.index');
    }

    public function create()
    {
        abort_if(Gate::denies('agent_plan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.agentPlans.create', compact('roles'));
    }

    public function store(StoreAgentPlanRequest $request)
    {
        $agentPlan = AgentPlan::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $agentPlan->id]);
        }

        return redirect()->route('admin.agent-plans.index');
    }

    public function edit(AgentPlan $agentPlan)
    {
        abort_if(Gate::denies('agent_plan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agentPlan->load('roles');

        return view('admin.agentPlans.edit', compact('agentPlan', 'roles'));
    }

    public function update(UpdateAgentPlanRequest $request, AgentPlan $agentPlan)
    {
        $agentPlan->update($request->all());

        return redirect()->route('admin.agent-plans.index');
    }

    public function show(AgentPlan $agentPlan)
    {
        abort_if(Gate::denies('agent_plan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agentPlan->load('roles', 'currentPlanMlmLevels', 'agentPlanCommissions');

        return view('admin.agentPlans.show', compact('agentPlan'));
    }

    public function destroy(AgentPlan $agentPlan)
    {
        abort_if(Gate::denies('agent_plan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agentPlan->delete();

        return back();
    }

    public function massDestroy(MassDestroyAgentPlanRequest $request)
    {
        AgentPlan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('agent_plan_create') && Gate::denies('agent_plan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AgentPlan();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
