<?php

namespace App\Models;

use CodeIgniter\Model;

class BancoModel extends Model
{
  protected $table = 'bancos';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nombre', 'oficina', 'cajero', 'corresponsal', 'activo'];

  public function getBancosActivos()
  {
    return $this->where('activo', 1)->findAll();
  }
  
  public function getBancoActivo($id)
  {
    return $this->find($id);
  }

  public function getBancoNombre($nombre) 
  {
    return $this->where(["nombre"=>$nombre])->where(["activo"=>0])->first();
  }
}