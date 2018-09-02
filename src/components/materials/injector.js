import MaterialRepository from './persistence/MaterialRepository';
import GetAllMaterials from './use-cases/GetAllMaterials';

export const materialRepository = new MaterialRepository();
export const getAllMaterials = new GetAllMaterials(materialRepository);
