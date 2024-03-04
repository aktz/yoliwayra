<?php

namespace App\Models;

use CodeIgniter\Model;

class RegionModel extends Model
{
  protected $table = 'regiones';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nombre', 'activo'];

  public function getRegionesActivas()
  {
    return $this->where('activo', 1)->findAll();
  }
  
  public function getRegionActiva($id)
  {
    return $this->find($id);
  }

  public function getRegionNombre($nombre) 
  {
    return $this->where(["nombre"=>$nombre])->where(["activo"=>0])->first();
  }
}