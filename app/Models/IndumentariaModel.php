<?php

namespace App\Models;

use CodeIgniter\Model;

class IndumentariaModel extends Model
{
  protected $table = 'indumentarias';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nombre', 'activo'];

  public function getIndumentariasActivas()
  {
    return $this->where('activo', 1)->findAll();
  }
  
  public function getIndumentariaActiva($id)
  {
    return $this->find($id);
  }

  public function getIndumentariaNombre($nombre) 
  {
    return $this->where(["nombre"=>$nombre])->where(["activo"=>0])->first();
  }
}