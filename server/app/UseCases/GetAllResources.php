<?php

namespace App\UseCases;

use App\Domain\ResourceRepositoryInterface;

class GetAllResources
{
  private $resourceRepository;

  public function __construct(ResourceRepositoryInterface $resourceRepository)
  {
    $this->resourceRepository = $resourceRepository;
  }

  public function execute(): array
  {
    return $this->resourceRepository->getAllResources();
  }
}
