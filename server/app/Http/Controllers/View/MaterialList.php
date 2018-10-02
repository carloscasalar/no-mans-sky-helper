<?php

namespace App\Http\Controllers\View;

use App\Domain\Material;

class MaterialList
{
  /**
   * @var Material[]
   */
  private $materials;

  /**
   * MaterialList constructor.
   * @param Material[] $materials
   */
  public function __construct(array $materials)
  {
    $this->materials = $materials;
  }

  /**
   * @return MaterialView[]
   */
  public function toArray(): array
  {
    return array_map(
      function (Material $material): array {
        return (new MaterialView($material))->toArray();
      },
      $this->materials
    );
  }
}
