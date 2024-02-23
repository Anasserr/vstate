<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('admin.home') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg width="32" height="22" viewBox="0 0 32 22" fill="none"
                    xmlns="http://www.w3.org/2000/svg')}}">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                        fill="#7367F0" />
                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                        fill="#7367F0" />
                </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bold"> {{ trans('panel.site_title') }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">


        <!---

      <li class="menu-item active open">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div data-i18n="Dashboards"> {{ trans('global.dashboard') }}</div>
            <div class="badge bg-primary rounded-pill ms-auto">5</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item active">
                <a href="index.html" class="menu-link">
                    <div data-i18n="Analytics">Analytics</div>
                </a>
            </li>
        </ul>
    </li>

        <li class="menu-item">
            <a href="https://demos.pixinvent.com/vuexy-html-admin-template/documentation/" target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons ti ti-file-description"></i>
                <div data-i18n="Documentation">Documentation</div>
            </a>
        </li>  --->







        @can('user_management_access')
            <li class="menu-item active open">

            <li
                class="menu-item   {{ request()->is('admin/permissions*') ? 'active open' : '' }} {{ request()->is('admin/roles*') ? 'active open' : '' }} {{ request()->is('admin/users*') ? 'active open' : '' }} {{ request()->is('admin/audit-logs*') ? 'active open' : '' }} {{ request()->is('admin/company-services*') ? 'active open' : '' }}">
                <a class="menu-link menu-toggle {{ request()->is('admin/permissions*') ? 'active' : '' }} {{ request()->is('admin/roles*') ? 'active' : '' }} {{ request()->is('admin/users*') ? 'active' : '' }} {{ request()->is('admin/audit-logs*') ? 'active' : '' }} {{ request()->is('admin/company-services*') ? 'active' : '' }}"
                    href="#">
                    <i class="  menu-icon fas fa-users">

                    </i>
                    <div data-i18n=" {{ trans('cruds.userManagement.title') }}">
                        {{ trans('cruds.userManagement.title') }}
                    </div>
                </a>


                <ul class="menu-sub">
                    @can('permission_access')
                        <li
                            class="menu-item  {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.permissions.index') }}"
                                class="menu-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-unlock-alt">

                                </i>
                                <div data-i18n="   {{ trans('cruds.permission.title') }} ">
                                    {{ trans('cruds.permission.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li
                            class="menu-item  {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.roles.index') }}"
                                class="menu-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                <i class="  menu-icon fas fa-briefcase">

                                </i>
                                <div data-i18n="  {{ trans('cruds.role.title') }}">
                                    {{ trans('cruds.role.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li
                            class="menu-item  {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.users.index') }}"
                                class="menu-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                <i class=" menu-icon fas fa-user">

                                </i>
                                <div data-i18n="   {{ trans('cruds.user.title') }} ">
                                    {{ trans('cruds.user.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li
                            class="menu-item  {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.audit-logs.index') }}"
                                class="menu-link {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-file-alt">

                                </i>
                                <div data-i18n="    {{ trans('cruds.auditLog.title') }} ">
                                    {{ trans('cruds.auditLog.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('company_service_access')
                        <li
                            class="menu-item  {{ request()->is('admin/company-services') || request()->is('admin/company-services/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.company-services.index') }}"
                                class="menu-link {{ request()->is('admin/company-services') || request()->is('admin/company-services/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-volume-up">

                                </i>
                                <div data-i18n="   {{ trans('cruds.companyService.title') }} ">
                                    {{ trans('cruds.companyService.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('port_info_access')
            <li
                class="menu-item {{ request()->is('admin/ports*') ? 'active open' : '' }} {{ request()->is('admin/port-types*') ? 'active open' : '' }}">
                <a class="menu-link menu-toggle {{ request()->is('admin/ports*') ? 'active' : '' }} {{ request()->is('admin/port-types*') ? 'active' : '' }}"
                    href="#">
                    <i class="menu-icon tf-icons fas fa-cogs">

                    </i>
                    <div data-i18n="   {{ trans('cruds.portInfo.title') }} ">
                        {{ trans('cruds.portInfo.title') }}

                    </div>
                </a>
                <ul class="menu-sub">
                    @can('port_access')
                        <li
                            class="menu-item  {{ request()->is('admin/ports') || request()->is('admin/ports/*') ? 'active' : '' }} ">
                            <a href="{{ route('admin.ports.index') }}"
                                class="menu-link {{ request()->is('admin/ports') || request()->is('admin/ports/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fab fa-docker">

                                </i>
                                <div data-i18n="  {{ trans('cruds.port.title') }} ">
                                    {{ trans('cruds.port.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('port_type_access')
                        <li
                            class="menu-item  {{ request()->is('admin/port-types') || request()->is('admin/port-types/*') ? 'active' : '' }} ">
                            <a href="{{ route('admin.port-types.index') }}"
                                class="menu-link {{ request()->is('admin/port-types') || request()->is('admin/port-types/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-adjust">

                                </i>
                                <div data-i18n="   {{ trans('cruds.portType.title') }} ">
                                    {{ trans('cruds.portType.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('products_info_access')
            <li
                class="menu-item {{ request()->is('admin/products*') ? 'active open' : '' }} {{ request()->is('admin/product-types*') ? 'active open' : '' }} {{ request()->is('admin/product-imo-classes*') ? 'active open' : '' }}">
                <a class="menu-link menu-toggle {{ request()->is('admin/products*') ? 'active' : '' }} {{ request()->is('admin/product-types*') ? 'active' : '' }} {{ request()->is('admin/product-imo-classes*') ? 'active' : '' }}"
                    href="#">
                    <i class="menu-icon tf-icons fas fa-align-left">

                    </i>
                    <div data-i18n="   {{ trans('cruds.productsInfo.title') }}">
                        {{ trans('cruds.productsInfo.title') }}

                    </div>
                </a>
                <ul class="menu-sub">
                    @can('product_access')
                        <li
                            class="menu-item {{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }} ">
                            <a href="{{ route('admin.products.index') }}"
                                class="menu-link {{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-award">

                                </i>
                                <div data-i18n="   {{ trans('cruds.product.title') }} ">
                                    {{ trans('cruds.product.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('product_type_access')
                        <li
                            class="menu-item {{ request()->is('admin/product-types') || request()->is('admin/product-types/*') ? 'active' : '' }}  ">
                            <a href="{{ route('admin.product-types.index') }}"
                                class="menu-link {{ request()->is('admin/product-types') || request()->is('admin/product-types/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-angle-double-right">

                                </i>
                                <div data-i18n="   {{ trans('cruds.productType.title') }}">
                                    {{ trans('cruds.productType.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('product_imo_class_access')
                        <li
                            class="menu-item  {{ request()->is('admin/product-imo-classes') || request()->is('admin/product-imo-classes/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.product-imo-classes.index') }}"
                                class="menu-link {{ request()->is('admin/product-imo-classes') || request()->is('admin/product-imo-classes/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fab fa-accusoft">

                                </i>
                                <div data-i18n="   {{ trans('cruds.productImoClass.title') }} ">
                                    {{ trans('cruds.productImoClass.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('requests_info_access')
            <li
                class="menu-item {{ request()->is('admin/booking-requests*') ? 'active open' : '' }} {{ request()->is('admin/offers*') ? 'active open' : '' }} {{ request()->is('admin/request-statuses*') ? 'active open' : '' }} {{ request()->is('admin/request-services*') ? 'active open' : '' }} {{ request()->is('admin/requester-user-informations*') ? 'active open' : '' }} {{ request()->is('admin/requester-user-types*') ? 'active open' : '' }}">
                <a class="menu-link menu-toggle {{ request()->is('admin/booking-requests*') ? 'active' : '' }} {{ request()->is('admin/offers*') ? 'active' : '' }} {{ request()->is('admin/request-statuses*') ? 'active' : '' }} {{ request()->is('admin/request-services*') ? 'active' : '' }} {{ request()->is('admin/requester-user-informations*') ? 'active' : '' }} {{ request()->is('admin/requester-user-types*') ? 'active' : '' }}"
                    href="#">
                    <i class="menu-icon tf-icons fas fa-anchor">

                    </i>
                    <div data-i18n="   {{ trans('cruds.requestsInfo.title') }}">
                        {{ trans('cruds.requestsInfo.title') }}

                    </div>
                </a>
                <ul class="menu-sub">
                    @can('booking_request_access')
                        <li
                            class="menu-item  {{ request()->is('admin/booking-requests') || request()->is('admin/booking-requests/*') ? 'active' : '' }} ">
                            <a href="{{ route('admin.booking-requests.index') }}"
                                class="menu-link {{ request()->is('admin/booking-requests') || request()->is('admin/booking-requests/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fab fa-bitbucket">

                                </i>
                                <div data-i18n="  {{ trans('cruds.bookingRequest.title') }} ">
                                    {{ trans('cruds.bookingRequest.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('offer_access')
                        <li
                            class="menu-item  {{ request()->is('admin/offers') || request()->is('admin/offers/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.offers.index') }}"
                                class="menu-link {{ request()->is('admin/offers') || request()->is('admin/offers/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-allergies">

                                </i>
                                <div data-i18n="  {{ trans('cruds.offer.title') }} ">
                                    {{ trans('cruds.offer.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('request_status_access')
                        <li
                            class="menu-item  {{ request()->is('admin/request-statuses') || request()->is('admin/request-statuses/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.request-statuses.index') }}"
                                class="menu-link {{ request()->is('admin/request-statuses') || request()->is('admin/request-statuses/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-anchor">

                                </i>
                                <div data-i18n="   {{ trans('cruds.requestStatus.title') }}">
                                    {{ trans('cruds.requestStatus.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('request_service_access')
                        <li
                            class="menu-item  {{ request()->is('admin/request-services') || request()->is('admin/request-services/*') ? 'active' : '' }} ">
                            <a href="{{ route('admin.request-services.index') }}"
                                class="menu-link {{ request()->is('admin/request-services') || request()->is('admin/request-services/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-cogs">

                                </i>
                                <div data-i18n="  {{ trans('cruds.requestService.title') }} ">
                                    {{ trans('cruds.requestService.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('requester_user_information_access')
                        <li
                            class="menu-item  {{ request()->is('admin/requester-user-informations') || request()->is('admin/requester-user-informations/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.requester-user-informations.index') }}"
                                class="menu-link {{ request()->is('admin/requester-user-informations') || request()->is('admin/requester-user-informations/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-cogs">

                                </i>
                                <div data-i18n="  {{ trans('cruds.requesterUserInformation.title') }} ">
                                    {{ trans('cruds.requesterUserInformation.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('requester_user_type_access')
                        <li
                            class="menu-item   {{ request()->is('admin/requester-user-types') || request()->is('admin/requester-user-types/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.requester-user-types.index') }}"
                                class="menu-link {{ request()->is('admin/requester-user-types') || request()->is('admin/requester-user-types/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-adjust">

                                </i>
                                <div data-i18n="  {{ trans('cruds.requesterUserType.title') }}">
                                    {{ trans('cruds.requesterUserType.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('bookings_info_access')
            <li
                class="menu-item {{ request()->is('admin/booking-statuses*') ? 'active open' : '' }} {{ request()->is('admin/bookings*') ? 'active open' : '' }} {{ request()->is('admin/requester-type-informations*') ? 'active open' : '' }}">
                <a class="menu-link menu-toggle {{ request()->is('admin/booking-statuses*') ? 'active' : '' }} {{ request()->is('admin/bookings*') ? 'active' : '' }} {{ request()->is('admin/requester-type-informations*') ? 'active' : '' }}"
                    href="#">
                    <i class="menu-icon tf-icons fab fa-500px">

                    </i>
                    <div data-i18n="    {{ trans('cruds.bookingsInfo.title') }} ">
                        {{ trans('cruds.bookingsInfo.title') }}

                    </div>
                </a>
                <ul class="menu-sub">
                    @can('booking_status_access')
                        <li
                            class="menu-item  {{ request()->is('admin/booking-statuses') || request()->is('admin/booking-statuses/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.booking-statuses.index') }}"
                                class="menu-link {{ request()->is('admin/booking-statuses') || request()->is('admin/booking-statuses/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-anchor">

                                </i>
                                <div data-i18n="  {{ trans('cruds.bookingStatus.title') }} ">
                                    {{ trans('cruds.bookingStatus.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('booking_access')
                        <li
                            class="menu-item  {{ request()->is('admin/bookings') || request()->is('admin/bookings/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.bookings.index') }}"
                                class="menu-link {{ request()->is('admin/bookings') || request()->is('admin/bookings/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fab fa-bitbucket">

                                </i>
                                <div data-i18n="    {{ trans('cruds.booking.title') }} ">
                                    {{ trans('cruds.booking.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('requester_type_information_access')
                        <li
                            class="menu-item  {{ request()->is('admin/requester-type-informations') || request()->is('admin/requester-type-informations/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.requester-type-informations.index') }}"
                                class="menu-link {{ request()->is('admin/requester-type-informations') || request()->is('admin/requester-type-informations/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-cogs">

                                </i>
                                <div data-i18n="    {{ trans('cruds.requesterTypeInformation.title') }} ">
                                    {{ trans('cruds.requesterTypeInformation.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('companies_info_access')
            <li
                class="menu-item {{ request()->is('admin/companies*') ? 'active open' : '' }} {{ request()->is('admin/companies-lines*') ? 'active open' : '' }} {{ request()->is('admin/company-types*') ? 'active open' : '' }} {{ request()->is('admin/ratings*') ? 'active open' : '' }} {{ request()->is('admin/companystatuses*') ? 'active open' : '' }} {{ request()->is('admin/company-lines-statuses*') ? 'active open' : '' }}">
                <a class="menu-link menu-toggle {{ request()->is('admin/companies*') ? 'active' : '' }} {{ request()->is('admin/companies-lines*') ? 'active' : '' }} {{ request()->is('admin/company-types*') ? 'active' : '' }} {{ request()->is('admin/ratings*') ? 'active' : '' }} {{ request()->is('admin/companystatuses*') ? 'active' : '' }} {{ request()->is('admin/company-lines-statuses*') ? 'active' : '' }}"
                    href="#">
                    <i class="menu-icon tf-icons fas fa-angle-double-up">

                    </i>
                    <div data-i18n="     {{ trans('cruds.companiesInfo.title') }} ">
                        {{ trans('cruds.companiesInfo.title') }}

                    </div>
                </a>
                <ul class="menu-sub">
                    @can('company_access')
                        <li
                            class="menu-item  {{ request()->is('admin/companies') || request()->is('admin/companies/*') ? 'active' : '' }} ">
                            <a href="{{ route('admin.companies.index') }}"
                                class="menu-link {{ request()->is('admin/companies') || request()->is('admin/companies/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-arrow-alt-circle-up">

                                </i>
                                <div data-i18n="     {{ trans('cruds.company.title') }} ">
                                    {{ trans('cruds.company.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('companies_line_access')
                        <li
                            class="menu-item  {{ request()->is('admin/companies-lines') || request()->is('admin/companies-lines/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.companies-lines.index') }}"
                                class="menu-link {{ request()->is('admin/companies-lines') || request()->is('admin/companies-lines/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-archway">

                                </i>
                                <div data-i18n="   {{ trans('cruds.companiesLine.title') }} ">
                                    {{ trans('cruds.companiesLine.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('company_type_access')
                        <li
                            class="menu-item   {{ request()->is('admin/company-types') || request()->is('admin/company-types/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.company-types.index') }}"
                                class="menu-link {{ request()->is('admin/company-types') || request()->is('admin/company-types/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons far fa-bookmark">

                                </i>
                                <div data-i18n="  {{ trans('cruds.companyType.title') }} ">
                                    {{ trans('cruds.companyType.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('rating_access')
                        <li
                            class="menu-item  {{ request()->is('admin/ratings') || request()->is('admin/ratings/*') ? 'active' : '' }} ">
                            <a href="{{ route('admin.ratings.index') }}"
                                class="menu-link {{ request()->is('admin/ratings') || request()->is('admin/ratings/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-battery-three-quarters">

                                </i>
                                <div data-i18n="    {{ trans('cruds.rating.title') }} ">
                                    {{ trans('cruds.rating.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('companystatus_access')
                        <li
                            class="menu-item  {{ request()->is('admin/companystatuses') || request()->is('admin/companystatuses/*') ? 'active' : '' }} ">
                            <a href="{{ route('admin.companystatuses.index') }}"
                                class="menu-link {{ request()->is('admin/companystatuses') || request()->is('admin/companystatuses/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-cogs">

                                </i>
                                <div data-i18n="   {{ trans('cruds.companystatus.title') }} ">
                                    {{ trans('cruds.companystatus.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('company_lines_status_access')
                        <li
                            class="menu-item   {{ request()->is('admin/company-lines-statuses') || request()->is('admin/company-lines-statuses/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.company-lines-statuses.index') }}"
                                class="menu-link {{ request()->is('admin/company-lines-statuses') || request()->is('admin/company-lines-statuses/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-bolt">

                                </i>
                                <div data-i18n="   {{ trans('cruds.companyLinesStatus.title') }} ">
                                    {{ trans('cruds.companyLinesStatus.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('info_access')
            <li
                class="menu-item {{ request()->is('admin/services*') ? 'active open' : '' }} {{ request()->is('admin/countries*') ? 'active open' : '' }} {{ request()->is('admin/cities*') ? 'active open' : '' }} {{ request()->is('admin/regions*') ? 'active open' : '' }} {{ request()->is('admin/pages*') ? 'active open' : '' }}">
                <a class="menu-link menu-toggle {{ request()->is('admin/services*') ? 'active' : '' }} {{ request()->is('admin/countries*') ? 'active' : '' }} {{ request()->is('admin/cities*') ? 'active' : '' }} {{ request()->is('admin/regions*') ? 'active' : '' }} {{ request()->is('admin/pages*') ? 'active' : '' }}"
                    href="#">
                    <i class="menu-icon tf-icons fas fa-align-right">

                    </i>
                    <div data-i18n="  {{ trans('cruds.info.title') }}">
                        {{ trans('cruds.info.title') }}
                    </div>
                </a>
                <ul class="menu-sub">
                    @can('service_access')
                        <li
                            class="menu-item  {{ request()->is('admin/services') || request()->is('admin/services/*') ? 'active' : '' }} ">
                            <a href="{{ route('admin.services.index') }}"
                                class="menu-link {{ request()->is('admin/services') || request()->is('admin/services/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-american-sign-language-interpreting">

                                </i>
                                <div data-i18n="   {{ trans('cruds.service.title') }}">
                                    {{ trans('cruds.service.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('country_access')
                        <li
                            class="menu-item  {{ request()->is('admin/countries') || request()->is('admin/countries/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.countries.index') }}"
                                class="menu-link {{ request()->is('admin/countries') || request()->is('admin/countries/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-flag">

                                </i>
                                <div data-i18n="   {{ trans('cruds.country.title') }} ">
                                    {{ trans('cruds.country.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('city_access')
                        <li
                            class="menu-item  {{ request()->is('admin/cities') || request()->is('admin/cities/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.cities.index') }}"
                                class="menu-link {{ request()->is('admin/cities') || request()->is('admin/cities/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-at">

                                </i>
                                <div data-i18n="  {{ trans('cruds.city.title') }} ">
                                    {{ trans('cruds.city.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('region_access')
                        <li
                            class="menu-item  {{ request()->is('admin/regions') || request()->is('admin/regions/*') ? 'active' : '' }} ">
                            <a href="{{ route('admin.regions.index') }}"
                                class="menu-link {{ request()->is('admin/regions') || request()->is('admin/regions/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-arrow-up">

                                </i>
                                <div data-i18n="   {{ trans('cruds.region.title') }}">
                                    {{ trans('cruds.region.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('page_access')
                        <li
                            class="menu-item  {{ request()->is('admin/pages') || request()->is('admin/pages/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.pages.index') }}"
                                class="menu-link {{ request()->is('admin/pages') || request()->is('admin/pages/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons far fa-calendar-minus">

                                </i>
                                <div data-i18n="  {{ trans('cruds.page.title') }}">
                                    {{ trans('cruds.page.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('contactu_access')
            <li
                class="menu-item  {{ request()->is('admin/contactus') || request()->is('admin/contactus/*') ? 'active' : '' }}">
                <a href="{{ route('admin.contactus.index') }}"
                    class="menu-link {{ request()->is('admin/contactus') || request()->is('admin/contactus/*') ? 'active' : '' }}">
                    <i class="menu-icon tf-icons fab fa-bandcamp">

                    </i>
                    <div data-i18n="   {{ trans('cruds.contactu.title') }} ">
                        {{ trans('cruds.contactu.title') }}
                    </div>
                </a>
            </li>
        @endcan
        @can('setting_access')
            <li
                class="menu-item  {{ request()->is('admin/settings') || request()->is('admin/settings/*') ? 'active' : '' }}">
                <a href="{{ route('admin.settings.index') }}"
                    class="menu-link {{ request()->is('admin/settings') || request()->is('admin/settings/*') ? 'active' : '' }}">
                    <i class="menu-icon tf-icons fas fa-adjust">

                    </i>
                    <div data-i18n="  {{ trans('cruds.setting.title') }} ">
                        {{ trans('cruds.setting.title') }}
                    </div>
                </a>
            </li>
        @endcan
        @can('look_up_table_access')
            <li
                class="menu-item {{ request()->is('admin/transportation-types*') ? 'active open' : '' }} {{ request()->is('admin/uld-container-types*') ? 'active open' : '' }} {{ request()->is('admin/delivery-types*') ? 'active open' : '' }} {{ request()->is('admin/associated-services*') ? 'active open' : '' }} {{ request()->is('admin/truck-types*') ? 'active open' : '' }} {{ request()->is('admin/ship-types*') ? 'active open' : '' }} {{ request()->is('admin/material-types*') ? 'active open' : '' }} {{ request()->is('admin/dimensions-types*') ? 'active open' : '' }}">
                <a class="menu-link menu-toggle {{ request()->is('admin/transportation-types*') ? 'active' : '' }} {{ request()->is('admin/uld-container-types*') ? 'active' : '' }} {{ request()->is('admin/delivery-types*') ? 'active' : '' }} {{ request()->is('admin/associated-services*') ? 'active' : '' }} {{ request()->is('admin/truck-types*') ? 'active' : '' }} {{ request()->is('admin/ship-types*') ? 'active' : '' }} {{ request()->is('admin/material-types*') ? 'active' : '' }} {{ request()->is('admin/dimensions-types*') ? 'active' : '' }}"
                    href="#">
                    <i class="menu-icon tf-icons fas fa-deaf">

                    </i>
                    <div data-i18n="     {{ trans('cruds.lookUpTable.title') }} ">
                        {{ trans('cruds.lookUpTable.title') }}

                    </div>
                </a>
                <ul class="menu-sub">
                    @can('transportation_type_access')
                        <li
                            class="menu-item  {{ request()->is('admin/transportation-types') || request()->is('admin/transportation-types/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.transportation-types.index') }}"
                                class="menu-link {{ request()->is('admin/transportation-types') || request()->is('admin/transportation-types/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-volume-up">

                                </i>
                                <div data-i18n="   {{ trans('cruds.transportationType.title') }}">
                                    {{ trans('cruds.transportationType.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('uld_container_type_access')
                        <li
                            class="menu-item  {{ request()->is('admin/uld-container-types') || request()->is('admin/uld-container-types/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.uld-container-types.index') }}"
                                class="menu-link {{ request()->is('admin/uld-container-types') || request()->is('admin/uld-container-types/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-bus">

                                </i>
                                <div data-i18n="  {{ trans('cruds.uldContainerType.title') }} ">
                                    {{ trans('cruds.uldContainerType.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('delivery_type_access')
                        <li
                            class="menu-item  {{ request()->is('admin/delivery-types') || request()->is('admin/delivery-types/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.delivery-types.index') }}"
                                class="menu-link {{ request()->is('admin/delivery-types') || request()->is('admin/delivery-types/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-bus-alt">

                                </i>
                                <div data-i18n="   {{ trans('cruds.deliveryType.title') }} ">
                                    {{ trans('cruds.deliveryType.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('associated_service_access')
                        <li
                            class="menu-item  {{ request()->is('admin/associated-services') || request()->is('admin/associated-services/*') ? 'active' : '' }} ">
                            <a href="{{ route('admin.associated-services.index') }}"
                                class="menu-link {{ request()->is('admin/associated-services') || request()->is('admin/associated-services/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fab fa-affiliatetheme">

                                </i>
                                <div data-i18n="    {{ trans('cruds.associatedService.title') }} ">
                                    {{ trans('cruds.associatedService.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('truck_type_access')
                        <li
                            class="menu-item  {{ request()->is('admin/truck-types') || request()->is('admin/truck-types/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.truck-types.index') }}"
                                class="menu-link {{ request()->is('admin/truck-types') || request()->is('admin/truck-types/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-bus">

                                </i>
                                <div data-i18n="    {{ trans('cruds.truckType.title') }}">
                                    {{ trans('cruds.truckType.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('ship_type_access')
                        <li
                            class="menu-item  {{ request()->is('admin/ship-types') || request()->is('admin/ship-types/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.ship-types.index') }}"
                                class="menu-link {{ request()->is('admin/ship-types') || request()->is('admin/ship-types/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-bullseye">

                                </i>
                                <div data-i18n="   {{ trans('cruds.shipType.title') }}">
                                    {{ trans('cruds.shipType.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('material_type_access')
                        <li
                            class="menu-item  {{ request()->is('admin/material-types') || request()->is('admin/material-types/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.material-types.index') }}"
                                class="menu-link {{ request()->is('admin/material-types') || request()->is('admin/material-types/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-angle-double-right">

                                </i>
                                <div data-i18n=" {{ trans('cruds.materialType.title') }}
                                ">
                                    {{ trans('cruds.materialType.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('dimensions_type_access')
                        <li
                            class="menu-item  {{ request()->is('admin/dimensions-types') || request()->is('admin/dimensions-types/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.dimensions-types.index') }}"
                                class="menu-link {{ request()->is('admin/dimensions-types') || request()->is('admin/dimensions-types/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-angle-double-right">

                                </i>
                                <div data-i18n="   {{ trans('cruds.dimensionsType.title') }} ">
                                    {{ trans('cruds.dimensionsType.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('testimonial_access')
            <li
                class="menu-item   {{ request()->is('admin/testimonials') || request()->is('admin/testimonials/*') ? 'active' : '' }}">
                <a href="{{ route('admin.testimonials.index') }}"
                    class="menu-link {{ request()->is('admin/testimonials') || request()->is('admin/testimonials/*') ? 'active' : '' }}">
                    <i class="menu-icon tf-icons fas fa-cogs">

                    </i>
                    <div data-i18n="   {{ trans('cruds.testimonial.title') }} ">
                        {{ trans('cruds.testimonial.title') }}
                    </div>
                </a>
            </li>
        @endcan
        @can('newsletter_access')
            <li
                class="menu-item   {{ request()->is('admin/newsletters') || request()->is('admin/newsletters/*') ? 'active' : '' }} ">
                <a href="{{ route('admin.newsletters.index') }}"
                    class="menu-link {{ request()->is('admin/newsletters') || request()->is('admin/newsletters/*') ? 'active' : '' }}">
                    <i class="menu-icon tf-icons fas fa-cogs">

                    </i>
                    <div data-i18n="   {{ trans('cruds.newsletter.title') }}">
                        {{ trans('cruds.newsletter.title') }}
                    </div>
                </a>
            </li>
        @endcan
        @can('user_alert_access')
            <li
                class="menu-item {{ request()->is('admin/user-alerts') || request()->is('admin/user-alerts/*') ? 'active' : '' }}   ">
                <a href="{{ route('admin.user-alerts.index') }}"
                    class="menu-link {{ request()->is('admin/user-alerts') || request()->is('admin/user-alerts/*') ? 'active' : '' }}">
                    <i class="menu-icon tf-icons fas fa-bell">

                    </i>
                    <div data-i18n="   {{ trans('cruds.userAlert.title') }} ">
                        {{ trans('cruds.userAlert.title') }}
                    </div>
                </a>
            </li>
        @endcan
        @can('content_management_access')
            <li
                class="menu-item {{ request()->is('admin/content-categories*') ? 'active open' : '' }} {{ request()->is('admin/content-tags*') ? 'active open' : '' }} {{ request()->is('admin/content-pages*') ? 'active open' : '' }}">
                <a class="menu-link menu-toggle {{ request()->is('admin/content-categories*') ? 'active' : '' }} {{ request()->is('admin/content-tags*') ? 'active' : '' }} {{ request()->is('admin/content-pages*') ? 'active' : '' }}"
                    href="#">
                    <i class="menu-icon tf-icons fas fa-book">

                    </i>
                    <div data-i18n="  {{ trans('cruds.contentManagement.title') }} ">
                        {{ trans('cruds.contentManagement.title') }}

                    </div>
                </a>
                <ul class="menu-sub">
                    @can('content_category_access')
                        <li
                            class="menu-item  {{ request()->is('admin/content-categories') || request()->is('admin/content-categories/*') ? 'active' : '' }}  ">
                            <a href="{{ route('admin.content-categories.index') }}"
                                class="menu-link {{ request()->is('admin/content-categories') || request()->is('admin/content-categories/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-folder">

                                </i>
                                <div data-i18n="   {{ trans('cruds.contentCategory.title') }} ">
                                    {{ trans('cruds.contentCategory.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('content_tag_access')
                        <li
                            class="menu-item {{ request()->is('admin/content-tags') || request()->is('admin/content-tags/*') ? 'active' : '' }}  ">
                            <a href="{{ route('admin.content-tags.index') }}"
                                class="menu-link {{ request()->is('admin/content-tags') || request()->is('admin/content-tags/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-tags">

                                </i>
                                <div data-i18n="   {{ trans('cruds.contentTag.title') }} ">
                                    {{ trans('cruds.contentTag.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('content_page_access')
                        <li
                            class="menu-item {{ request()->is('admin/content-pages') || request()->is('admin/content-pages/*') ? 'active' : '' }}  ">
                            <a href="{{ route('admin.content-pages.index') }}"
                                class="menu-link {{ request()->is('admin/content-pages') || request()->is('admin/content-pages/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-file">

                                </i>
                                <div data-i18n="    {{ trans('cruds.contentPage.title') }} ">
                                    {{ trans('cruds.contentPage.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('faq_management_access')
            <li
                class="menu-item {{ request()->is('admin/faq-categories*') ? 'active open' : '' }} {{ request()->is('admin/faq-categories*') ? 'active open' : '' }}">
                <a class="menu-link menu-toggle {{ request()->is('admin/faq-categories*') ? 'active' : '' }} {{ request()->is('admin/faq-questions*') ? 'active' : '' }}"
                    href="#">
                    <i class="menu-icon tf-icons fas fa-question">

                    </i>
                    <div data-i18n="     {{ trans('cruds.faqManagement.title') }}">
                        {{ trans('cruds.faqManagement.title') }}

                    </div>
                </a>
                <ul class="menu-sub">
                    @can('faq_category_access')
                        <li
                            class="menu-item {{ request()->is('admin/faq-categories') || request()->is('admin/faq-categories/*') ? 'active' : '' }}   ">
                            <a href="{{ route('admin.faq-categories.index') }}" class="menu-link  ">
                                <i class="menu-icon tf-icons fas fa-briefcase">

                                </i>
                                <div data-i18n="   {{ trans('cruds.faqCategory.title') }} ">
                                    {{ trans('cruds.faqCategory.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('faq_question_access')
                        <li
                            class="menu-item {{ request()->is('admin/faq-questions') || request()->is('admin/faq-questions/*') ? 'active' : '' }}  ">
                            <a href="{{ route('admin.faq-questions.index') }}"
                                class="menu-link {{ request()->is('admin/faq-questions') || request()->is('admin/faq-questions/*') ? 'active' : '' }}">
                                <i class="menu-icon tf-icons fas fa-question">

                                </i>
                                <div data-i18n="   {{ trans('cruds.faqQuestion.title') }} ">
                                    {{ trans('cruds.faqQuestion.title') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        <li
            class="menu-item {{ request()->is('admin/system-calendar') || request()->is('admin/system-calendar/*') ? 'active' : '' }}  ">
            <a href="{{ route('admin.systemCalendar') }}"
                class="menu-link {{ request()->is('admin/system-calendar') || request()->is('admin/system-calendar/*') ? 'active' : '' }}">
                <i class="fas fa-fw fa-calendar nav-icon">

                </i>
                <div data-i18n="   {{ trans('global.systemCalendar') }} ">
                    {{ trans('global.systemCalendar') }}
                </div>
            </a>
        </li>
        @php($unread = \App\Models\QaTopic::unreadCount())
        <li
            class="menu-item  {{ request()->is('admin/messenger') || request()->is('admin/messenger/*') ? 'active' : '' }} ">
            <a href="{{ route('admin.messenger.index') }}"
                class="{{ request()->is('admin/messenger') || request()->is('admin/messenger/*') ? 'active' : '' }} menu-link">
                <i class="fa-fw fa fa-envelope nav-icon">

                </i>
                <div data-i18n="  {{ trans('global.messages') }} ">{{ trans('global.messages') }}</div>
                @if ($unread > 0)
                    <strong>( {{ $unread }} )</strong>
                @endif

            </a>
        </li>
        @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li
                    class="menu-item {{ request()->is('admin/newsletters') || request()->is('admin/newsletters/*') ? 'active' : '' }}  ">
                    <a class="menu-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}"
                        href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key nav-icon">
                        </i>
                        <div data-i18n=" {{ trans('global.change_password') }} ">
                            {{ trans('global.change_password') }}
                        </div>
                    </a>
                </li>
            @endcan
        @endif
        <li class="menu-item  ">
            <a href="#" class="menu-link"
                onclick="event.preventDefault(); document.getElementById('logoutform').submit();">

                <i class="fas fa-fw fa-sign-out-alt nav-icon">

                </i>
                <div data-i18n="  {{ trans('global.logout') }}">{{ trans('global.logout') }}</div>

            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->
