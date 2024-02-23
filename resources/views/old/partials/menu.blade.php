<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li>
            <select class="searchable-field form-control">

            </select>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('real_estate_managment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/projects*") ? "c-show" : "" }} {{ request()->is("admin/real-estate-units*") ? "c-show" : "" }} {{ request()->is("admin/real-estate-types*") ? "c-show" : "" }} {{ request()->is("admin/views*") ? "c-show" : "" }} {{ request()->is("admin/finish-types*") ? "c-show" : "" }} {{ request()->is("admin/payment-methods*") ? "c-show" : "" }} {{ request()->is("admin/available-for-mortgages*") ? "c-show" : "" }} {{ request()->is("admin/realstate-purposes*") ? "c-show" : "" }} {{ request()->is("admin/amenities*") ? "c-show" : "" }} {{ request()->is("admin/nears*") ? "c-show" : "" }} {{ request()->is("admin/book-meetings*") ? "c-show" : "" }} {{ request()->is("admin/likes*") ? "c-show" : "" }} {{ request()->is("admin/unit-comments*") ? "c-show" : "" }} {{ request()->is("admin/project-types*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.realEstateManagment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('project_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.projects.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/projects") || request()->is("admin/projects/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.project.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('real_estate_unit_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.real-estate-units.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/real-estate-units") || request()->is("admin/real-estate-units/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.realEstateUnit.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('real_estate_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.real-estate-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/real-estate-types") || request()->is("admin/real-estate-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.realEstateType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('view_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.views.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/views") || request()->is("admin/views/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.view.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('finish_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.finish-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/finish-types") || request()->is("admin/finish-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.finishType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('payment_method_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.payment-methods.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/payment-methods") || request()->is("admin/payment-methods/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.paymentMethod.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('available_for_mortgage_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.available-for-mortgages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/available-for-mortgages") || request()->is("admin/available-for-mortgages/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.availableForMortgage.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('realstate_purpose_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.realstate-purposes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/realstate-purposes") || request()->is("admin/realstate-purposes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.realstatePurpose.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('amenity_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.amenities.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/amenities") || request()->is("admin/amenities/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.amenity.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('near_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.nears.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/nears") || request()->is("admin/nears/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.near.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('book_meeting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.book-meetings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/book-meetings") || request()->is("admin/book-meetings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.bookMeeting.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('like_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.likes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/likes") || request()->is("admin/likes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.like.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('unit_comment_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.unit-comments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/unit-comments") || request()->is("admin/unit-comments/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.unitComment.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('project_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.project-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/project-types") || request()->is("admin/project-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.projectType.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('event_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/events*") ? "c-show" : "" }} {{ request()->is("admin/eventtags*") ? "c-show" : "" }} {{ request()->is("admin/event-categories*") ? "c-show" : "" }} {{ request()->is("admin/eventuserstatuses*") ? "c-show" : "" }} {{ request()->is("admin/eventjoiningusers*") ? "c-show" : "" }} {{ request()->is("admin/event-discussions*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.eventManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('event_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.events.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/events") || request()->is("admin/events/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.event.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('eventtag_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.eventtags.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/eventtags") || request()->is("admin/eventtags/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.eventtag.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('event_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.event-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/event-categories") || request()->is("admin/event-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.eventCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('eventuserstatus_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.eventuserstatuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/eventuserstatuses") || request()->is("admin/eventuserstatuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.eventuserstatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('eventjoininguser_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.eventjoiningusers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/eventjoiningusers") || request()->is("admin/eventjoiningusers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.eventjoininguser.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('event_discussion_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.event-discussions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/event-discussions") || request()->is("admin/event-discussions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.eventDiscussion.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('form_request_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/applications-request-sections*") ? "c-show" : "" }} {{ request()->is("admin/real-estate-applications*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.formRequest.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('applications_request_section_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.applications-request-sections.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/applications-request-sections") || request()->is("admin/applications-request-sections/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.applicationsRequestSection.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('real_estate_application_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.real-estate-applications.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/real-estate-applications") || request()->is("admin/real-estate-applications/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.realEstateApplication.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('info_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/countries*") ? "c-show" : "" }} {{ request()->is("admin/cities*") ? "c-show" : "" }} {{ request()->is("admin/regions*") ? "c-show" : "" }} {{ request()->is("admin/pages*") ? "c-show" : "" }} {{ request()->is("admin/sliders*") ? "c-show" : "" }} {{ request()->is("admin/services*") ? "c-show" : "" }} {{ request()->is("admin/contactus*") ? "c-show" : "" }} {{ request()->is("admin/settings*") ? "c-show" : "" }} {{ request()->is("admin/newsletters*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-align-right c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.info.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('country_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.countries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/countries") || request()->is("admin/countries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-flag c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.country.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('city_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.cities.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/cities") || request()->is("admin/cities/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-at c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.city.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('region_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.regions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/regions") || request()->is("admin/regions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-arrow-up c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.region.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('page_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.pages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pages") || request()->is("admin/pages/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-calendar-minus c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.page.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('slider_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sliders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sliders") || request()->is("admin/sliders/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.slider.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('service_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.services.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/services") || request()->is("admin/services/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.service.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('contactu_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.contactus.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/contactus") || request()->is("admin/contactus/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-bandcamp c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contactu.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('setting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.settings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/settings") || request()->is("admin/settings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.setting.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('newsletter_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.newsletters.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/newsletters") || request()->is("admin/newsletters/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.newsletter.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('testimonial_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.testimonials.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/testimonials") || request()->is("admin/testimonials/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.testimonial.title') }}
                </a>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
        @can('content_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/content-categories*") ? "c-show" : "" }} {{ request()->is("admin/content-tags*") ? "c-show" : "" }} {{ request()->is("admin/content-pages*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-book c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.contentManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('content_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.content-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/content-categories") || request()->is("admin/content-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-folder c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contentCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('content_tag_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.content-tags.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/content-tags") || request()->is("admin/content-tags/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-tags c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contentTag.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('content_page_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.content-pages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/content-pages") || request()->is("admin/content-pages/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contentPage.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('faq_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/faq-categories*") ? "c-show" : "" }} {{ request()->is("admin/faq-questions*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-question c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.faqManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('faq_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.faq-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/faq-categories") || request()->is("admin/faq-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.faqCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('faq_question_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.faq-questions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/faq-questions") || request()->is("admin/faq-questions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-question c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.faqQuestion.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.systemCalendar") }}" class="c-sidebar-nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "c-active" : "" }}">
                <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                </i>
                {{ trans('global.systemCalendar') }}
            </a>
        </li>
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>