<?php

namespace AcessoWeb\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AcessoWebProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        Config::set('database.connections.acesso_web', [
            'driver' => env('DB_CONNECTION_AW', 'mysql'),
            'host' => env('DB_HOST_AW', '127.0.0.1'),
            'port' => env('DB_PORT_AW', '3306'),
            'database' => env('DB_DATABASE_AW', 'forge'),
            'username' => env('DB_USERNAME_AW', 'forge'),
            'password' => env('DB_PASSWORD_AW', ''),
            'unix_socket' => env('DB_SOCKET_AW', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ]);
    }
}
