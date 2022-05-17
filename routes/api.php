<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Mlm Packages
    Route::post('mlm-packages/media', 'MlmPackagesApiController@storeMedia')->name('mlm-packages.storeMedia');
    Route::apiResource('mlm-packages', 'MlmPackagesApiController');

    // Mlm Level
    Route::apiResource('mlm-levels', 'MlmLevelApiController', ['except' => ['store', 'show', 'update', 'destroy']]);
});
