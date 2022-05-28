<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Settings
    Route::delete('settings/destroy', 'SettingsController@massDestroy')->name('settings.massDestroy');
    Route::resource('settings', 'SettingsController');

    // Students
    Route::delete('students/destroy', 'StudentsController@massDestroy')->name('students.massDestroy');
    Route::resource('students', 'StudentsController');

    // Mlm Level
    Route::post('mlm-levels/parse-csv-import', 'MlmLevelController@parseCsvImport')->name('mlm-levels.parseCsvImport');
    Route::post('mlm-levels/process-csv-import', 'MlmLevelController@processCsvImport')->name('mlm-levels.processCsvImport');
    Route::resource('mlm-levels', 'MlmLevelController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Agent Plan
    Route::delete('agent-plans/destroy', 'AgentPlanController@massDestroy')->name('agent-plans.massDestroy');
    Route::post('agent-plans/media', 'AgentPlanController@storeMedia')->name('agent-plans.storeMedia');
    Route::post('agent-plans/ckmedia', 'AgentPlanController@storeCKEditorImages')->name('agent-plans.storeCKEditorImages');
    Route::post('agent-plans/parse-csv-import', 'AgentPlanController@parseCsvImport')->name('agent-plans.parseCsvImport');
    Route::post('agent-plans/process-csv-import', 'AgentPlanController@processCsvImport')->name('agent-plans.processCsvImport');
    Route::resource('agent-plans', 'AgentPlanController');

    // Commission
    Route::delete('commissions/destroy', 'CommissionController@massDestroy')->name('commissions.massDestroy');
    Route::post('commissions/parse-csv-import', 'CommissionController@parseCsvImport')->name('commissions.parseCsvImport');
    Route::post('commissions/process-csv-import', 'CommissionController@processCsvImport')->name('commissions.processCsvImport');
    Route::resource('commissions', 'CommissionController');

    // Packages Commission
    Route::post('packages-commissions/parse-csv-import', 'PackagesCommissionController@parseCsvImport')->name('packages-commissions.parseCsvImport');
    Route::post('packages-commissions/process-csv-import', 'PackagesCommissionController@processCsvImport')->name('packages-commissions.processCsvImport');
    Route::resource('packages-commissions', 'PackagesCommissionController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Agent Student
    Route::post('agent-students/parse-csv-import', 'AgentStudentController@parseCsvImport')->name('agent-students.parseCsvImport');
    Route::post('agent-students/process-csv-import', 'AgentStudentController@processCsvImport')->name('agent-students.processCsvImport');
    Route::resource('agent-students', 'AgentStudentController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Commission Statement
    Route::post('commission-statements/parse-csv-import', 'CommissionStatementController@parseCsvImport')->name('commission-statements.parseCsvImport');
    Route::post('commission-statements/process-csv-import', 'CommissionStatementController@processCsvImport')->name('commission-statements.processCsvImport');
    Route::resource('commission-statements', 'CommissionStatementController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Commission Type Statement
    Route::post('commission-type-statements/parse-csv-import', 'CommissionTypeStatementController@parseCsvImport')->name('commission-type-statements.parseCsvImport');
    Route::post('commission-type-statements/process-csv-import', 'CommissionTypeStatementController@processCsvImport')->name('commission-type-statements.processCsvImport');
    Route::resource('commission-type-statements', 'CommissionTypeStatementController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
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
