<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyViewRequest;
use App\Http\Requests\StoreViewRequest;
use App\Http\Requests\UpdateViewRequest;
use App\Models\View;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ViewController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('view_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = View::query()->select(sprintf('%s.*', (new View)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'view_show';
                $editGate      = 'view_edit';
                $deleteGate    = 'view_delete';
                $crudRoutePart = 'views';

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
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('active', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->active ? 'checked' : null) . '>';
            });
            $table->editColumn('image', function ($row) {
                if ($photo = $row->image) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'active', 'image']);

            return $table->make(true);
        }

        return view('admin.views.index');
    }

    public function create()
    {
        abort_if(Gate::denies('view_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.views.create');
    }

    public function store(StoreViewRequest $request)
    {
        $view = View::create($request->all());

        if ($request->input('image', false)) {
            $view->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $view->id]);
        }

        return redirect()->route('admin.views.index');
    }

    public function edit(View $view)
    {
        abort_if(Gate::denies('view_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.views.edit', compact('view'));
    }

    public function update(UpdateViewRequest $request, View $view)
    {
        $view->update($request->all());

        if ($request->input('image', false)) {
            if (! $view->image || $request->input('image') !== $view->image->file_name) {
                if ($view->image) {
                    $view->image->delete();
                }
                $view->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($view->image) {
            $view->image->delete();
        }

        return redirect()->route('admin.views.index');
    }

    public function show(View $view)
    {
        abort_if(Gate::denies('view_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $view->load('viewRealEstateApplications');

        return view('admin.views.show', compact('view'));
    }

    public function destroy(View $view)
    {
        abort_if(Gate::denies('view_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $view->delete();

        return back();
    }

    public function massDestroy(MassDestroyViewRequest $request)
    {
        $views = View::find(request('ids'));

        foreach ($views as $view) {
            $view->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('view_create') && Gate::denies('view_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new View();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
