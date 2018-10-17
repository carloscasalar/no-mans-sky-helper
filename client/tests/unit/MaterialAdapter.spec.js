import MaterialAdapter from '../../src/components/materials/persistence/MaterialAdapter';

describe('Material Adapter tests', () => {
  const rawMaterialList = [
    {
      id: 'cu',
      abbreviation: 'Cu',
      name: 'Copper',
      ingredients: [],
    },
    {
      id: 'c',
      abbreviation: 'C',
      name: 'Carbon',
      ingredients: [],
    },
    {
      id: 'fe',
      abbreviation: 'Fe',
      name: 'Ferrite dust',
      ingredients: [],
    },
    {
      id: 'fe+',
      abbreviation: 'Fe+',
      name: 'Pure ferrite',
      ingredients: [
        {
          amount: 2,
          material: 'fe',
        },
      ],
    },
  ];

  test('should adapt all materials', () => {
    const materialAdapter = new MaterialAdapter(rawMaterialList);
    const materialList = materialAdapter.adapt();

    expect(materialList)
      .toEqual([{
        abbreviation: 'Cu',
        id: 'cu',
        ingredients: [],
        name: 'Copper',
      }, {
        abbreviation: 'C',
        id: 'c',
        ingredients: [],
        name: 'Carbon',
      }, {
        abbreviation: 'Fe',
        id: 'fe',
        ingredients: [],
        name: 'Ferrite dust',
      }, {
        abbreviation: 'Fe+',
        id: 'fe+',
        ingredients: [{
          amount: 2,
          material: {
            abbreviation: 'Fe',
            id: 'fe',
            ingredients: [],
            name: 'Ferrite dust',
          },
        }],
        name: 'Pure ferrite',
      }]);
  });
});

