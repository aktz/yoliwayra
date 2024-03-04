<?php

namespace App\Models;

use CodeIgniter\Model;

class PaisModel extends Model
{
  protected $table = 'paises';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nombre', 'activo'];

  public function getPaisesActivos()
  {
    return $this->where('activo', 1)->findAll();
  }
  
  public function getPaisActivo($id)
  {
    return $this->find($id);
  }

  public function getPaisNombre($nombre) 
  {
    return $this->where(["nombre"=>$nombre])->where(["activo"=>0])->first();
  }
}