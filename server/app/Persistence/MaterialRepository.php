<?php

namespace App\Persistence;

use App\Domain\Ingredient;
use App\Domain\Material;
use App\Domain\MaterialRepositoryInterface;

class MaterialRepository implements MaterialRepositoryInterface
{
  private $readFromStore;

  public function __construct(callable $readFromStore)
  {
    $this->readFromStore = $readFromStore;
  }

  public function getAllMaterials(): array
  {
    $readFromStore = $this->readFromStore;
    $rawMaterials = $readFromStore();

    return array_map(
      function (array $resource) {
        return new Material(
          $resource['_id'],
          $resource['name'],
          $resource['abbreviation'],
          $this->toIngredients($resource['madeOf'])
        );
      },
      $rawMaterials
    );
  }

  private function toIngredients(array $ingredients): array
  {
    return array_map(
      function (array $ingredient): Ingredient {
        return new Ingredient(
          $ingredient['amount'],
          $ingredient['material']
        );
      },
      $ingredients
    );
  }
}
