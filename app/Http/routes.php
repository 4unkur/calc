<?php


Route::group(['middleware' => ['web']], function () {
    Route::resource('', AppController::class);
});
