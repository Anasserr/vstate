<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLikeRequest;
use App\Http\Requests\StoreLikeRequest;
use App\Http\Requests\UpdateLikeRequest;
use App\Models\Like;
use App\Models\RealEstateUnit;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class LikeController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('like_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Like::with(['user', 'unit'])->select(sprintf('%s.*', (new Like)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'like_show';
                $editGate      = 'like_edit';
                $deleteGate    = 'like_delete';
                $crudRoutePart = 'likes';

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

        return view('admin.likes.index', compact('users', 'real_estate_units'));
    }

    public function create()
    {
        abort_if(Gate::denies('like_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $units = RealEstateUnit::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.likes.create', compact('units', 'users'));
    }

    public function store(StoreLikeRequest $request)
    {
        $like = Like::create($request->all());

        return redirect()->route('admin.likes.index');
    }

    public function edit(Like $like)
    {
        abort_if(Gate::denies('like_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $units = RealEstateUnit::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $like->load('user', 'unit');

        return view('admin.likes.edit', compact('like', 'units', 'users'));
    }

    public function update(UpdateLikeRequest $request, Like $like)
    {
        $like->update($request->all());

        return redirect()->route('admin.likes.index');
    }

    public function show(Like $like)
    {
        abort_if(Gate::denies('like_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $like->load('user', 'unit');

        return view('admin.likes.show', compact('like'));
    }

    public function destroy(Like $like)
    {
        abort_if(Gate::denies('like_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $like->delete();

        return back();
    }

    public function massDestroy(MassDestroyLikeRequest $request)
    {
        $likes = Like::find(request('ids'));

        foreach ($likes as $like) {
            $like->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
