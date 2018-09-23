<?php

namespace App\Providers;

use App\Domain\ResourceRepositoryInterface;
use App\Persistence\ResourceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->app->singleton(ResourceRepositoryInterface::class, function () {

      // TODO: remove this when repository reads from db
      $readFromStoreFunction = function () {
        return [
          [
            '_id' => 'cu',
            'name' => 'Copper',
            'abbreviation' => 'Cu',
            'madeOf' => []
          ],
          [
            '_id' => 'c',
            'name' => 'Carbon',
            'abbreviation' => 'C',
            'madeOf' => []
          ],
          [
            '_id' => 'fe',
            'name' => 'Ferrite dust',
            'abbreviation' => 'Fe',
            'madeOf' => []
          ],
          [
            '_id' => 'fe+',
            'name' => 'Pure ferrite',
            'abbreviation' => 'Fe+',
            'madeOf' => [
              [
                'resource' => 'fe',
                'amount' => 2
              ]
            ]
          ]
        ];
      };

      return new ResourceRepository($readFromStoreFunction);
    });
  }
}
