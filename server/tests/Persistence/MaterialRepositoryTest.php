<?php

use App\Domain\Ingredient;
use App\Domain\Material;
use App\Persistence\MaterialRepository;

class MaterialRepositoryTest extends TestCase
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
  public function getAllMaterials_should_return_an_array_with_all_materials_in_the_store()
  {
    $rawMaterialResolverMock = function () {
      return [
        [
          '_id' => self::FERRITE_DUST_ID,
          'name' => self::FERRITE_DUST,
          'abbreviation' => self::FERRITE_DUST_ABBREVIATION,
          'ingredients' => []
        ],
        [
          '_id' => self::PURE_FERRITE_ID,
          'name' => self::PURE_FERRITE,
          'abbreviation' => self::PURE_FERRITE_ABBREVIATION,
          'ingredients' => [
            [
              'material' => self::FERRITE_DUST_ID,
              'amount' => self::AMOUNT_OF_TWO
            ]
          ]
        ]
      ];
    };

    $repository = new MaterialRepository($rawMaterialResolverMock);

    $expectedMaterialsCollection = [
      new Material(self::FERRITE_DUST_ID, self::FERRITE_DUST, self::FERRITE_DUST_ABBREVIATION, self::NO_INGREDIENTS),
      new Material(
        self::PURE_FERRITE_ID,
        self::PURE_FERRITE,
        self::PURE_FERRITE_ABBREVIATION,
        [new Ingredient(self::AMOUNT_OF_TWO, self::FERRITE_DUST_ID)]
      )
    ];

    $this->assertEquals($expectedMaterialsCollection, $repository->getAllMaterials());
  }
}
