<?php

namespace App\Models;

use CodeIgniter\Model;

class CiudadEmbajadaModel extends Model
{
  protected $table = 'ciudades_embajadas';
  protected $primaryKey = 'id';
  protected $allowedFields = ['ciudad', 'embajada', 'descripcion', 'notas'];  

  public function getCiudadEmbajadasActivas()
  {
    return $this->query("select cie.id, cie.ciudad id_ciudad, ciu.nombre nombre_ciudad, cie.embajada id_embajada, 
                            emb.nombre nombre_embajada, cie.descripcion, cie.notas
                        from ciudades_embajadas cie
                        inner join ciudades ciu on cie.ciudad = ciu.id
                        inner join embajadas emb on cie.embajada = emb.id")->getResultArray();
  }
  
  public function getCiudadEmbajada($id)
  {
    return $this->find($id);
  }

  public function getCiudadEmbajadaDescripcion($ciudad, $descripcion) 
  {
    return $this->where(["ciudad"=>$ciudad, "descripcion"=>$descripcion])->first();
  }
}