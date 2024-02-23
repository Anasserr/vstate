@can('user_management_access')


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
                <li class="menu-item  {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
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
                <li class="menu-item  {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
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

        </ul>
    </li>
@endcan
@can('real_estate_managment_access')
    <li
        class="menu-item  {{ request()->is('admin/projects*') ? 'c-show' : '' }} {{ request()->is('admin/real-estate-units*') ? 'c-show' : '' }} {{ request()->is('admin/real-estate-types*') ? 'c-show' : '' }} {{ request()->is('admin/views*') ? 'c-show' : '' }} {{ request()->is('admin/finish-types*') ? 'c-show' : '' }} {{ request()->is('admin/payment-methods*') ? 'c-show' : '' }} {{ request()->is('admin/available-for-mortgages*') ? 'c-show' : '' }} {{ request()->is('admin/realstate-purposes*') ? 'c-show' : '' }} {{ request()->is('admin/amenities*') ? 'c-show' : '' }} {{ request()->is('admin/nears*') ? 'c-show' : '' }} {{ request()->is('admin/book-meetings*') ? 'c-show' : '' }} {{ request()->is('admin/likes*') ? 'c-show' : '' }} {{ request()->is('admin/unit-comments*') ? 'c-show' : '' }} {{ request()->is('admin/project-types*') ? 'c-show' : '' }}">
        <a class="menu-link menu-toggle" href="#">
            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

            </i>
            <div data-i18n=" {{ trans('cruds.realEstateManagment.title') }}">
                {{ trans('cruds.realEstateManagment.title') }}
            </div>
        </a>
        <ul class="menu-item -items">
            @can('project_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.projects.index') }}"
                        class="menu-item {{ request()->is('admin/projects') || request()->is('admin/projects/*') ? 'c-active' : '' }}">


                        <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.project.title') }} ">
                            {{ trans('cruds.project.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('real_estate_unit_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.real-estate-units.index') }}"
                        class="menu-item {{ request()->is('admin/real-estate-units') || request()->is('admin/real-estate-units/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.realEstateUnit.title') }} ">
                            {{ trans('cruds.realEstateUnit.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('real_estate_type_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.real-estate-types.index') }}"
                        class="menu-item {{ request()->is('admin/real-estate-types') || request()->is('admin/real-estate-types/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.realEstateType.title') }} ">
                            {{ trans('cruds.realEstateType.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('view_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.views.index') }}"
                        class="menu-item {{ request()->is('admin/views') || request()->is('admin/views/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.view.title') }} ">
                            {{ trans('cruds.view.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('finish_type_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.finish-types.index') }}"
                        class="menu-item {{ request()->is('admin/finish-types') || request()->is('admin/finish-types/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.finishType.title') }} ">
                            {{ trans('cruds.finishType.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('payment_method_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.payment-methods.index') }}"
                        class="menu-item {{ request()->is('admin/payment-methods') || request()->is('admin/payment-methods/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.paymentMethod.title') }} ">
                            {{ trans('cruds.paymentMethod.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('available_for_mortgage_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.available-for-mortgages.index') }}"
                        class="menu-item {{ request()->is('admin/available-for-mortgages') || request()->is('admin/available-for-mortgages/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.availableForMortgage.title') }} ">
                            {{ trans('cruds.availableForMortgage.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('realstate_purpose_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.realstate-purposes.index') }}"
                        class="menu-item {{ request()->is('admin/realstate-purposes') || request()->is('admin/realstate-purposes/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.realstatePurpose.title') }} ">
                            {{ trans('cruds.realstatePurpose.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('amenity_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.amenities.index') }}"
                        class="menu-item {{ request()->is('admin/amenities') || request()->is('admin/amenities/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.amenity.title') }} ">
                            {{ trans('cruds.amenity.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('near_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.nears.index') }}"
                        class="menu-item {{ request()->is('admin/nears') || request()->is('admin/nears/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.near.title') }} ">
                            {{ trans('cruds.near.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('book_meeting_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.book-meetings.index') }}"
                        class="menu-item {{ request()->is('admin/book-meetings') || request()->is('admin/book-meetings/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.bookMeeting.title') }} ">
                            {{ trans('cruds.bookMeeting.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('like_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.likes.index') }}"
                        class="menu-item {{ request()->is('admin/likes') || request()->is('admin/likes/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.like.title') }} ">
                            {{ trans('cruds.like.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('unit_comment_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.unit-comments.index') }}"
                        class="menu-item {{ request()->is('admin/unit-comments') || request()->is('admin/unit-comments/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.unitComment.title') }} ">
                            {{ trans('cruds.unitComment.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('project_type_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.project-types.index') }}"
                        class="menu-item {{ request()->is('admin/project-types') || request()->is('admin/project-types/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.projectType.title') }} ">
                            {{ trans('cruds.projectType.title') }}
                        </div>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endcan
@can('event_management_access')
    <li
        class="menu-item  {{ request()->is('admin/events*') ? 'c-show' : '' }} {{ request()->is('admin/eventtags*') ? 'c-show' : '' }} {{ request()->is('admin/event-categories*') ? 'c-show' : '' }} {{ request()->is('admin/eventuserstatuses*') ? 'c-show' : '' }} {{ request()->is('admin/eventjoiningusers*') ? 'c-show' : '' }} {{ request()->is('admin/event-discussions*') ? 'c-show' : '' }}">
        <a class="menu-link menu-toggle" href="#">
            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

            </i>
            <div data-i18n="    {{ trans('cruds.eventManagement.title') }} ">
                {{ trans('cruds.eventManagement.title') }}
            </div>
        </a>
        <ul class="menu-item -items">
            @can('event_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.events.index') }}"
                        class="menu-item {{ request()->is('admin/events') || request()->is('admin/events/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.event.title') }} ">
                            {{ trans('cruds.event.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('eventtag_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.eventtags.index') }}"
                        class="menu-item {{ request()->is('admin/eventtags') || request()->is('admin/eventtags/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.eventtag.title') }} ">
                            {{ trans('cruds.eventtag.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('event_category_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.event-categories.index') }}"
                        class="menu-item {{ request()->is('admin/event-categories') || request()->is('admin/event-categories/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.eventCategory.title') }} ">
                            {{ trans('cruds.eventCategory.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('eventuserstatus_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.eventuserstatuses.index') }}"
                        class="menu-item {{ request()->is('admin/eventuserstatuses') || request()->is('admin/eventuserstatuses/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.eventuserstatus.title') }} ">
                            {{ trans('cruds.eventuserstatus.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('eventjoininguser_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.eventjoiningusers.index') }}"
                        class="menu-item {{ request()->is('admin/eventjoiningusers') || request()->is('admin/eventjoiningusers/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.eventjoininguser.title') }} ">
                            {{ trans('cruds.eventjoininguser.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('event_discussion_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.event-discussions.index') }}"
                        class="menu-item {{ request()->is('admin/event-discussions') || request()->is('admin/event-discussions/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.eventDiscussion.title') }} ">
                            {{ trans('cruds.eventDiscussion.title') }}
                        </div>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endcan
@can('form_request_access')
    <li
        class="menu-item  {{ request()->is('admin/applications-request-sections*') ? 'c-show' : '' }} {{ request()->is('admin/real-estate-applications*') ? 'c-show' : '' }}">
        <a class="menu-link menu-toggle" href="#">
            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

            </i>
            <div data-i18n="    {{ trans('cruds.formRequest.title') }} ">
                {{ trans('cruds.formRequest.title') }}
            </div>
        </a>
        <ul class="menu-item -items">
            @can('applications_request_section_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.applications-request-sections.index') }}"
                        class="menu-item {{ request()->is('admin/applications-request-sections') || request()->is('admin/applications-request-sections/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.applicationsRequestSection.title') }} ">
                            {{ trans('cruds.applicationsRequestSection.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('real_estate_application_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.real-estate-applications.index') }}"
                        class="menu-item {{ request()->is('admin/real-estate-applications') || request()->is('admin/real-estate-applications/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.realEstateApplication.title') }} ">
                            {{ trans('cruds.realEstateApplication.title') }}
                        </div>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endcan
@can('info_access')
    <li
        class="menu-item  {{ request()->is('admin/countries*') ? 'c-show' : '' }} {{ request()->is('admin/cities*') ? 'c-show' : '' }} {{ request()->is('admin/regions*') ? 'c-show' : '' }} {{ request()->is('admin/pages*') ? 'c-show' : '' }} {{ request()->is('admin/sliders*') ? 'c-show' : '' }} {{ request()->is('admin/services*') ? 'c-show' : '' }} {{ request()->is('admin/contactus*') ? 'c-show' : '' }} {{ request()->is('admin/settings*') ? 'c-show' : '' }} {{ request()->is('admin/newsletters*') ? 'c-show' : '' }}">
        <a class="menu-link menu-toggle" href="#">
            <i class="fa-fw fas fa-align-right c-sidebar-nav-icon">

            </i>
            <div data-i18n="    {{ trans('cruds.info.title') }} ">
                {{ trans('cruds.info.title') }}
            </div>
        </a>
        <ul class="menu-item -items">
            @can('country_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.countries.index') }}"
                        class="menu-item {{ request()->is('admin/countries') || request()->is('admin/countries/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-flag c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.country.title') }} ">
                            {{ trans('cruds.country.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('city_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.cities.index') }}"
                        class="menu-item {{ request()->is('admin/cities') || request()->is('admin/cities/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-at c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.city.title') }} ">
                            {{ trans('cruds.city.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('region_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.regions.index') }}"
                        class="menu-item {{ request()->is('admin/regions') || request()->is('admin/regions/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-arrow-up c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.region.title') }} ">
                            {{ trans('cruds.region.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('page_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.pages.index') }}"
                        class="menu-item {{ request()->is('admin/pages') || request()->is('admin/pages/*') ? 'c-active' : '' }}">
                        <i class="fa-fw far fa-calendar-minus c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.page.title') }} ">
                            {{ trans('cruds.page.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('slider_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.sliders.index') }}"
                        class="menu-item {{ request()->is('admin/sliders') || request()->is('admin/sliders/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.slider.title') }} ">
                            {{ trans('cruds.slider.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('service_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.services.index') }}"
                        class="menu-item {{ request()->is('admin/services') || request()->is('admin/services/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.service.title') }} ">
                            {{ trans('cruds.service.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('contactu_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.contactus.index') }}"
                        class="menu-item {{ request()->is('admin/contactus') || request()->is('admin/contactus/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fab fa-bandcamp c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.contactu.title') }} ">
                            {{ trans('cruds.contactu.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('setting_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.settings.index') }}"
                        class="menu-item {{ request()->is('admin/settings') || request()->is('admin/settings/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.setting.title') }} ">
                            {{ trans('cruds.setting.title') }}
                        </div>
                    </a>
                </li>
            @endcan
            @can('newsletter_access')
                <li class="menu-item ">
                    <a href="{{ route('admin.newsletters.index') }}"
                        class="menu-item {{ request()->is('admin/newsletters') || request()->is('admin/newsletters/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                        </i>
                        <div data-i18n="    {{ trans('cruds.newsletter.title') }} ">
                            {{ trans('cruds.newsletter.title') }}
                        </div>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endcan
@can('testimonial_access')
    <li class="menu-item ">
        <a href="{{ route('admin.testimonials.index') }}"
            class="menu-item {{ request()->is('admin/testimonials') || request()->is('admin/testimonials/*') ? 'c-active' : '' }}">
            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

            </i>
            <div data-i18n="    {{ trans('cruds.testimonial.title') }} ">
                {{ trans('cruds.testimonial.title') }}
            </div>
        </a>
    </li>
@endcan
@can('user_alert_access')
    <li class="menu-item ">
        <a href="{{ route('admin.user-alerts.index') }}"
            class="menu-item {{ request()->is('admin/user-alerts') || request()->is('admin/user-alerts/*') ? 'c-active' : '' }}">
            <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

            </i>
            <div data-i18n="    {{ trans('cruds.userAlert.title') }} ">
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
<li class="menu-item ">
    <a href="{{ route('admin.systemCalendar') }}"
        class="menu-item {{ request()->is('admin/system-calendar') || request()->is('admin/system-calendar/*') ? 'c-active' : '' }}">
        <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

        </i>
        <div data-i18n="     {{ trans('global.systemCalendar') }} ">
            {{ trans('global.systemCalendar') }}
        </div>
    </a>
</li>
@php($unread = \App\Models\QaTopic::unreadCount())
<li class="menu-item ">
    <a href="{{ route('admin.messenger.index') }}"
        class="{{ request()->is('admin/messenger') || request()->is('admin/messenger/*') ? 'c-active' : '' }} menu-item ">
        <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

        </i>
        <span>{{ trans('global.messages') }}</span>
        @if ($unread > 0)
            <strong>( {{ $unread }} )</strong>
        @endif

    </a>
</li>
@if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
    @can('profile_password_edit')
        <li class="menu-item ">
            <a class="menu-item {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}"
                href="{{ route('profile.password.edit') }}">
                <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                </i>
                {{ trans('global.change_password') }}
            </a>
        </li>
    @endcan
@endif
<li class="menu-item ">
    <a href="#" class="menu-item "
        onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
        <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

        </i>
        <div data-i18n="  {{ trans('global.logout') }} ">
            {{ trans('global.logout') }}
        </div>
    </a>
</li>
</ul>

</div>
