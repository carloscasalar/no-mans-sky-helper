import MaterialRepositoryI from '../domain/MaterialRepositoryI';

class GetAllMaterials {
  constructor(materialRepository = new MaterialRepositoryI()) {
    this.materialRepository = materialRepository;
  }

  async execute() {
    return this.materialRepository.getMaterials();
  }
}

export default GetAllMaterials;
