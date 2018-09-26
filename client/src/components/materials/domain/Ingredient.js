export class Ingredient {
  constructor({ amount, material }) {
    this.amount = amount;
    this.material = material;
  }
}

export const ingredientNameExtractor = ({ material: name }) => name;
