<?php

namespace App\Http\Controllers;

use App\Http\Controllers\View\MaterialList;
use App\UseCases\GetAllMaterials;

class MaterialController extends Controller
{
  private $getAllMaterials;

  public function __construct(GetAllMaterials $getAllMaterials)
  {
    $this->getAllMaterials = $getAllMaterials;
  }

  public function index()
  {
    $materials = new MaterialList($this->getAllMaterials->execute());

    return response()->json($materials->toArray());
  }
}
