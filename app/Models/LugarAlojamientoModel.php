<?php

namespace App\Models;

use CodeIgniter\Model;

class LugarAlojamientoModel extends Model
{
  protected $table = 'lugares_alojamientos';
  protected $primaryKey = 'id';
  protected $allowedFields = ['lugar', 'alojamiento', 'descripcion', 'notas'];  

  public function getLugarAlojamientosActivos($id)
  {
    return $this->query("select lua.id, lua.lugar id_lugar, lug.nombre nombre_lugar, lua.alojamiento id_alojamiento, 
                            acc.nombre nombre_alojamiento, lua.descripcion, lua.notas
                        from lugares_alojamientos lua
                        inner join lugares lug on lua.lugar = lug.id
                        inner join alojamientos acc on lua.alojamiento = acc.id
                        where lug.id = " . $id)->getResultArray();
  }
  
  public function getLugarAlojamiento($id)
  {
    return $this->find($id);
  }

  public function getLugarAlojamientoCombinacion($lugar, $alojamiento, $descripcion) 
  {
    return $this->where(["lugar"=>$lugar, "alojamiento"=>$alojamiento, "descripcion"=>$descripcion])->first();
  }
}