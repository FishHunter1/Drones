<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'usuarios', // Cambié de 'users' a 'usuarios' para consistencia
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'usuarios', // Cambié de 'users' a 'usuarios' aquí
        ],
    ],

    'providers' => [
        'usuarios' => [ // Cambié de 'users' a 'usuarios' aquí
            'driver' => 'eloquent',
            'model' => App\Models\Usuario::class, // Cambié de App\Models\User a App\Models\Usuario
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
