<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'super-admin' => [
            'driver' => 'session',
            'provider' => 'super-admins'
        ],
        'super-admin-api' => [
            'driver' => 'passport',
            'provider' => 'super-admins'
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins'
        ],
        'admin-api' => [
            'driver' => 'passport',
            'provider' => 'admins'
        ],
        'sales-manager' => [
            'driver' => 'session',
            'provider' => 'sales-managers'
        ],
        'sales-manager-api' => [
            'driver' => 'passport',
            'provider' => 'sales-managers'
        ],
        'sales' => [
            'driver' => 'session',
            'provider' => 'sales'
        ],
        'sales-api' => [
            'driver' => 'passport',
            'provider' => 'sales'
        ],
        'distributor' => [
            'driver' => 'session',
            'provider' => 'distributors'
        ],
        'distributor-api' => [
            'driver' => 'passport',
            'provider' => 'distributors'
        ],
        'sub-distributor' => [
            'driver' => 'passport',
            'provider' => 'sub-distributors'
        ],
        'retailer' => [
            'driver' => 'passport',
            'provider' => 'retailers'
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'super-admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\SuperAdmin::class
        ],
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class
        ],
        'sales-managers' => [
            'driver' => 'eloquent',
            'model' => App\Models\SalesManager::class
        ],
        'sales' => [
            'driver' => 'eloquent',
            'model' => App\Models\Sales::class
        ],
        'distributors' => [
            'driver' => 'eloquent',
            'model' => App\Models\Distributor::class
        ],
        'sub-distributors' => [
            'driver' => 'eloquent',
            'model' => App\Models\SubDistributor::class
        ],
        'retailers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Retailer::class
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'super-admins' => [
            'provider' => 'super-admins',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the amount of seconds before a password confirmation
    | times out and the user is prompted to re-enter their password via the
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */

    'password_timeout' => 10800,

];
