<?php

namespace App\Models;

use CodeIgniter\Model;

class TransporteModel extends Model
{
  protected $table = 'transportes';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nombre', 'activo'];

  public function getTransportesActivos()
  {
    return $this->where('activo', 1)->findAll();
  }
  
  public function getTransporteActivo($id)
  {
    return $this->find($id);
  }

  public function getTransporteNombre($nombre) 
  {
    return $this->where(["nombre"=>$nombre])->where(["activo"=>0])->first();
  }
}