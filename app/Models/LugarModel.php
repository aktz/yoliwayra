<?php

namespace App\Models;

use CodeIgniter\Model;

class LugarModel extends Model
{
  protected $table = 'lugares';
  protected $primaryKey = 'id';
  protected $allowedFields = [
        'nombre', 'ciudad', 'region', 'clima', 'codigo_postal', 'titulo', 'subtitulo', 'descripcion', 
        'notas', 'ancestral', 'extremo', 'avistamiento', 'deportivo', 'valor', 'activo'
    ];

  public function getLugaresActivos()
  {
    return $this->where('activo', 1)->findAll();
  }
  
  public function getLugarActivo($id)
  {
    return $this->find($id);
  }

  public function getLugarNombreCiudad($nombre, $ciudad) 
  {
    return $this->where(["nombre"=>$nombre, "ciudad"=>$ciudad])->where(["activo"=>0])->first();
  }
}