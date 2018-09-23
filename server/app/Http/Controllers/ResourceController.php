<?php

namespace App\Http\Controllers;

use App\Http\Controllers\View\ResourceList;
use App\UseCases\GetAllResources;

class ResourceController extends Controller
{
  private $getAllResources;

  public function __construct(GetAllResources $getAllResources)
  {
    $this->getAllResources = $getAllResources;
  }

  public function index()
  {
    $resources = new ResourceList($this->getAllResources->execute());

    return response()->json($resources->toArray());
  }
}
