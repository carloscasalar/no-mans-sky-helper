const extractName = ({ name }) => name;

export default class Material {
  constructor({
    id, name, abbreviation, madeOf = [],
  }) {
    this.id = id;
    this.name = name;
    this.abbreviation = abbreviation;
    this.madeOf = madeOf.map(extractName);
  }
}
