<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUnitCommentRequest;
use App\Http\Requests\StoreUnitCommentRequest;
use App\Http\Requests\UpdateUnitCommentRequest;
use App\Models\RealEstateUnit;
use App\Models\UnitComment;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class UnitCommentsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('unit_comment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = UnitComment::with(['user', 'unit'])->select(sprintf('%s.*', (new UnitComment)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'unit_comment_show';
                $editGate      = 'unit_comment_edit';
                $deleteGate    = 'unit_comment_delete';
                $crudRoutePart = 'unit-comments';

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

            $table->addColumn('unit_title', function ($row) {
                return $row->unit ? $row->unit->title : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'unit']);

            return $table->make(true);
        }

        $users             = User::get();
        $real_estate_units = RealEstateUnit::get();

        return view('admin.unitComments.index', compact('users', 'real_estate_units'));
    }

    public function create()
    {
        abort_if(Gate::denies('unit_comment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $units = RealEstateUnit::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.unitComments.create', compact('units', 'users'));
    }

    public function store(StoreUnitCommentRequest $request)
    {
        $unitComment = UnitComment::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $unitComment->id]);
        }

        return redirect()->route('admin.unit-comments.index');
    }

    public function edit(UnitComment $unitComment)
    {
        abort_if(Gate::denies('unit_comment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $units = RealEstateUnit::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $unitComment->load('user', 'unit');

        return view('admin.unitComments.edit', compact('unitComment', 'units', 'users'));
    }

    public function update(UpdateUnitCommentRequest $request, UnitComment $unitComment)
    {
        $unitComment->update($request->all());

        return redirect()->route('admin.unit-comments.index');
    }

    public function show(UnitComment $unitComment)
    {
        abort_if(Gate::denies('unit_comment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unitComment->load('user', 'unit');

        return view('admin.unitComments.show', compact('unitComment'));
    }

    public function destroy(UnitComment $unitComment)
    {
        abort_if(Gate::denies('unit_comment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unitComment->delete();

        return back();
    }

    public function massDestroy(MassDestroyUnitCommentRequest $request)
    {
        $unitComments = UnitComment::find(request('ids'));

        foreach ($unitComments as $unitComment) {
            $unitComment->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('unit_comment_create') && Gate::denies('unit_comment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new UnitComment();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
