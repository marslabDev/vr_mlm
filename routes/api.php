<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Mlm Level
    Route::apiResource('mlm-levels', 'MlmLevelApiController', ['except' => ['store', 'show', 'update', 'destroy']]);

    // Agent Plan
    Route::post('agent-plans/media', 'AgentPlanApiController@storeMedia')->name('agent-plans.storeMedia');
    Route::apiResource('agent-plans', 'AgentPlanApiController');

    // Commission
    Route::apiResource('commissions', 'CommissionApiController');

    // Packages Commission
    Route::apiResource('packages-commissions', 'PackagesCommissionApiController', ['except' => ['store', 'show', 'update', 'destroy']]);

    // Agent Student
    Route::apiResource('agent-students', 'AgentStudentApiController', ['except' => ['store', 'show', 'update', 'destroy']]);

    // Commission Statement
    Route::apiResource('commission-statements', 'CommissionStatementApiController', ['except' => ['store', 'show', 'update', 'destroy']]);

    // Commission Type Statement
    Route::apiResource('commission-type-statements', 'CommissionTypeStatementApiController', ['except' => ['store', 'show', 'update', 'destroy']]);
});
