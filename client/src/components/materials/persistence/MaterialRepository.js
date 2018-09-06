import MaterialRepositoryI from '../domain/MaterialRepositoryI';
import Material from '../domain/Material';

const getFakeListOfRawMaterials = () => new Promise((resolve) => {
  const fiveSeconds = 5000;
  setTimeout(() => {
    resolve([
      {
        id: 'c',
        name: 'Carbon',
        abbreviation: 'C',
      },
      {
        id: 'fe',
        abbreviation: 'Fe',
        name: 'Ferrite Dust',
      },
      {
        id: 'fe+',
        abbreviation: 'Fe+',
        name: 'Pure Ferrite',
        madeOf: [{
          id: 'fe',
          abbreviation: 'Fe',
          name: 'Ferrite Dust',
        }],
      },
    ]);
  }, fiveSeconds);
});

export default class MaterialRepository extends MaterialRepositoryI {
// eslint-disable-next-line class-methods-use-this
  async getMaterials() {
    try {
      const materials = await getFakeListOfRawMaterials();
      return materials.map(material => new Material(material));
    } catch (e) {
      console.log('unexpected error retrieving material list', e);
      throw e;
    }
  }
}
