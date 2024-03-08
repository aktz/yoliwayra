<?php

namespace App\Models;

use CodeIgniter\Model;

class RequerimientoModel extends Model
{
  protected $table = 'requerimientos';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nombre', 'activo'];

  public function getRequerimientosActivos()
  {
    return $this->where('activo', 1)->findAll();
  }
  
  public function getRequerimientoActivo($id)
  {
    return $this->find($id);
  }

  public function getRequerimientoNombre($nombre) 
  {
    return $this->where(["nombre"=>$nombre])->where(["activo"=>0])->first();
  }
}