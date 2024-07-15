<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;
use App\Filters\CORS;

class Filters extends BaseConfig
{
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'cors'          => CORS::class,
    ];

    public array $globals = [
        'before' => [],
        'after' => [
            'toolbar',

        ],
    ];

    public array $methods = [];

    public array $filters = [
        'cors' => [ // Terapkan filter CORS pada seluruh controller yang menggunakan properti $filters
            'before' => ['*'], // Sebelum eksekusi semua method
            'after'  => ['*'], // Setelah eksekusi semua method
        ],
    ];
}
