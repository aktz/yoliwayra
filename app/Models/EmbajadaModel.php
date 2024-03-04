<?php

namespace App\Models;

use CodeIgniter\Model;

class EmbajadaModel extends Model
{
  protected $table = 'embajadas';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nombre', 'consulado', 'activo'];  

  public function getEmbajadasActivas()
  {
    return $this->where('activo', 1)->findAll();
  }
  
  public function getEmbajadaActiva($id)
  {
    return $this->find($id);
  }

  public function getEmbajadaNombre($nombre) 
  {
    return $this->where(["nombre"=>$nombre])->where(["activo"=>0])->first();
  }
}