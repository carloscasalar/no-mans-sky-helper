<?php

namespace App\UseCases;

use App\Domain\MaterialRepositoryInterface;

class GetAllMaterials
{
  private $materialRepository;

  public function __construct(MaterialRepositoryInterface $materialRepository)
  {
    $this->materialRepository = $materialRepository;
  }

  public function execute(): array
  {
    return $this->materialRepository->getAllMaterials();
  }
}
