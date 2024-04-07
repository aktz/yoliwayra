<?php

namespace App\Models;

use CodeIgniter\Model;

class CiudadAlojamientoModel extends Model
{
  protected $table = 'ciudades_alojamientos';
  protected $primaryKey = 'id';
  protected $allowedFields = ['ciudad', 'alojamiento', 'descripcion', 'notas'];  

  public function getCiudadAlojamientosActivos($id)
  {
    return $this->query("select cia.id, cia.ciudad id_ciudad, ciu.nombre nombre_ciudad, cia.alojamiento id_alojamiento, 
                            alo.nombre nombre_alojamiento, cia.descripcion, cia.notas
                        from ciudades_alojamientos cia
                        inner join ciudades ciu on cia.ciudad = ciu.id
                        inner join alojamientos alo on cia.alojamiento = alo.id
                        where ciu.id = " . $id)->getResultArray();
  }
  
  public function getCiudadAlojamiento($id)
  {
    return $this->find($id);
  }

  public function getCiudadAlojamientoDescripcion($ciudad, $alojamiento, $descripcion) 
  {
    return $this->where(["ciudad"=>$ciudad, "alojamiento"=>$alojamiento, "descripcion"=>$descripcion])->first();
  }
}