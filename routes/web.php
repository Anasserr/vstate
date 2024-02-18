<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::post('roles/parse-csv-import', 'RolesController@parseCsvImport')->name('roles.parseCsvImport');
    Route::post('roles/process-csv-import', 'RolesController@processCsvImport')->name('roles.processCsvImport');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Faq Category
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Question
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');

    // Settings
    Route::delete('settings/destroy', 'SettingsController@massDestroy')->name('settings.massDestroy');
    Route::post('settings/media', 'SettingsController@storeMedia')->name('settings.storeMedia');
    Route::post('settings/ckmedia', 'SettingsController@storeCKEditorImages')->name('settings.storeCKEditorImages');
    Route::resource('settings', 'SettingsController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::post('countries/media', 'CountriesController@storeMedia')->name('countries.storeMedia');
    Route::post('countries/ckmedia', 'CountriesController@storeCKEditorImages')->name('countries.storeCKEditorImages');
    Route::post('countries/parse-csv-import', 'CountriesController@parseCsvImport')->name('countries.parseCsvImport');
    Route::post('countries/process-csv-import', 'CountriesController@processCsvImport')->name('countries.processCsvImport');
    Route::resource('countries', 'CountriesController');

    // Cities
    Route::delete('cities/destroy', 'CitiesController@massDestroy')->name('cities.massDestroy');
    Route::post('cities/media', 'CitiesController@storeMedia')->name('cities.storeMedia');
    Route::post('cities/ckmedia', 'CitiesController@storeCKEditorImages')->name('cities.storeCKEditorImages');
    Route::post('cities/parse-csv-import', 'CitiesController@parseCsvImport')->name('cities.parseCsvImport');
    Route::post('cities/process-csv-import', 'CitiesController@processCsvImport')->name('cities.processCsvImport');
    Route::resource('cities', 'CitiesController');

    // Regions
    Route::delete('regions/destroy', 'RegionsController@massDestroy')->name('regions.massDestroy');
    Route::resource('regions', 'RegionsController');

    // Testimonials
    Route::delete('testimonials/destroy', 'TestimonialsController@massDestroy')->name('testimonials.massDestroy');
    Route::post('testimonials/media', 'TestimonialsController@storeMedia')->name('testimonials.storeMedia');
    Route::post('testimonials/ckmedia', 'TestimonialsController@storeCKEditorImages')->name('testimonials.storeCKEditorImages');
    Route::resource('testimonials', 'TestimonialsController');

    // Newsletter
    Route::delete('newsletters/destroy', 'NewsletterController@massDestroy')->name('newsletters.massDestroy');
    Route::resource('newsletters', 'NewsletterController');

    // Pages
    Route::delete('pages/destroy', 'PagesController@massDestroy')->name('pages.massDestroy');
    Route::post('pages/media', 'PagesController@storeMedia')->name('pages.storeMedia');
    Route::post('pages/ckmedia', 'PagesController@storeCKEditorImages')->name('pages.storeCKEditorImages');
    Route::resource('pages', 'PagesController');

    // Contactus
    Route::delete('contactus/destroy', 'ContactusController@massDestroy')->name('contactus.massDestroy');
    Route::resource('contactus', 'ContactusController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Content Category
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Tag
    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagController');

    // Content Page
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPageController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPageController');

    // View
    Route::delete('views/destroy', 'ViewController@massDestroy')->name('views.massDestroy');
    Route::post('views/media', 'ViewController@storeMedia')->name('views.storeMedia');
    Route::post('views/ckmedia', 'ViewController@storeCKEditorImages')->name('views.storeCKEditorImages');
    Route::post('views/parse-csv-import', 'ViewController@parseCsvImport')->name('views.parseCsvImport');
    Route::post('views/process-csv-import', 'ViewController@processCsvImport')->name('views.processCsvImport');
    Route::resource('views', 'ViewController');

    // Finish Type
    Route::delete('finish-types/destroy', 'FinishTypeController@massDestroy')->name('finish-types.massDestroy');
    Route::post('finish-types/media', 'FinishTypeController@storeMedia')->name('finish-types.storeMedia');
    Route::post('finish-types/ckmedia', 'FinishTypeController@storeCKEditorImages')->name('finish-types.storeCKEditorImages');
    Route::post('finish-types/parse-csv-import', 'FinishTypeController@parseCsvImport')->name('finish-types.parseCsvImport');
    Route::post('finish-types/process-csv-import', 'FinishTypeController@processCsvImport')->name('finish-types.processCsvImport');
    Route::resource('finish-types', 'FinishTypeController');

    // Slider
    Route::delete('sliders/destroy', 'SliderController@massDestroy')->name('sliders.massDestroy');
    Route::post('sliders/media', 'SliderController@storeMedia')->name('sliders.storeMedia');
    Route::post('sliders/ckmedia', 'SliderController@storeCKEditorImages')->name('sliders.storeCKEditorImages');
    Route::post('sliders/parse-csv-import', 'SliderController@parseCsvImport')->name('sliders.parseCsvImport');
    Route::post('sliders/process-csv-import', 'SliderController@processCsvImport')->name('sliders.processCsvImport');
    Route::resource('sliders', 'SliderController');

    // Services
    Route::delete('services/destroy', 'ServicesController@massDestroy')->name('services.massDestroy');
    Route::post('services/media', 'ServicesController@storeMedia')->name('services.storeMedia');
    Route::post('services/ckmedia', 'ServicesController@storeCKEditorImages')->name('services.storeCKEditorImages');
    Route::post('services/parse-csv-import', 'ServicesController@parseCsvImport')->name('services.parseCsvImport');
    Route::post('services/process-csv-import', 'ServicesController@processCsvImport')->name('services.processCsvImport');
    Route::resource('services', 'ServicesController');

    // Events
    Route::delete('events/destroy', 'EventsController@massDestroy')->name('events.massDestroy');
    Route::post('events/media', 'EventsController@storeMedia')->name('events.storeMedia');
    Route::post('events/ckmedia', 'EventsController@storeCKEditorImages')->name('events.storeCKEditorImages');
    Route::post('events/parse-csv-import', 'EventsController@parseCsvImport')->name('events.parseCsvImport');
    Route::post('events/process-csv-import', 'EventsController@processCsvImport')->name('events.processCsvImport');
    Route::resource('events', 'EventsController');

    // Eventtags
    Route::delete('eventtags/destroy', 'EventtagsController@massDestroy')->name('eventtags.massDestroy');
    Route::post('eventtags/parse-csv-import', 'EventtagsController@parseCsvImport')->name('eventtags.parseCsvImport');
    Route::post('eventtags/process-csv-import', 'EventtagsController@processCsvImport')->name('eventtags.processCsvImport');
    Route::resource('eventtags', 'EventtagsController');

    // Event Categories
    Route::delete('event-categories/destroy', 'EventCategoriesController@massDestroy')->name('event-categories.massDestroy');
    Route::post('event-categories/media', 'EventCategoriesController@storeMedia')->name('event-categories.storeMedia');
    Route::post('event-categories/ckmedia', 'EventCategoriesController@storeCKEditorImages')->name('event-categories.storeCKEditorImages');
    Route::post('event-categories/parse-csv-import', 'EventCategoriesController@parseCsvImport')->name('event-categories.parseCsvImport');
    Route::post('event-categories/process-csv-import', 'EventCategoriesController@processCsvImport')->name('event-categories.processCsvImport');
    Route::resource('event-categories', 'EventCategoriesController');

    // Eventuserstatus
    Route::delete('eventuserstatuses/destroy', 'EventuserstatusController@massDestroy')->name('eventuserstatuses.massDestroy');
    Route::post('eventuserstatuses/parse-csv-import', 'EventuserstatusController@parseCsvImport')->name('eventuserstatuses.parseCsvImport');
    Route::post('eventuserstatuses/process-csv-import', 'EventuserstatusController@processCsvImport')->name('eventuserstatuses.processCsvImport');
    Route::resource('eventuserstatuses', 'EventuserstatusController');

    // Eventjoiningusers
    Route::delete('eventjoiningusers/destroy', 'EventjoiningusersController@massDestroy')->name('eventjoiningusers.massDestroy');
    Route::post('eventjoiningusers/parse-csv-import', 'EventjoiningusersController@parseCsvImport')->name('eventjoiningusers.parseCsvImport');
    Route::post('eventjoiningusers/process-csv-import', 'EventjoiningusersController@processCsvImport')->name('eventjoiningusers.processCsvImport');
    Route::resource('eventjoiningusers', 'EventjoiningusersController');

    // Event Discussion
    Route::delete('event-discussions/destroy', 'EventDiscussionController@massDestroy')->name('event-discussions.massDestroy');
    Route::post('event-discussions/media', 'EventDiscussionController@storeMedia')->name('event-discussions.storeMedia');
    Route::post('event-discussions/ckmedia', 'EventDiscussionController@storeCKEditorImages')->name('event-discussions.storeCKEditorImages');
    Route::resource('event-discussions', 'EventDiscussionController');

    // Projects
    Route::delete('projects/destroy', 'ProjectsController@massDestroy')->name('projects.massDestroy');
    Route::post('projects/media', 'ProjectsController@storeMedia')->name('projects.storeMedia');
    Route::post('projects/ckmedia', 'ProjectsController@storeCKEditorImages')->name('projects.storeCKEditorImages');
    Route::post('projects/parse-csv-import', 'ProjectsController@parseCsvImport')->name('projects.parseCsvImport');
    Route::post('projects/process-csv-import', 'ProjectsController@processCsvImport')->name('projects.processCsvImport');
    Route::resource('projects', 'ProjectsController');

    // Real Estate Units
    Route::delete('real-estate-units/destroy', 'RealEstateUnitsController@massDestroy')->name('real-estate-units.massDestroy');
    Route::post('real-estate-units/media', 'RealEstateUnitsController@storeMedia')->name('real-estate-units.storeMedia');
    Route::post('real-estate-units/ckmedia', 'RealEstateUnitsController@storeCKEditorImages')->name('real-estate-units.storeCKEditorImages');
    Route::post('real-estate-units/parse-csv-import', 'RealEstateUnitsController@parseCsvImport')->name('real-estate-units.parseCsvImport');
    Route::post('real-estate-units/process-csv-import', 'RealEstateUnitsController@processCsvImport')->name('real-estate-units.processCsvImport');
    Route::resource('real-estate-units', 'RealEstateUnitsController');

    // Real Estate Applications
    Route::delete('real-estate-applications/destroy', 'RealEstateApplicationsController@massDestroy')->name('real-estate-applications.massDestroy');
    Route::post('real-estate-applications/parse-csv-import', 'RealEstateApplicationsController@parseCsvImport')->name('real-estate-applications.parseCsvImport');
    Route::post('real-estate-applications/process-csv-import', 'RealEstateApplicationsController@processCsvImport')->name('real-estate-applications.processCsvImport');
    Route::resource('real-estate-applications', 'RealEstateApplicationsController');

    // Applications Request Sections
    Route::delete('applications-request-sections/destroy', 'ApplicationsRequestSectionsController@massDestroy')->name('applications-request-sections.massDestroy');
    Route::post('applications-request-sections/media', 'ApplicationsRequestSectionsController@storeMedia')->name('applications-request-sections.storeMedia');
    Route::post('applications-request-sections/ckmedia', 'ApplicationsRequestSectionsController@storeCKEditorImages')->name('applications-request-sections.storeCKEditorImages');
    Route::post('applications-request-sections/parse-csv-import', 'ApplicationsRequestSectionsController@parseCsvImport')->name('applications-request-sections.parseCsvImport');
    Route::post('applications-request-sections/process-csv-import', 'ApplicationsRequestSectionsController@processCsvImport')->name('applications-request-sections.processCsvImport');
    Route::resource('applications-request-sections', 'ApplicationsRequestSectionsController');

    // Real Estate Types
    Route::delete('real-estate-types/destroy', 'RealEstateTypesController@massDestroy')->name('real-estate-types.massDestroy');
    Route::post('real-estate-types/media', 'RealEstateTypesController@storeMedia')->name('real-estate-types.storeMedia');
    Route::post('real-estate-types/ckmedia', 'RealEstateTypesController@storeCKEditorImages')->name('real-estate-types.storeCKEditorImages');
    Route::post('real-estate-types/parse-csv-import', 'RealEstateTypesController@parseCsvImport')->name('real-estate-types.parseCsvImport');
    Route::post('real-estate-types/process-csv-import', 'RealEstateTypesController@processCsvImport')->name('real-estate-types.processCsvImport');
    Route::resource('real-estate-types', 'RealEstateTypesController');

    // Payment Methods
    Route::delete('payment-methods/destroy', 'PaymentMethodsController@massDestroy')->name('payment-methods.massDestroy');
    Route::post('payment-methods/media', 'PaymentMethodsController@storeMedia')->name('payment-methods.storeMedia');
    Route::post('payment-methods/ckmedia', 'PaymentMethodsController@storeCKEditorImages')->name('payment-methods.storeCKEditorImages');
    Route::post('payment-methods/parse-csv-import', 'PaymentMethodsController@parseCsvImport')->name('payment-methods.parseCsvImport');
    Route::post('payment-methods/process-csv-import', 'PaymentMethodsController@processCsvImport')->name('payment-methods.processCsvImport');
    Route::resource('payment-methods', 'PaymentMethodsController');

    // Available For Mortgages
    Route::delete('available-for-mortgages/destroy', 'AvailableForMortgagesController@massDestroy')->name('available-for-mortgages.massDestroy');
    Route::post('available-for-mortgages/media', 'AvailableForMortgagesController@storeMedia')->name('available-for-mortgages.storeMedia');
    Route::post('available-for-mortgages/ckmedia', 'AvailableForMortgagesController@storeCKEditorImages')->name('available-for-mortgages.storeCKEditorImages');
    Route::post('available-for-mortgages/parse-csv-import', 'AvailableForMortgagesController@parseCsvImport')->name('available-for-mortgages.parseCsvImport');
    Route::post('available-for-mortgages/process-csv-import', 'AvailableForMortgagesController@processCsvImport')->name('available-for-mortgages.processCsvImport');
    Route::resource('available-for-mortgages', 'AvailableForMortgagesController');

    // Realstate Purposes
    Route::delete('realstate-purposes/destroy', 'RealstatePurposesController@massDestroy')->name('realstate-purposes.massDestroy');
    Route::post('realstate-purposes/media', 'RealstatePurposesController@storeMedia')->name('realstate-purposes.storeMedia');
    Route::post('realstate-purposes/ckmedia', 'RealstatePurposesController@storeCKEditorImages')->name('realstate-purposes.storeCKEditorImages');
    Route::post('realstate-purposes/parse-csv-import', 'RealstatePurposesController@parseCsvImport')->name('realstate-purposes.parseCsvImport');
    Route::post('realstate-purposes/process-csv-import', 'RealstatePurposesController@processCsvImport')->name('realstate-purposes.processCsvImport');
    Route::resource('realstate-purposes', 'RealstatePurposesController');

    // Amenitie
    Route::delete('amenities/destroy', 'AmenitieController@massDestroy')->name('amenities.massDestroy');
    Route::post('amenities/media', 'AmenitieController@storeMedia')->name('amenities.storeMedia');
    Route::post('amenities/ckmedia', 'AmenitieController@storeCKEditorImages')->name('amenities.storeCKEditorImages');
    Route::post('amenities/parse-csv-import', 'AmenitieController@parseCsvImport')->name('amenities.parseCsvImport');
    Route::post('amenities/process-csv-import', 'AmenitieController@processCsvImport')->name('amenities.processCsvImport');
    Route::resource('amenities', 'AmenitieController');

    // Nears
    Route::delete('nears/destroy', 'NearsController@massDestroy')->name('nears.massDestroy');
    Route::post('nears/media', 'NearsController@storeMedia')->name('nears.storeMedia');
    Route::post('nears/ckmedia', 'NearsController@storeCKEditorImages')->name('nears.storeCKEditorImages');
    Route::post('nears/parse-csv-import', 'NearsController@parseCsvImport')->name('nears.parseCsvImport');
    Route::post('nears/process-csv-import', 'NearsController@processCsvImport')->name('nears.processCsvImport');
    Route::resource('nears', 'NearsController');

    // Book Meetings
    Route::delete('book-meetings/destroy', 'BookMeetingsController@massDestroy')->name('book-meetings.massDestroy');
    Route::resource('book-meetings', 'BookMeetingsController');

    // Like
    Route::delete('likes/destroy', 'LikeController@massDestroy')->name('likes.massDestroy');
    Route::resource('likes', 'LikeController');

    // Unit Comments
    Route::delete('unit-comments/destroy', 'UnitCommentsController@massDestroy')->name('unit-comments.massDestroy');
    Route::post('unit-comments/media', 'UnitCommentsController@storeMedia')->name('unit-comments.storeMedia');
    Route::post('unit-comments/ckmedia', 'UnitCommentsController@storeCKEditorImages')->name('unit-comments.storeCKEditorImages');
    Route::resource('unit-comments', 'UnitCommentsController');

    // Project Types
    Route::delete('project-types/destroy', 'ProjectTypesController@massDestroy')->name('project-types.massDestroy');
    Route::post('project-types/media', 'ProjectTypesController@storeMedia')->name('project-types.storeMedia');
    Route::post('project-types/ckmedia', 'ProjectTypesController@storeCKEditorImages')->name('project-types.storeCKEditorImages');
    Route::post('project-types/parse-csv-import', 'ProjectTypesController@parseCsvImport')->name('project-types.parseCsvImport');
    Route::post('project-types/process-csv-import', 'ProjectTypesController@processCsvImport')->name('project-types.processCsvImport');
    Route::resource('project-types', 'ProjectTypesController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
