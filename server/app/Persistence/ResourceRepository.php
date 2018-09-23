<?php

namespace App\Persistence;

use App\Domain\Ingredient;
use App\Domain\Resource;
use App\Domain\ResourceRepositoryInterface;

class ResourceRepository implements ResourceRepositoryInterface
{
  private $readFromStore;

  public function __construct(callable $readFromStore)
  {
    $this->readFromStore = $readFromStore;
  }

  public function getAllResources(): array
  {
    $readFromStore = $this->readFromStore;
    $rawResources = $readFromStore();

    return array_map(
      function (array $resource) {
        return new Resource(
          $resource['_id'],
          $resource['name'],
          $resource['abbreviation'],
          $this->toIngredients($resource['madeOf'])
        );
      },
      $rawResources
    );
  }

  private function toIngredients(array $ingredients): array
  {
    return array_map(
      function (array $ingredient): Ingredient {
        return new Ingredient(
          $ingredient['amount'],
          $ingredient['resource']
        );
      },
      $ingredients
    );
  }
}
