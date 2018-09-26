import Material from '../domain/Material';
import { Ingredient } from '../domain/Ingredient';

const toMaterialsWithEmptyIngredients = (rawMaterials = []) =>
  rawMaterials.map(({ id, name, abbreviation }) => new Material({ id, name, abbreviation }));

export default class MaterialAdapter {
  constructor(rawMaterials = []) {
    this.rawMaterials = rawMaterials;
    this.plainMaterials = toMaterialsWithEmptyIngredients(rawMaterials);
  }

  madeOfPropertyToIngredient({ amount, materialId }) {
    const material = this.plainMaterials.find(({ id }) => materialId === id);
    return new Ingredient({
      amount,
      material,
    });
  }

  adapt() {
    return this.rawMaterials
      .map(({
        id,
        name,
        abbreviation,
        madeOf,
      }) => {
        const ingredients = madeOf
          .map(({ amount, materialId }) => this.madeOfPropertyToIngredient({ amount, materialId }));

        return new Material({
          id, name, abbreviation, ingredients,
        });
      });
  }
}
