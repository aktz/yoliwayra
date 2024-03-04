<?php

namespace App\Models;

use CodeIgniter\Model;

class IdiomaModel extends Model
{
  protected $table = 'idiomas';
  protected $primaryKey = 'id';
  protected $allowedFields = ['codigo', 'nombre', 'activo'];  

  public function getIdiomasActivos()
  {
    return $this->where('activo', 1)->findAll();
  }
  
  public function getIdiomaActivo($id)
  {
    return $this->find($id);
  }

  public function getIdiomaCodigoNombre($codigo, $nombre) 
  {
    return $this->where(["codigo"=>$codigo])->groupStart()->orWhere(["nombre"=>$nombre])->groupEnd()->where(["activo"=>0])->first();
  }
}