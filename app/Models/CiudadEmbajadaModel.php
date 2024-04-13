<?php

namespace App\Models;

use CodeIgniter\Model;

class CiudadEmbajadaModel extends Model
{
  protected $table = 'ciudades_embajadas';
  protected $primaryKey = 'id';
  protected $allowedFields = ['ciudad', 'embajada', 'descripcion', 'notas'];  

  public function getCiudadEmbajadasActivos($id)
  {
    return $this->query("select cia.id, cia.ciudad id_ciudad, ciu.nombre nombre_ciudad, cia.embajada id_embajada, 
                            emb.nombre nombre_embajada, cia.descripcion, cia.notas
                        from ciudades_embajadas cia
                        inner join ciudades ciu on cia.ciudad = ciu.id
                        inner join embajadas emb on cia.embajada = emb.id
                        where ciu.id = " . $id)->getResultArray();
  }
  
  public function getCiudadEmbajada($id)
  {
    return $this->find($id);
  }

  public function getCiudadEmbajadaDescripcion($ciudad, $embajada, $descripcion) 
  {
    return $this->where(["ciudad"=>$ciudad, "embajada"=>$embajada, "descripcion"=>$descripcion])->first();
  }
}