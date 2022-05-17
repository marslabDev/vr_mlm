<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMlmPackageRequest;
use App\Http\Requests\StoreMlmPackageRequest;
use App\Http\Requests\UpdateMlmPackageRequest;
use App\Models\MlmPackage;
use App\Models\Role;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MlmPackagesController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('mlm_package_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MlmPackage::with(['roles'])->select(sprintf('%s.*', (new MlmPackage())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'mlm_package_show';
                $editGate = 'mlm_package_edit';
                $deleteGate = 'mlm_package_delete';
                $crudRoutePart = 'mlm-packages';

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

            $table->rawColumns(['actions', 'placeholder', 'roles']);

            return $table->make(true);
        }

        return view('admin.mlmPackages.index');
    }

    public function create()
    {
        abort_if(Gate::denies('mlm_package_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.mlmPackages.create', compact('roles'));
    }

    public function store(StoreMlmPackageRequest $request)
    {
        $mlmPackage = MlmPackage::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $mlmPackage->id]);
        }

        return redirect()->route('admin.mlm-packages.index');
    }

    public function edit(MlmPackage $mlmPackage)
    {
        abort_if(Gate::denies('mlm_package_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mlmPackage->load('roles');

        return view('admin.mlmPackages.edit', compact('mlmPackage', 'roles'));
    }

    public function update(UpdateMlmPackageRequest $request, MlmPackage $mlmPackage)
    {
        $mlmPackage->update($request->all());

        return redirect()->route('admin.mlm-packages.index');
    }

    public function show(MlmPackage $mlmPackage)
    {
        abort_if(Gate::denies('mlm_package_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mlmPackage->load('roles', 'currentPlanMlmLevels');

        return view('admin.mlmPackages.show', compact('mlmPackage'));
    }

    public function destroy(MlmPackage $mlmPackage)
    {
        abort_if(Gate::denies('mlm_package_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mlmPackage->delete();

        return back();
    }

    public function massDestroy(MassDestroyMlmPackageRequest $request)
    {
        MlmPackage::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('mlm_package_create') && Gate::denies('mlm_package_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new MlmPackage();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
