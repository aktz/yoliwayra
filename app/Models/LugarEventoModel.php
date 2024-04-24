<?php

namespace App\Models;

use CodeIgniter\Model;

class LugarEventoModel extends Model
{
  protected $table = 'lugares_eventos';
  protected $primaryKey = 'id';
  protected $allowedFields = ['lugar', 'titulo', 'subtitulo', 'descripcion', 'fecha_inicio', 'fecha_fin', 'valor'];  

  public function getLugarEventosActivos($id)
  {
    return $this->query("select lue.id, lue.lugar id_lugar, lug.nombre nombre_lugar, lue.titulo, 
                            lue.subtitulo, lue.descripcion, lue.fecha_inicio, lue.fecha_fin, lue.valor
                        from lugares_eventos lue
                        inner join lugares lug on lue.lugar = lug.id
                        where lug.id = " . $id)->getResultArray();
  }
  
  public function getLugarEvento($id)
  {
    return $this->find($id);
  }

  public function getLugarEventoDescripcion($lugar, $titulo) 
  {
    return $this->where(["lugar"=>$lugar, "titulo"=>$titulo])->first();
  }
}