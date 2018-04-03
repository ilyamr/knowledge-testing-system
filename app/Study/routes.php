<?php

/**
 * Routing groups fro specific topics
 */

Route::group(['middleware' => 'web'], function () {

    $algorithms = [
        'rsa' => [
            'db_id' => 3,
            'controller' => 'App\Study\Controllers\RSA',
        ],
        'aes' => [
            'db_id' => 6,
            'controller' => 'App\Study\Controllers\AES',
        ],
        'caesar' => [
            'db_id' => 5,
            'controller' => 'App\Study\Controllers\Caesar',
        ],
        'md5' => [
            'db_id' => 4,
            'controller' => 'App\Study\Controllers\MD5',
        ],
        'sha1' => [
            'db_id' => 2,
            'controller' => 'App\Study\Controllers\SHA1',
        ]
    ];

    foreach ($algorithms as $slug => $algorithm) {
        $practiceRoute = $algorithm['controller'] . '@index';
        Route::match(['get', 'post'], '/' . $slug.'/practice', $practiceRoute);
        Route::match(['get', 'post'], '/' . $algorithm['db_id'] . '/practice', $practiceRoute);

        $practiceResultsRoute = $algorithm['controller'] . '@results';
        Route::match(['get', 'post'], '/' . $slug.'/practice/results', $practiceResultsRoute);
        Route::match(['get', 'post'], '/' . $algorithm['db_id'] . '/practice/results', $practiceResultsRoute);
    }
});