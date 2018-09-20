<?php

namespace App\Providers;

use App\Domain\ResourceRepositoryInterface;
use App\Persistence\ResourceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->app->bind(ResourceRepositoryInterface::class, ResourceRepository::class);
  }
}
