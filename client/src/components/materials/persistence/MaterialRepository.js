import MaterialRepositoryI from '../domain/MaterialRepositoryI';
import MaterialAdapter from './MaterialAdapter';

const baseUrl = process.env.VUE_APP_BACKEND_URL_BASE;

export default class MaterialRepository extends MaterialRepositoryI {
  async getMaterials() {
    try {
      const response = await fetch(this.materialUrl);
      const materialsData = await response.json();
      const materialAdapter = new MaterialAdapter(materialsData);

      return materialAdapter.adapt();
    } catch (e) {
      console.log('unexpected error retrieving material list', e);
      throw e;
    }
  }
  // eslint-disable-next-line class-methods-use-this
  get materialUrl() {
    return `${baseUrl}/materials`;
  }
}
