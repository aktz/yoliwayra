<?php

namespace App\Models;

use CodeIgniter\Model;

class CiudadTerminalModel extends Model
{
  protected $table = 'ciudades_terminales';
  protected $primaryKey = 'id';
  protected $allowedFields = ['ciudad', 'terminal', 'descripcion', 'notas'];  

  public function getCiudadTerminalesActivos($id)
  {
    return $this->query("select cia.id, cia.ciudad id_ciudad, ciu.nombre nombre_ciudad, cia.terminal id_terminal, 
                            ter.nombre nombre_terminal, cia.descripcion, cia.notas
                        from ciudades_terminales cia
                        inner join ciudades ciu on cia.ciudad = ciu.id
                        inner join terminales ter on cia.terminal = ter.id
                        where ciu.id = " . $id)->getResultArray();
  }
  
  public function getCiudadTerminal($id)
  {
    return $this->find($id);
  }

  public function getCiudadTerminalDescripcion($ciudad, $terminal, $descripcion) 
  {
    return $this->where(["ciudad"=>$ciudad, "terminal"=>$terminal, "descripcion"=>$descripcion])->first();
  }
}