<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Filament Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where Filament will be accessible from. You are free
    | to set this to whatever you wish, but you will need to update your
    | Fortify/fortify.php configuration if you change this value.
    |
    */

    'path' => env('FILAMENT_PATH', 'admin'),

    /*
    |--------------------------------------------------------------------------
    | Filament Domain
    |--------------------------------------------------------------------------
    |
    | You may specify the domain that Filament will be served from. This can
    | be useful if you wish to host Filament on a separate subdomain or
    | domain entirely. You may set this value to `null` to use the
    | same domain that your application is using.
    |
    */

    'domain' => env('FILAMENT_DOMAIN', null),

    /*
    |--------------------------------------------------------------------------
    | Filament Guard
    |--------------------------------------------------------------------------
    |
    | Here you may specify which authentication guard Filament will use while
    | handling users. This is particularly useful if you have multiple
    | authentication guards and need to specify which one should be
    | used by Filament.
    |
    */

    'guard' => env('FILAMENT_GUARD', 'web'),

    /*
    |--------------------------------------------------------------------------
    | Filament Middleware
    |--------------------------------------------------------------------------
    |
    | Here you may specify which middleware Filament will use while handling
    | requests. You are free to add your own middleware to this array.
    |
    */

    'middleware' => ['web'],

    /*
    |--------------------------------------------------------------------------
    | Filament Auth Middleware
    |--------------------------------------------------------------------------
    |
    | Here you may specify which authentication middleware Filament will use
    | while handling requests. You are free to add your own middleware to
    | this array.
    |
    */

    'authMiddleware' => ['auth'],

    /*
    |--------------------------------------------------------------------------
    | Filament Password Reset Middleware
    |--------------------------------------------------------------------------
    |
    | Here you may specify which middleware Filament will use when resetting
    | passwords. You are free to add your own middleware to this array.
    |
    */

    'passwordResetMiddleware' => ['guest'],

    /*
    |--------------------------------------------------------------------------
    | Filament Email Verification Middleware
    |--------------------------------------------------------------------------
    |
    | Here you may specify which middleware Filament will use when verifying
    | emails. You are free to add your own middleware to this array.
    |
    */

    'emailVerificationMiddleware' => ['verified'],

    /*
    |--------------------------------------------------------------------------
    | Filament Must Verify Email
    |--------------------------------------------------------------------------
    |
    | If enabled, users must verify their email address before accessing any
    | of Filament's routes. You are free to add your own middleware to
    | this array. If you disable this, email verification will be
    | bypassed.
    |
    */

    'mustVerifyEmail' => env('FILAMENT_MUST_VERIFY_EMAIL', false),

    /*
    |--------------------------------------------------------------------------
    | Filament Brand Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify the name of your application that will be used
    | in places like page titles, navigation, etc.
    |
    */

    'brand' => env('FILAMENT_BRAND', 'Better Process Management'),

    /*
    |--------------------------------------------------------------------------
    | Filament Avatar Provider
    |--------------------------------------------------------------------------
    |
    | This option controls how avatar URLs are generated for Filament users.
    | You may choose between 'gravatar' or 'initials'.
    |
    */

    'avatarProvider' => 'initials',

    /*
    |--------------------------------------------------------------------------
    | Filament Layout
    |--------------------------------------------------------------------------
    |
    | This option controls the layout used by Filament's admin panel.
    | Current options: 'top-nav', 'side-nav'.
    |
    */

    'layout' => 'side-nav',

    /*
    |--------------------------------------------------------------------------
    | Filament Theme
    |--------------------------------------------------------------------------
    |
    | Here you may specify which theme Filament will use. You can choose
    | between 'light' and 'dark'.
    |
    */

    'theme' => 'light',

];
