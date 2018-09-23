<?php

namespace App\Http\Controllers\View;

use App\Domain\Resource;

class ResourceList
{
  /**
   * @var Resource[]
   */
  private $resources;

  /**
   * ResourceList constructor.
   * @param Resource[] $resources
   */
  public function __construct(array $resources)
  {
    $this->resources = $resources;
  }

  /**
   * @return ResourceView[]
   */
  public function toArray(): array
  {
    return array_map(
      function (Resource $resource): array {
        return (new ResourceView($resource))->toArray();
      },
      $this->resources
    );
  }
}
