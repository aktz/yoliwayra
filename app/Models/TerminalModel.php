<?php

namespace App\Models;

use CodeIgniter\Model;

class TerminalModel extends Model
{
  protected $table = 'terminales';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nombre', 'activo'];

  public function getTerminalesActivos()
  {
    return $this->where('activo', 1)->findAll();
  }
  
  public function getTerminalActivo($id)
  {
    return $this->find($id);
  }

  public function getTerminalNombre($nombre) 
  {
    return $this->where(["nombre"=>$nombre])->where(["activo"=>0])->first();
  }
}