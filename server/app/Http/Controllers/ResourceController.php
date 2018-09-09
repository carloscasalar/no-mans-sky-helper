<?php

namespace App\Http\Controllers;

class ResourceController extends Controller
{
  private $resources;

  public function __construct()
  {
    $this->resources = $this->getResources();
  }

  public function index()
  {
    return response()->json($this->resources);
  }

  private function getResources(): array
  {
    return [
      [
        '_id' => 'cu',
        'name' => 'Copper',
        'abbreviation' => 'Cu',
        'madeOf' => []
      ],
      [
        '_id' => 'c',
        'name' => 'Carbon',
        'abbreviation' => 'C',
        'madeOf' => []
      ],
      [
        '_id' => 'fe',
        'name' => 'Ferrite dust',
        'abbreviation' => 'Fe',
        'madeOf' => []
      ],
      [
        '_id' => 'fe+',
        'name' => 'Pure ferrite',
        'abbreviation' => 'Fe+',
        'madeOf' => ['fe']
      ]
    ];
  }
}
