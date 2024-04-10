<?php

namespace App\Models;

use CodeIgniter\Model;

class CiudadCoworkingModel extends Model
{
  protected $table = 'ciudades_bancos';
  protected $primaryKey = 'id';
  protected $allowedFields = ['ciudad', 'banco', 'descripcion', 'notas'];  

  public function getCiudadCoworkingActivos($id)
  {
    return $this->query("select cic.id, cic.ciudad id_ciudad, ciu.nombre nombre_ciudad, cic.descripcion, cic.notas
                        from ciudades_coworking cic
                        inner join ciudades ciu on cic.ciudad = ciu.id
                        where ciu.id = " . $id)->getResultArray();
  }
  
  public function getCiudadCoworking($id)
  {
    return $this->find($id);
  }

  public function getCiudadCoworkingDescripcion($ciudad, $descripcion) 
  {
    return $this->where(["ciudad"=>$ciudad, "descripcion"=>$descripcion])->first();
  }
}