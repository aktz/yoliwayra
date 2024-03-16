<?php

namespace App\Models;

use CodeIgniter\Model;

class CiudadTerminalModel extends Model
{
  protected $table = 'ciudades_terminales';
  protected $primaryKey = 'id';
  protected $allowedFields = ['ciudad', 'terminal', 'descripcion', 'notas'];  

  public function getCiudadTerminalesActivos()
  {
    return $this->query("select cit.id, cit.ciudad id_ciudad, ciu.nombre nombre_ciudad, cit.terminal id_terminal, 
                            ter.nombre nombre_terminal, cit.descripcion, cit.notas
                        from ciudades_terminales cit
                        inner join ciudades ciu on cit.ciudad = ciu.id
                        inner join terminales ter on cit.terminal = ter.id")->getResultArray();
  }
  
  public function getCiudadTerminal($id)
  {
    return $this->find($id);
  }

  public function getCiudadTerminalDescripcion($ciudad, $descripcion) 
  {
    return $this->where(["ciudad"=>$ciudad, "descripcion"=>$descripcion])->first();
  }
}