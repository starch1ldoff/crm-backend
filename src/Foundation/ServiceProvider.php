<?php
namespace App\Foundation;

use App\Services\Admin\Providers\AdminServiceProvider;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->app->register(AdminServiceProvider::class);
    }
}
