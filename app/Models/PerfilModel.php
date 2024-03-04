<?php

namespace App\Models;

use CodeIgniter\Model;

class PerfilModel extends Model
{
  protected $table = 'perfiles';
  protected $primaryKey = 'id';
  protected $allowedFields = ['descripcion', 'activo'];

  public function getPerfilesActivos()
  {
    return $this->where('activo', 1)->findAll();
  }
  
  public function getPerfilActivo($id)
  {
    return $this->find($id);
  }

  public function getPerfilDescripcion($descripcion) 
  {
    return $this->where(["descripcion"=>$descripcion])->where(["activo"=>0])->first();
  }
}