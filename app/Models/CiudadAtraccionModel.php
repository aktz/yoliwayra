<?php

namespace App\Models;

use CodeIgniter\Model;

class CiudadAtraccionModel extends Model
{
  protected $table = 'ciudades_atracciones';
  protected $primaryKey = 'id';
  protected $allowedFields = ['ciudad', 'descripcion', 'notas', 'activo'];  

  public function getCiudadAtraccionesActivas($id)
  {
    return $this->query("select cia.id, cia.ciudad id_ciudad, ciu.nombre nombre_ciudad, cia.descripcion, cia.notas, cia.activo
                        from ciudades_atracciones cia
                        inner join ciudades ciu on cia.ciudad = ciu.id
                        where ciu.id = " . $id)->getResultArray();
  }
  
  public function getCiudadAtraccion($id)
  {
    return $this->find($id);
  }

  public function getCiudadAtraccionDescripcion($ciudad, $descripcion) 
  {
    return $this->where(["ciudad"=>$ciudad, "descripcion"=>$descripcion])->first();
  }
}