<?php

namespace App\Models;

use CodeIgniter\Model;

class CiudadAtraccionModel extends Model
{
  protected $table = 'ciudades_atracciones';
  protected $primaryKey = 'id';
  protected $allowedFields = ['ciudad', 'atraccion', 'descripcion', 'notas'];  

  public function getCiudadAtraccionesActivos()
  {
    return $this->query("select cia.id, cia.ciudad id_ciudad, ciu.nombre nombre_ciudad, cia.atraccion id_atraccion, 
                            atr.nombre nombre_atraccion, cia.descripcion, cia.notas
                        from ciudades_atracciones cia
                        inner join ciudades ciu on cia.ciudad = ciu.id
                        inner join atracciones atr on cia.atraccion = atr.id")->getResultArray();
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