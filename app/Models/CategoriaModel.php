<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{
  protected $table = 'categorias';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nombre', 'activo'];

  public function getCategoriasActivas()
  {
    return $this->where('activo', 1)->findAll();
  }
  
  public function getCategoriaActiva($id)
  {
    return $this->find($id);
  }

  public function getCategoriaNombre($nombre) 
  {
    return $this->where(["nombre"=>$nombre])->where(["activo"=>0])->first();
  }
}