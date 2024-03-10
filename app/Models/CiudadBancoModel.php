<?php

namespace App\Models;

use CodeIgniter\Model;

class CiudadBancoModel extends Model
{
  protected $table = 'ciudades_bancos';
  protected $primaryKey = 'id';
  protected $allowedFields = ['ciudad', 'banco', 'descripcion', 'notas'];  

  public function getCiudadBancosActivos()
  {
    return $this->query("select cib.id, cib.ciudad id_ciudad, ciu.nombre nombre_ciudad, cib.banco id_banco, 
                            ban.nombre nombre_banco, cib.descripcion, cib.notas
                        from ciudades_bancos cib
                        inner join ciudades ciu on cib.ciudad = ciu.id
                        inner join bancos ban on cib.banco = ban.id")->getResultArray();
  }
  
  public function getCiudadBanco($id)
  {
    return $this->find($id);
  }

  public function getCiudadBancoDescripcion($ciudad, $descripcion) 
  {
    return $this->where(["ciudad"=>$ciudad, "descripcion"=>$descripcion])->first();
  }
}