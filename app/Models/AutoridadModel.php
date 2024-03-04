<?php

namespace App\Models;

use CodeIgniter\Model;

class AutoridadModel extends Model
{
  protected $table = 'autoridades';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nombre', 'activo'];

  public function getAutoridadesActivas()
  {
    return $this->where('activo', 1)->findAll();
  }
  
  public function getAutoridadActiva($id)
  {
    return $this->find($id);
  }

  public function getAutoridadNombre($nombre) 
  {
    return $this->where(["nombre"=>$nombre])->where(["activo"=>0])->first();
  }
}