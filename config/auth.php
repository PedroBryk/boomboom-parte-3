<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    */
    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    */
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'aluno' => [
            'driver' => 'session',
            'provider' => 'aluno',
        ],

        'professor' => [
            'driver' => 'session',
            'provider' => 'professor',
        ],

        'administrador' => [
            'driver' => 'session',
            'provider' => 'administrador',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    */
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'aluno' => [
            'driver' => 'eloquent',
            'model' => App\Models\Aluno::class,
        ],

        'professor' => [
            'driver' => 'eloquent',
            'model' => App\Models\Professor::class,
        ],

        'administrador' => [
            'driver' => 'eloquent',
            'model' => App\Models\Administrador::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    */
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'aluno' => [
            'provider' => 'aluno',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'professor' => [
            'provider' => 'professor',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'administrador' => [
            'provider' => 'administrador',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    */
    'password_timeout' => 10800,
];
