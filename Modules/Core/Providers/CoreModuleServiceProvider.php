<?php
/**
 * Created by PhpStorm.
 * User: Johnny
 * Date: 30.03.2018
 * Time: 00:35
 */

namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Http\Controllers\UserController;

class CoreModuleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        require_once __DIR__ . '/../Routes/web.php';
        require_once __DIR__ . '/../Routes/api.php';
    }

    public function register()
    {

    }
}