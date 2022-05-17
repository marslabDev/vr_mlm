<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyMlmLevelRequest;
use App\Http\Requests\StoreMlmLevelRequest;
use App\Http\Requests\UpdateMlmLevelRequest;
use App\Models\MlmLevel;
use App\Models\MlmPackage;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MlmLevelController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('mlm_level_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MlmLevel::with(['user', 'current_plan', 'up_line'])->select(sprintf('%s.*', (new MlmLevel())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'mlm_level_show';
                $editGate = 'mlm_level_edit';
                $deleteGate = 'mlm_level_delete';
                $crudRoutePart = 'mlm-levels';

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
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->addColumn('current_plan_name', function ($row) {
                return $row->current_plan ? $row->current_plan->name : '';
            });

            $table->editColumn('children_count', function ($row) {
                return $row->children_count ? $row->children_count : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'current_plan']);

            return $table->make(true);
        }

        return view('admin.mlmLevels.index');
    }

    public function create()
    {
        abort_if(Gate::denies('mlm_level_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $current_plans = MlmPackage::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.mlmLevels.create', compact('current_plans', 'users'));
    }

    public function store(StoreMlmLevelRequest $request)
    {
        $mlmLevel = MlmLevel::create($request->all());

        return redirect()->route('admin.mlm-levels.index');
    }

    public function edit(MlmLevel $mlmLevel)
    {
        abort_if(Gate::denies('mlm_level_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $current_plans = MlmPackage::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mlmLevel->load('user', 'current_plan', 'up_line');

        return view('admin.mlmLevels.edit', compact('current_plans', 'mlmLevel', 'users'));
    }

    public function update(UpdateMlmLevelRequest $request, MlmLevel $mlmLevel)
    {
        $mlmLevel->update($request->all());

        return redirect()->route('admin.mlm-levels.index');
    }

    public function show(MlmLevel $mlmLevel)
    {
        abort_if(Gate::denies('mlm_level_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mlmLevel->load('user', 'current_plan', 'up_line');

        return view('admin.mlmLevels.show', compact('mlmLevel'));
    }

    public function destroy(MlmLevel $mlmLevel)
    {
        abort_if(Gate::denies('mlm_level_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mlmLevel->delete();

        return back();
    }

    public function massDestroy(MassDestroyMlmLevelRequest $request)
    {
        MlmLevel::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
