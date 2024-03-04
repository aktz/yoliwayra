<?php

namespace App\Models;

use CodeIgniter\Model;

class ClimaModel extends Model
{
  protected $table = 'climas';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nombre', 'activo'];

  public function getClimasActivos()
  {
    return $this->where('activo', 1)->findAll();
  }
  
  public function getClimaActivo($id)
  {
    return $this->find($id);
  }

  public function getClimaNombre($nombre) 
  {
    return $this->where(["nombre"=>$nombre])->where(["activo"=>0])->first();
  }
}