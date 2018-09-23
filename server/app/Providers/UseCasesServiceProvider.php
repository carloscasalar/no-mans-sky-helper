<?php

namespace App\Providers;

use App\UseCases\GetAllResources;
use Illuminate\Support\ServiceProvider;

class UseCasesServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->app->singleton(GetAllResources::class, GetAllResources::class);
  }
}
