<?php

namespace App\Models;

use CodeIgniter\Model;

class LugarGuianzaModel extends Model
{
  protected $table = 'lugares_guianzas';
  protected $primaryKey = 'id';
  protected $allowedFields = ['lugar', 'nombre', 'descripcion', 'notas'];  

  public function getLugarGuianzasActivas($id)
  {
    return $this->query("select lgu.id, lgu.lugar id_lugar, lug.nombre nombre_lugar, lgu.nombre nombre_guianza, 
                            lgu.descripcion, lgu.notas
                        from lugares_guianzas lgu
                        inner join lugares lug on lgu.lugar = lug.id
                        where lug.id = " . $id)->getResultArray();
  }
  
  public function getLugarGuianza($id)
  {
    return $this->find($id);
  }

  public function getLugarGuianzaDescripcion($lugar, $guianza) 
  {
    return $this->where(["lugar"=>$lugar, "nombre"=>$guianza])->first();
  }
}