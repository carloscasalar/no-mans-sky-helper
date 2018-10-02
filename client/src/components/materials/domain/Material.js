import { ingredientNameExtractor } from './Ingredient';

const COMMA = ', ';
const EMPTY_STRING = '';

export default class Material {
  constructor({
    id, name, abbreviation, ingredients = [],
  }) {
    this.id = id;
    this.name = name;
    this.abbreviation = abbreviation;
    this.ingredients = ingredients;
  }

  get composed() {
    return this.ingredients.length > 0;
  }

  get composition() {
    return this.composed ? this.ingredients
      .map(ingredientNameExtractor)
      .join(COMMA) : EMPTY_STRING;
  }
}
