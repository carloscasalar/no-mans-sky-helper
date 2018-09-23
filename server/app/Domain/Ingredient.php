<?php

namespace App\Domain;

class Ingredient
{
  private $amount;
  private $resourceId;

  public function __construct(int $amount, string $resourceId)
  {
    $this->amount = $amount;
    $this->resourceId = $resourceId;
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
  public function getResourceId(): string
  {
    return $this->resourceId;
  }

}
