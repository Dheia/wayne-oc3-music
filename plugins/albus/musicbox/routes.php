<?php

use Albus\MusicBox\Models\Track;

Route::group(['prefix' => 'api'], function () {
    Route::any('track/{method}', function ($method) {
        $options = [];
        if (!empty(Input::all())) {
            $options = Input::all();
        }
        return Track::listFrontEnd($options, $method);
    });
});