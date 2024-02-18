<?php

//, 'middleware' => ['auth:sanctum']
Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin'], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Settings
    Route::post('settings/media', 'SettingsApiController@storeMedia')->name('settings.storeMedia');
    Route::apiResource('settings', 'SettingsApiController');

    // Countries
    Route::apiResource('countries', 'CountriesApiController');

    // Cities
    Route::apiResource('cities', 'CitiesApiController');

    // Regions
    Route::apiResource('regions', 'RegionsApiController');

    // Testimonials
    Route::post('testimonials/media', 'TestimonialsApiController@storeMedia')->name('testimonials.storeMedia');
    Route::apiResource('testimonials', 'TestimonialsApiController');

    // Newsletter
    Route::apiResource('newsletters', 'NewsletterApiController');

    // Pages
    Route::post('pages/media', 'PagesApiController@storeMedia')->name('pages.storeMedia');
    Route::apiResource('pages', 'PagesApiController');

    // Contactus
    Route::apiResource('contactus', 'ContactusApiController');

    // View
    Route::apiResource('views', 'ViewApiController');

    // Finish Type
    Route::get('finish-types', 'FinishTypeApiController@index');

    // Slider
    Route::get('sliders', 'SliderApiController');

    // Services
    Route::post('services/media', 'ServicesApiController@storeMedia')->name('services.storeMedia');
    Route::apiResource('services', 'ServicesApiController');

    // Events
    Route::post('events/media', 'EventsApiController@storeMedia')->name('events.storeMedia');
    Route::apiResource('events', 'EventsApiController');

    // Eventtags
    Route::apiResource('eventtags', 'EventtagsApiController');

    // Event Categories
    Route::apiResource('event-categories', 'EventCategoriesApiController');

    // Eventuserstatus
    Route::apiResource('eventuserstatuses', 'EventuserstatusApiController');

    // Eventjoiningusers
    Route::apiResource('eventjoiningusers', 'EventjoiningusersApiController');

    // Event Discussion
    Route::post('event-discussions/media', 'EventDiscussionApiController@storeMedia')->name('event-discussions.storeMedia');
    Route::apiResource('event-discussions', 'EventDiscussionApiController');

    // Projects
    Route::post('projects/media', 'ProjectsApiController@storeMedia')->name('projects.storeMedia');
    Route::get('all-projects', 'ProjectsApiController@siteProjects');
    Route::get('project/{id}', 'ProjectsApiController@siteProjectDetails');
    Route::get('project/units/{id}', 'ProjectsApiController@siteProjectUnits');

    // Real Estate Units
    Route::post('real-estate-units/media', 'RealEstateUnitsApiController@storeMedia')->name('real-estate-units.storeMedia');
    Route::apiResource('real-estate-units', 'RealEstateUnitsApiController');
    Route::post('store-appointment', 'RealEstateUnitsApiController@storeAppointment');

    // Real Estate Applications
    Route::apiResource('real-estate-applications', 'RealEstateApplicationsApiController');

    // Applications Request Sections
    Route::get('applications-request-sections', 'ApplicationsRequestSectionsApiController@index');

    // Real Estate Types
    Route::get('real-estate-types', 'RealEstateTypesApiController@index');

    // Payment Methods
    Route::get('payment-methods', 'PaymentMethodsApiController@index');

    // Available For Mortgages
    Route::get('available-for-mortgages', 'AvailableForMortgagesApiController@index');

    // Realstate Purposes
    Route::get('realstate-purposes', 'RealstatePurposesApiController@index');

    // Amenitie
    Route::get('amenities', 'AmenitieApiController@index');

    // Nears
    Route::get('nears', 'NearsApiController@index');

    //////////////////////////////////////////////////////////////
    Route::post('login', 'AuthController@login');
    Route::get('main_types', 'AuthController@mainTypes');
    Route::get('user_types/{id}', 'AuthController@userTypes');
    Route::post('/register', 'AuthController@register');
    Route::post('/request-forgot-password-step-one', 'AuthController@requestForgotPasswordStepOne');
    Route::post('/send-another-forgot-password-code', 'AuthController@sendAnotherCode');
    Route::post('/request-forgot-password-step-two', 'AuthController@requestForgotPasswordStepTwo');

    Route::group(['middleware' =>  'jwt.auth'], function () {
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::get('me', 'AuthController@me');
        Route::apiResource('projects', 'ProjectsApiController');

        Route::put('changePassword', 'AuthController@changePassword');
        Route::put('/complete_profile_data', 'AuthController@completeProfileData');

        // Book Meetings
        Route::apiResource('book-meetings', 'BookMeetingsApiController');

        // Like
        Route::apiResource('likes', 'LikeApiController');

        // Unit Comments
        Route::post('unit-comments/media', 'UnitCommentsApiController@storeMedia')->name('unit-comments.storeMedia');
        Route::apiResource('unit-comments', 'UnitCommentsApiController');
    });
    /////////////////////////////////////////////////////////////
});