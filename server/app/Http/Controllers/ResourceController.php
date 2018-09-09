<?php

namespace App\Http\Controllers;

use App\Domain\ResourceRepositoryInterface;

class ResourceController extends Controller
{
  private $repository;

  public function __construct(ResourceRepositoryInterface $resourceRepository)
  {
    $this->repository = $resourceRepository;
  }

  public function index()
  {
    return response()->json($this->repository->getAllResources());
  }
}
