<?php

namespace App\Persistence;


use App\Domain\Resource;
use App\Domain\ResourceRepositoryInterface;

class ResourceRepository implements ResourceRepositoryInterface
{

  public function getAllResources(): array
  {
    return array_map(
      function (array $resource) {
        return new Resource(
          $resource['_id'],
          $resource['name'],
          $resource['abbreviation'],
          $resource['madeOf']
          );
      },
      $this->getResources()
    );
  }

  private function getResources(): array
  {
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
  }
}
