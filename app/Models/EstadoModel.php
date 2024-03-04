<?php

namespace App\Models;

use CodeIgniter\Model;

class EstadoModel extends Model
{
  protected $table = 'estados';
  protected $primaryKey = 'id';
  protected $allowedFields = ['pais', 'nombre', 'activo'];  

  public function getEstadosActivos()
  {
    return $this->query("select est.id id_estado, est.pais id_pais, est.nombre nombre_estado, est.activo activo_estado, 
                          pai.nombre nombre_pais, pai.activo activo_pais
                          from estados est 
                          inner join paises pai on est.pais = pai.id
                          where est.activo = 1")->getResultArray();
  }
  
  public function getEstadoActivo($id)
  {
    return $this->find($id);
  }

  public function getEstadoNombre($codigo, $nombre) 
  {
    return $this->where(["nombre"=>$nombre, "activo"=>0])->first();
  }
}