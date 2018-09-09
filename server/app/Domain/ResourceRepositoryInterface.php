<?php

namespace App\Domain;


interface ResourceRepositoryInterface
{
  public function getAllResources():array;
}
