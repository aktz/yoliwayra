<?php

namespace App\Models;

use CodeIgniter\Model;

class CiudadGuianzaModel extends Model
{
  protected $table = 'ciudades_guianzas';
  protected $primaryKey = 'id';
  protected $allowedFields = ['ciudad', 'nombre', 'descripcion', 'notas'];  

  public function getCiudadGuianzasActivas($id)
  {
    return $this->query("select cig.id, cig.ciudad id_ciudad, ciu.nombre nombre_ciudad, cig.nombre nombre_guianza, 
                            cig.descripcion, cig.notas
                        from ciudades_guianzas cig
                        inner join ciudades ciu on cig.ciudad = ciu.id
                        where ciu.id = " . $id)->getResultArray();
  }
  
  public function getCiudadGuianza($id)
  {
    return $this->find($id);
  }

  public function getCiudadGuianzaDescripcion($ciudad, $guianza) 
  {
    return $this->where(["ciudad"=>$ciudad, "nombre"=>$guianza])->first();
  }
}