<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'firebase' => [
            'apiKey'=> "AIzaSyDgrcPK_yUxVI8VoWOUjpPwT7MjGxmjg-w",
            'authDomain' => "crud-a4986.firebaseapp.com",
            'database_url' => "https://crud-a4986-default-rtdb.firebaseio.com/",
            'projectId'=> "crud-a4986",
            'storageBucket'=> "crud-a4986.appspot.com",
            'messagingSenderId'=> "257785480527",
            'appId'=> "1:257785480527:web:26234b9a9f663407f7313a",
            'measurementId'=> "G-SVMZ1WBHP4"
    ],

];
