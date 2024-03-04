<?php

namespace App\Models;

use CodeIgniter\Model;

class AccesoModel extends Model
{
  protected $table = 'accesos';
  protected $primaryKey = 'id';
  protected $allowedFields = ['codigo', 'nombre', 'activo'];  

  public function getAccesosActivos()
  {
    return $this->where('activo', 1)->findAll();
  }
  
  public function getAccesoActivo($id)
  {
    return $this->find($id);
  }

  public function getAccesoCodigoNombre($codigo, $nombre) 
  {
    return $this->where(["codigo"=>$codigo])->groupStart()->orWhere(["nombre"=>$nombre])->groupEnd()->where(["activo"=>0])->first();
  }
}