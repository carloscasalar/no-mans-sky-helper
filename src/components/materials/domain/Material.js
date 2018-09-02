const COMMA = ', ';
const EMPTY_STRING = '';

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

  get composed() {
    return this.madeOf.length > 0;
  }

  get composition() {
    return this.composed ? this.madeOf.join(COMMA) : EMPTY_STRING;
  }
}
