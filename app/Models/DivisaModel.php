<?php

namespace App\Models;

use CodeIgniter\Model;

class DivisaModel extends Model
{
  protected $table = 'divisas';
  protected $primaryKey = 'id';
  protected $allowedFields = ['codigo', 'nombre', 'activo'];  

  public function getDivisasActivas()
  {
    return $this->where('activo', 1)->findAll();
  }
  
  public function getDivisaActiva($id)
  {
    return $this->find($id);
  }

  public function getDivisaCodigoNombre($codigo, $nombre) 
  {
    return $this->where(["codigo"=>$codigo])->groupStart()->orWhere(["nombre"=>$nombre])->groupEnd()->where(["activo"=>0])->first();
  }
}