<?php

namespace App\Providers;

use App\UseCases\GetAllMaterials;
use Illuminate\Support\ServiceProvider;

class UseCasesServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->app->singleton(GetAllMaterials::class, GetAllMaterials::class);
  }
}
