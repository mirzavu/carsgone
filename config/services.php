<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'paypal' => [
        'client_id' => 'AVoT7fsR6WmhTPUOgE3bD_rpyCFZKHaSwijGWS0I-P38lpL0tnwrXEK-hPQgBriD9m1qhivWFWMlr3Et',
        'secret' => 'EHJAF7Zi-FHsVKHC_PN4GPmxTYITK2CeK3LQcH6hGuEAG_dDlV5sMNnSse6adyps1dEfazsNHSU6cd_l'
    ],


    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

];
