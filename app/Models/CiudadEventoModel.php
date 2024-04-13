<?php

namespace App\Models;

use CodeIgniter\Model;

class CiudadEventoModel extends Model
{
  protected $table = 'ciudades_eventos';
  protected $primaryKey = 'id';
  protected $allowedFields = ['ciudad', 'titulo', 'subtitulo', 'descripcion', 'fecha_inicio', 'fecha_fin', 'valor'];  

  public function getCiudadEventosActivos($id)
  {
    return $this->query("select cie.id, cie.ciudad id_ciudad, ciu.nombre nombre_ciudad, cie.titulo, 
                            cie.subtitulo, cie.descripcion, cie.fecha_inicio, cie.fecha_fin, cie.valor
                        from ciudades_eventos cie
                        inner join ciudades ciu on cie.ciudad = ciu.id
                        where ciu.id = " . $id)->getResultArray();
  }
  
  public function getCiudadEvento($id)
  {
    return $this->find($id);
  }

  public function getCiudadEventoDescripcion($ciudad, $titulo) 
  {
    return $this->where(["ciudad"=>$ciudad, "titulo"=>$titulo])->first();
  }
}