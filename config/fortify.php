<?php

use Laravel\Fortify\Fortify;

return [

    'guard' => 'web',

    'passwords' => 'users',

    'username' => 'email',

    'email' => 'email',

    'usernames' => null,

    'home' => '/',

    'redirects' => [
        'login' => '/',
        'logout' => '/',
        'password-confirm' => '/',
        'register' => null,
    ],

    'views' => false,

    'features' => [
        // Registration...
        // registration: true, // false if client users not allowed

        // Password Reset...
        // resetPasswords: true,

        // Email Verification...
        // verification: true,

        // Profile Management...
        // profileImages: false,
    ],

    'password' => [
        'min' => 8,
        'rules' => 'required|string|min:8|confirmed',
    ],

];
