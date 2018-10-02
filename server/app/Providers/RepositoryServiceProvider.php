<?php

namespace App\Providers;

use App\Domain\MaterialRepositoryInterface;
use App\Persistence\MaterialRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->app->singleton(MaterialRepositoryInterface::class, function () {

      // TODO: remove this when repository reads from db
      $readFromStoreFunction = function () {
        return [
          [
            '_id' => 'cu',
            'name' => 'Copper',
            'abbreviation' => 'Cu',
            'ingredients' => []
          ],
          [
            '_id' => 'c',
            'name' => 'Carbon',
            'abbreviation' => 'C',
            'ingredients' => []
          ],
          [
            '_id' => 'fe',
            'name' => 'Ferrite dust',
            'abbreviation' => 'Fe',
            'ingredients' => []
          ],
          [
            '_id' => 'fe+',
            'name' => 'Pure ferrite',
            'abbreviation' => 'Fe+',
            'ingredients' => [
              [
                'material' => 'fe',
                'amount' => 2
              ]
            ]
          ]
        ];
      };

      return new MaterialRepository($readFromStoreFunction);
    });
  }
}
