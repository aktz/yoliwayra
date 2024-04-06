<?php

namespace App\Models;

use CodeIgniter\Model;

class LugarAlimentacionModel extends Model
{
  protected $table = 'lugares_alimentaciones';
  protected $primaryKey = 'id';
  protected $allowedFields = ['lugar', 'alimentacion', 'descripcion', 'notas'];  

  public function getLugarAlimentacionesActivas($id)
  {
    return $this->query("select lua.id, lua.lugar id_lugar, lug.nombre nombre_lugar, lua.alimentacion id_alimentacion, 
                            acc.nombre nombre_alimentacion, lua.descripcion, lua.notas
                        from lugares_alimentaciones lua
                        inner join lugares lug on lua.lugar = lug.id
                        inner join alimentaciones acc on lua.alimentacion = acc.id
                        where lug.id = " . $id)->getResultArray();
  }
  
  public function getLugarAlimentacion($id)
  {
    return $this->find($id);
  }

  public function getLugarAlimentacionCombinacion($lugar, $alimentacion, $descripcion) 
  {
    return $this->where(["lugar"=>$lugar, "alimentacion"=>$alimentacion, "descripcion"=>$descripcion])->first();
  }
}