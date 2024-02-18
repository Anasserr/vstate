<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRealEstateUnitRequest;
use App\Http\Requests\StoreRealEstateUnitRequest;
use App\Http\Requests\UpdateRealEstateUnitRequest;
use App\Models\Amenity;
use App\Models\City;
use App\Models\Near;
use App\Models\PaymentMethod;
use App\Models\Project;
use App\Models\RealEstateType;
use App\Models\RealEstateUnit;
use App\Models\RealstatePurpose;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RealEstateUnitsController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('real_estate_unit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = RealEstateUnit::with(['project', 'user', 'amenities', 'nears', 'purposes', 'payments', 'types', 'city'])->select(sprintf('%s.*', (new RealEstateUnit)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'real_estate_unit_show';
                $editGate      = 'real_estate_unit_edit';
                $deleteGate    = 'real_estate_unit_delete';
                $crudRoutePart = 'real-estate-units';

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
            $table->editColumn('status', function ($row) {
                return $row->status ? RealEstateUnit::STATUS_SELECT[$row->status] : '';
            });
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : '';
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
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('featured', function ($row) {
                return $row->featured ? RealEstateUnit::FEATURED_RADIO[$row->featured] : '';
            });
            $table->editColumn('premium', function ($row) {
                return $row->premium ? RealEstateUnit::PREMIUM_RADIO[$row->premium] : '';
            });
            $table->editColumn('images_360', function ($row) {
                if (! $row->images_360) {
                    return '';
                }
                $links = [];
                foreach ($row->images_360 as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>';
                }

                return implode(', ', $links);
            });
            $table->editColumn('notes', function ($row) {
                return $row->notes ? $row->notes : '';
            });
            $table->editColumn('near', function ($row) {
                $labels = [];
                foreach ($row->nears as $near) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $near->title);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('purpose', function ($row) {
                $labels = [];
                foreach ($row->purposes as $purpose) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $purpose->title);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('payment', function ($row) {
                $labels = [];
                foreach ($row->payments as $payment) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $payment->title);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('type', function ($row) {
                $labels = [];
                foreach ($row->types as $type) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $type->title);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('ror', function ($row) {
                return $row->ror ? $row->ror : '';
            });
            $table->editColumn('roi', function ($row) {
                return $row->roi ? $row->roi : '';
            });
            $table->addColumn('city_title_ar', function ($row) {
                return $row->city ? $row->city->title_ar : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'image', 'user', 'images_360', 'near', 'purpose', 'payment', 'type', 'city']);

            return $table->make(true);
        }

        return view('admin.realEstateUnits.index');
    }

    public function create()
    {
        abort_if(Gate::denies('real_estate_unit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $amenities = Amenity::pluck('title', 'id');

        $nears = Near::pluck('title', 'id');

        $purposes = RealstatePurpose::pluck('title', 'id');

        $payments = PaymentMethod::pluck('title', 'id');

        $types = RealEstateType::pluck('title', 'id');

        $cities = City::pluck('title_ar', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.realEstateUnits.create', compact('amenities', 'cities', 'nears', 'payments', 'projects', 'purposes', 'types', 'users'));
    }

    public function store(StoreRealEstateUnitRequest $request)
    {
        $realEstateUnit = RealEstateUnit::create($request->all());
        $realEstateUnit->amenities()->sync($request->input('amenities', []));
        $realEstateUnit->nears()->sync($request->input('nears', []));
        $realEstateUnit->purposes()->sync($request->input('purposes', []));
        $realEstateUnit->payments()->sync($request->input('payments', []));
        $realEstateUnit->types()->sync($request->input('types', []));
        if ($request->input('image', false)) {
            $realEstateUnit->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        foreach ($request->input('images', []) as $file) {
            $realEstateUnit->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
        }

        foreach ($request->input('plans', []) as $file) {
            $realEstateUnit->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('plans');
        }

        if ($request->input('image_360', false)) {
            $realEstateUnit->addMedia(storage_path('tmp/uploads/' . basename($request->input('image_360'))))->toMediaCollection('image_360');
        }

        foreach ($request->input('images_360', []) as $file) {
            $realEstateUnit->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images_360');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $realEstateUnit->id]);
        }

        return redirect()->route('admin.real-estate-units.index');
    }

    public function edit(RealEstateUnit $realEstateUnit)
    {
        abort_if(Gate::denies('real_estate_unit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $amenities = Amenity::pluck('title', 'id');

        $nears = Near::pluck('title', 'id');

        $purposes = RealstatePurpose::pluck('title', 'id');

        $payments = PaymentMethod::pluck('title', 'id');

        $types = RealEstateType::pluck('title', 'id');

        $cities = City::pluck('title_ar', 'id')->prepend(trans('global.pleaseSelect'), '');

        $realEstateUnit->load('project', 'user', 'amenities', 'nears', 'purposes', 'payments', 'types', 'city');

        return view('admin.realEstateUnits.edit', compact('amenities', 'cities', 'nears', 'payments', 'projects', 'purposes', 'realEstateUnit', 'types', 'users'));
    }

    public function update(UpdateRealEstateUnitRequest $request, RealEstateUnit $realEstateUnit)
    {
        $realEstateUnit->update($request->all());
        $realEstateUnit->amenities()->sync($request->input('amenities', []));
        $realEstateUnit->nears()->sync($request->input('nears', []));
        $realEstateUnit->purposes()->sync($request->input('purposes', []));
        $realEstateUnit->payments()->sync($request->input('payments', []));
        $realEstateUnit->types()->sync($request->input('types', []));
        if ($request->input('image', false)) {
            if (! $realEstateUnit->image || $request->input('image') !== $realEstateUnit->image->file_name) {
                if ($realEstateUnit->image) {
                    $realEstateUnit->image->delete();
                }
                $realEstateUnit->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($realEstateUnit->image) {
            $realEstateUnit->image->delete();
        }

        if (count($realEstateUnit->images) > 0) {
            foreach ($realEstateUnit->images as $media) {
                if (! in_array($media->file_name, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $realEstateUnit->images->pluck('file_name')->toArray();
        foreach ($request->input('images', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $realEstateUnit->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
            }
        }

        if (count($realEstateUnit->plans) > 0) {
            foreach ($realEstateUnit->plans as $media) {
                if (! in_array($media->file_name, $request->input('plans', []))) {
                    $media->delete();
                }
            }
        }
        $media = $realEstateUnit->plans->pluck('file_name')->toArray();
        foreach ($request->input('plans', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $realEstateUnit->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('plans');
            }
        }

        if ($request->input('image_360', false)) {
            if (! $realEstateUnit->image_360 || $request->input('image_360') !== $realEstateUnit->image_360->file_name) {
                if ($realEstateUnit->image_360) {
                    $realEstateUnit->image_360->delete();
                }
                $realEstateUnit->addMedia(storage_path('tmp/uploads/' . basename($request->input('image_360'))))->toMediaCollection('image_360');
            }
        } elseif ($realEstateUnit->image_360) {
            $realEstateUnit->image_360->delete();
        }

        if (count($realEstateUnit->images_360) > 0) {
            foreach ($realEstateUnit->images_360 as $media) {
                if (! in_array($media->file_name, $request->input('images_360', []))) {
                    $media->delete();
                }
            }
        }
        $media = $realEstateUnit->images_360->pluck('file_name')->toArray();
        foreach ($request->input('images_360', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $realEstateUnit->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images_360');
            }
        }

        return redirect()->route('admin.real-estate-units.index');
    }

    public function show(RealEstateUnit $realEstateUnit)
    {
        abort_if(Gate::denies('real_estate_unit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $realEstateUnit->load('project', 'user', 'amenities', 'nears', 'purposes', 'payments', 'types', 'city', 'unitBookMeetings', 'unitLikes', 'unitUnitComments');

        return view('admin.realEstateUnits.show', compact('realEstateUnit'));
    }

    public function destroy(RealEstateUnit $realEstateUnit)
    {
        abort_if(Gate::denies('real_estate_unit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $realEstateUnit->delete();

        return back();
    }

    public function massDestroy(MassDestroyRealEstateUnitRequest $request)
    {
        $realEstateUnits = RealEstateUnit::find(request('ids'));

        foreach ($realEstateUnits as $realEstateUnit) {
            $realEstateUnit->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('real_estate_unit_create') && Gate::denies('real_estate_unit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new RealEstateUnit();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
