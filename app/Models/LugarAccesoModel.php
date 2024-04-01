<?php

namespace App\Models;

use CodeIgniter\Model;

class LugarAccesoModel extends Model
{
  protected $table = 'lugares_accesos';
  protected $primaryKey = 'id';
  protected $allowedFields = ['lugar', 'acceso'];  

  public function getLugarAccesosActivos($id)
  {
    return $this->query("select lua.id, lua.lugar id_lugar, lug.nombre nombre_lugar, lua.acceso id_acceso, 
                            acc.nombre nombre_acceso
                        from lugares_accesos lua
                        inner join lugares lug on lua.lugar = lug.id
                        inner join accesos acc on lua.acceso = acc.id
                        where lug.id = " . $id)->getResultArray();
  }
  
  public function getLugarAcceso($id)
  {
    return $this->find($id);
  }

  public function getLugarAccesoCombinacion($lugar, $acceso) 
  {
    return $this->where(["lugar"=>$lugar, "acceso"=>$acceso])->first();
  }
}