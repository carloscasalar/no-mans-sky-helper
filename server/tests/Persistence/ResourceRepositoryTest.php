<?php

use App\Domain\Ingredient;
use App\Domain\Resource;
use App\Persistence\ResourceRepository;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ResourceRepositoryTest extends TestCase
{
  const FERRITE_DUST_ID = 'fe';
  const FERRITE_DUST = 'Ferrite dust';
  const FERRITE_DUST_ABBREVIATION = 'Fe';
  const PURE_FERRITE = 'Pure ferrite';
  const PURE_FERRITE_ID = 'fe+';
  const PURE_FERRITE_ABBREVIATION = 'Fe+';
  const AMOUNT_OF_TWO = 2;
  const NO_INGREDIENTS = [];

  /**
   * @test
   */
  public function getAllResources_should_return_an_array_with_all_resources_in_the_store()
  {
    $rawResourcesResolverMock = function () {
      return [
        [
          '_id' => self::FERRITE_DUST_ID,
          'name' => self::FERRITE_DUST,
          'abbreviation' => self::FERRITE_DUST_ABBREVIATION,
          'madeOf' => []
        ],
        [
          '_id' => self::PURE_FERRITE_ID,
          'name' => self::PURE_FERRITE,
          'abbreviation' => self::PURE_FERRITE_ABBREVIATION,
          'madeOf' => [
            [
              'resource' => self::FERRITE_DUST_ID,
              'amount' => self::AMOUNT_OF_TWO
            ]
          ]
        ]
      ];
    };

    $repository = new ResourceRepository($rawResourcesResolverMock);

    $expectedResourcesCollection = [
      new Resource(self::FERRITE_DUST_ID, self::FERRITE_DUST, self::FERRITE_DUST_ABBREVIATION, self::NO_INGREDIENTS),
      new Resource(
        self::PURE_FERRITE_ID,
        self::PURE_FERRITE,
        self::PURE_FERRITE_ABBREVIATION,
        [new Ingredient(self::AMOUNT_OF_TWO, self::FERRITE_DUST_ID)]
      )
    ];

    $this->assertEquals($expectedResourcesCollection, $repository->getAllResources());
  }
}
