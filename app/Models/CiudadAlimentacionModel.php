<?php

namespace App\Models;

use CodeIgniter\Model;

class CiudadAlimentacionModel extends Model
{
  protected $table = 'ciudades_alimentaciones';
  protected $primaryKey = 'id';
  protected $allowedFields = ['ciudad', 'alimentacion', 'descripcion', 'notas'];  

  public function getCiudadAlimentacionesActivas()
  {
    return $this->query("select cia.id, cia.ciudad id_ciudad, ciu.nombre nombre_ciudad, cia.alimentacion id_alimentacion, 
                            ali.nombre nombre_alimentacion, cia.descripcion, cia.notas
                        from ciudades_alimentaciones cia
                        inner join ciudades ciu on cia.ciudad = ciu.id
                        inner join alimentaciones ali on cia.alimentacion = ali.id")->getResultArray();
  }
  
  public function getCiudadAlimentacion($id)
  {
    return $this->find($id);
  }

  public function getCiudadAlimentacionDescripcion($ciudad, $descripcion) 
  {
    return $this->where(["ciudad"=>$ciudad, "descripcion"=>$descripcion])->first();
  }
}