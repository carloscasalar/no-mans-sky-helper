<?php

namespace App\Domain;


class Material
{
  private $id;
  private $name;
  private $abbreviation;
  private $madeOf;

  public function __construct(string $id, string $name, string $abbreviation, array $madeOf)
  {
    $this->id = $id;
    $this->name = $name;
    $this->abbreviation = $abbreviation;
    $this->madeOf = $madeOf;
  }

  /**
   * @return string
   */
  public function getId(): string
  {
    return $this->id;
  }

  /**
   * @return string
   */
  public function getName(): string
  {
    return $this->name;
  }

  /**
   * @return string
   */
  public function getAbbreviation(): string
  {
    return $this->abbreviation;
  }

  /**
   * @return Ingredient[]
   */
  public function getMadeOf(): array
  {
    return $this->madeOf;
  }

}
