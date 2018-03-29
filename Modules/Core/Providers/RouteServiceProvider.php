<?php

namespace Modules\Core\Providers;

use App\Providers\RouteServiceProvider as BaseRouteServiceProvider;

class RouteServiceProvider extends BaseRouteServiceProvider
{
    /**
     *
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     *
     */
    public function register()
    {
        parent::register();

    }

    /**
     *
     */
    public function map()
    {
        require_once __DIR__ . '/../Routes/web.php';
        require_once __DIR__ . '/../Routes/api.php';
    }


}