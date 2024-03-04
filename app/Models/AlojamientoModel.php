<?php

namespace App\Models;

use CodeIgniter\Model;

class AlojamientoModel extends Model
{
  protected $table = 'alojamientos';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nombre', 'activo'];

  public function getAlojamientosActivos()
  {
    return $this->where('activo', 1)->findAll();
  }
  
  public function getAlojamientoActivo($id)
  {
    return $this->find($id);
  }

  public function getAlojamientoNombre($nombre) 
  {
    return $this->where(["nombre"=>$nombre])->where(["activo"=>0])->first();
  }
}