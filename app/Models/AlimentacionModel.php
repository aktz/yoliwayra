<?php

namespace App\Models;

use CodeIgniter\Model;

class AlimentacionModel extends Model
{
  protected $table = 'alimentaciones';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nombre', 'activo'];

  public function getAlimentacionesActivas()
  {
    return $this->where('activo', 1)->findAll();
  }
  
  public function getAlimentacionActiva($id)
  {
    return $this->find($id);
  }

  public function getAlimentacionNombre($nombre) 
  {
    return $this->where(["nombre"=>$nombre])->where(["activo"=>0])->first();
  }
}