<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'usuarios',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'usuarios',
        ],
    ],

    'providers' => [
        'usuarios' => [
            'driver' => 'eloquent',
            'model' => App\Models\Usuario::class,
        ],

        // Si deseas usar el proveedor de base de datos directamente:
        // 'usuarios' => [
        //     'driver' => 'database',
        //     'table' => 'usuarios', // Cambié de 'users' a 'usuarios'
        // ],
    ],

    'passwords' => [
        'usuarios' => [ // Cambié de 'users' a 'usuarios' aquí
            'provider' => 'usuarios',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
