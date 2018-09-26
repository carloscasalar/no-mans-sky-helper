<?php

namespace App\Domain;

class Ingredient
{
  private $amount;
  private $materialId;

  public function __construct(int $amount, string $materialId)
  {
    $this->amount = $amount;
    $this->materialId = $materialId;
  }

  /**
   * @return int
   */
  public function getAmount(): int
  {
    return $this->amount;
  }

  /**
   * @return string
   */
  public function getMaterialId(): string
  {
    return $this->materialId;
  }

}
