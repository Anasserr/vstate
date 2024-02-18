<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyRealEstateApplicationRequest;
use App\Http\Requests\StoreRealEstateApplicationRequest;
use App\Http\Requests\UpdateRealEstateApplicationRequest;
use App\Models\AvailableForMortgage;
use App\Models\FinishType;
use App\Models\PaymentMethod;
use App\Models\RealEstateApplication;
use App\Models\RealEstateType;
use App\Models\User;
use App\Models\View;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RealEstateApplicationsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('real_estate_application_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = RealEstateApplication::with(['user', 'listings_available_for_mortgages', 'payment_methods', 'types', 'views', 'finish_types'])->select(sprintf('%s.*', (new RealEstateApplication)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'real_estate_application_show';
                $editGate      = 'real_estate_application_edit';
                $deleteGate    = 'real_estate_application_delete';
                $crudRoutePart = 'real-estate-applications';

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
            $table->editColumn('addresse', function ($row) {
                return $row->addresse ? $row->addresse : '';
            });
            $table->editColumn('location', function ($row) {
                return $row->location ? $row->location : '';
            });
            $table->editColumn('max_price', function ($row) {
                return $row->max_price ? $row->max_price : '';
            });
            $table->editColumn('min_price', function ($row) {
                return $row->min_price ? $row->min_price : '';
            });
            $table->editColumn('deliver_year', function ($row) {
                return $row->deliver_year ? $row->deliver_year : '';
            });
            $table->editColumn('number_of_rooms', function ($row) {
                return $row->number_of_rooms ? $row->number_of_rooms : '';
            });
            $table->editColumn('floor', function ($row) {
                return $row->floor ? $row->floor : '';
            });
            $table->editColumn('user_name', function ($row) {
                return $row->user_name ? $row->user_name : '';
            });
            $table->editColumn('user_phone', function ($row) {
                return $row->user_phone ? $row->user_phone : '';
            });
            $table->editColumn('notes', function ($row) {
                return $row->notes ? $row->notes : '';
            });
            $table->editColumn('time_of_call', function ($row) {
                return $row->time_of_call ? $row->time_of_call : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('listings_available_for_mortgage', function ($row) {
                $labels = [];
                foreach ($row->listings_available_for_mortgages as $listings_available_for_mortgage) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $listings_available_for_mortgage->title);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('purpose_of_request', function ($row) {
                return $row->purpose_of_request ? RealEstateApplication::PURPOSE_OF_REQUEST_SELECT[$row->purpose_of_request] : '';
            });
            $table->editColumn('payment_method', function ($row) {
                $labels = [];
                foreach ($row->payment_methods as $payment_method) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $payment_method->title);
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
            $table->editColumn('view', function ($row) {
                $labels = [];
                foreach ($row->views as $view) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $view->title);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('finish_type', function ($row) {
                $labels = [];
                foreach ($row->finish_types as $finish_type) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $finish_type->title);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('min_area', function ($row) {
                return $row->min_area ? $row->min_area : '';
            });
            $table->editColumn('max_area', function ($row) {
                return $row->max_area ? $row->max_area : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'listings_available_for_mortgage', 'payment_method', 'type', 'view', 'finish_type']);

            return $table->make(true);
        }

        return view('admin.realEstateApplications.index');
    }

    public function create()
    {
        abort_if(Gate::denies('real_estate_application_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $listings_available_for_mortgages = AvailableForMortgage::pluck('title', 'id');

        $payment_methods = PaymentMethod::pluck('title', 'id');

        $types = RealEstateType::pluck('title', 'id');

        $views = View::pluck('title', 'id');

        $finish_types = FinishType::pluck('title', 'id');

        return view('admin.realEstateApplications.create', compact('finish_types', 'listings_available_for_mortgages', 'payment_methods', 'types', 'users', 'views'));
    }

    public function store(StoreRealEstateApplicationRequest $request)
    {
        $realEstateApplication = RealEstateApplication::create($request->all());
        $realEstateApplication->listings_available_for_mortgages()->sync($request->input('listings_available_for_mortgages', []));
        $realEstateApplication->payment_methods()->sync($request->input('payment_methods', []));
        $realEstateApplication->types()->sync($request->input('types', []));
        $realEstateApplication->views()->sync($request->input('views', []));
        $realEstateApplication->finish_types()->sync($request->input('finish_types', []));

        return redirect()->route('admin.real-estate-applications.index');
    }

    public function edit(RealEstateApplication $realEstateApplication)
    {
        abort_if(Gate::denies('real_estate_application_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $listings_available_for_mortgages = AvailableForMortgage::pluck('title', 'id');

        $payment_methods = PaymentMethod::pluck('title', 'id');

        $types = RealEstateType::pluck('title', 'id');

        $views = View::pluck('title', 'id');

        $finish_types = FinishType::pluck('title', 'id');

        $realEstateApplication->load('user', 'listings_available_for_mortgages', 'payment_methods', 'types', 'views', 'finish_types');

        return view('admin.realEstateApplications.edit', compact('finish_types', 'listings_available_for_mortgages', 'payment_methods', 'realEstateApplication', 'types', 'users', 'views'));
    }

    public function update(UpdateRealEstateApplicationRequest $request, RealEstateApplication $realEstateApplication)
    {
        $realEstateApplication->update($request->all());
        $realEstateApplication->listings_available_for_mortgages()->sync($request->input('listings_available_for_mortgages', []));
        $realEstateApplication->payment_methods()->sync($request->input('payment_methods', []));
        $realEstateApplication->types()->sync($request->input('types', []));
        $realEstateApplication->views()->sync($request->input('views', []));
        $realEstateApplication->finish_types()->sync($request->input('finish_types', []));

        return redirect()->route('admin.real-estate-applications.index');
    }

    public function show(RealEstateApplication $realEstateApplication)
    {
        abort_if(Gate::denies('real_estate_application_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $realEstateApplication->load('user', 'listings_available_for_mortgages', 'payment_methods', 'types', 'views', 'finish_types');

        return view('admin.realEstateApplications.show', compact('realEstateApplication'));
    }

    public function destroy(RealEstateApplication $realEstateApplication)
    {
        abort_if(Gate::denies('real_estate_application_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $realEstateApplication->delete();

        return back();
    }

    public function massDestroy(MassDestroyRealEstateApplicationRequest $request)
    {
        $realEstateApplications = RealEstateApplication::find(request('ids'));

        foreach ($realEstateApplications as $realEstateApplication) {
            $realEstateApplication->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
