<?php

namespace App\Http\Controllers\View;

use App\Domain\Ingredient;
use App\Domain\Resource;
use Illuminate\Contracts\Support\Arrayable;

class ResourceView implements Arrayable
{
  private $resource;

  public function __construct(Resource $resource)
  {
    $this->resource = $resource;
  }

  public function toArray(): array
  {
    return [
      'id' => $this->resource->getId(),
      'abbreviation' => $this->resource->getAbbreviation(),
      'name' => $this->resource->getName(),
      'madeOf' => $this->ingredientsToArray()
    ];
  }

  /**
   * @return array
   */
  public function ingredientsToArray(): array
  {
    return array_map(
      function (Ingredient $made): array {
        return [
          'amount' => $made->getAmount(),
          'resource' => $made->getResourceId()
        ];
      },
      $this->resource->getMadeOf());
  }
}
