<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyApplicationsRequestSectionRequest;
use App\Http\Requests\StoreApplicationsRequestSectionRequest;
use App\Http\Requests\UpdateApplicationsRequestSectionRequest;
use App\Models\ApplicationsRequestSection;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ApplicationsRequestSectionsController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('applications_request_section_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ApplicationsRequestSection::query()->select(sprintf('%s.*', (new ApplicationsRequestSection)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'applications_request_section_show';
                $editGate      = 'applications_request_section_edit';
                $deleteGate    = 'applications_request_section_delete';
                $crudRoutePart = 'applications-request-sections';

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

        return view('admin.applicationsRequestSections.index');
    }

    public function create()
    {
        abort_if(Gate::denies('applications_request_section_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.applicationsRequestSections.create');
    }

    public function store(StoreApplicationsRequestSectionRequest $request)
    {
        $applicationsRequestSection = ApplicationsRequestSection::create($request->all());

        if ($request->input('image', false)) {
            $applicationsRequestSection->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $applicationsRequestSection->id]);
        }

        return redirect()->route('admin.applications-request-sections.index');
    }

    public function edit(ApplicationsRequestSection $applicationsRequestSection)
    {
        abort_if(Gate::denies('applications_request_section_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.applicationsRequestSections.edit', compact('applicationsRequestSection'));
    }

    public function update(UpdateApplicationsRequestSectionRequest $request, ApplicationsRequestSection $applicationsRequestSection)
    {
        $applicationsRequestSection->update($request->all());

        if ($request->input('image', false)) {
            if (! $applicationsRequestSection->image || $request->input('image') !== $applicationsRequestSection->image->file_name) {
                if ($applicationsRequestSection->image) {
                    $applicationsRequestSection->image->delete();
                }
                $applicationsRequestSection->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($applicationsRequestSection->image) {
            $applicationsRequestSection->image->delete();
        }

        return redirect()->route('admin.applications-request-sections.index');
    }

    public function show(ApplicationsRequestSection $applicationsRequestSection)
    {
        abort_if(Gate::denies('applications_request_section_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.applicationsRequestSections.show', compact('applicationsRequestSection'));
    }

    public function destroy(ApplicationsRequestSection $applicationsRequestSection)
    {
        abort_if(Gate::denies('applications_request_section_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $applicationsRequestSection->delete();

        return back();
    }

    public function massDestroy(MassDestroyApplicationsRequestSectionRequest $request)
    {
        $applicationsRequestSections = ApplicationsRequestSection::find(request('ids'));

        foreach ($applicationsRequestSections as $applicationsRequestSection) {
            $applicationsRequestSection->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('applications_request_section_create') && Gate::denies('applications_request_section_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ApplicationsRequestSection();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
