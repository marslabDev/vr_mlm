<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Mlm Level
    Route::apiResource('mlm-levels', 'MlmLevelApiController', ['except' => ['store', 'show', 'update', 'destroy']]);

    // Dealer Student
    Route::apiResource('dealer-students', 'DealerStudentApiController', ['except' => ['store', 'show', 'update', 'destroy']]);

    // Agent Plan
    Route::post('agent-plans/media', 'AgentPlanApiController@storeMedia')->name('agent-plans.storeMedia');
    Route::apiResource('agent-plans', 'AgentPlanApiController');

    // Commission
    Route::apiResource('commissions', 'CommissionApiController');
});
