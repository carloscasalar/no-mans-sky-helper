<?php

namespace App\Http\Controllers\View;

use App\Domain\Ingredient;
use App\Domain\Material;
use Illuminate\Contracts\Support\Arrayable;

class MaterialView implements Arrayable
{
  private $material;

  public function __construct(Material $material)
  {
    $this->material = $material;
  }

  public function toArray(): array
  {
    return [
      'id' => $this->material->getId(),
      'abbreviation' => $this->material->getAbbreviation(),
      'name' => $this->material->getName(),
      'ingredients' => $this->ingredientsToArray()
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
          'material' => $made->getMaterialId()
        ];
      },
      $this->material->getMadeOf());
  }
}
