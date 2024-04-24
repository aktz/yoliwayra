<?php

namespace App\Models;

use CodeIgniter\Model;

class LugarTransporteModel extends Model
{
  protected $table = 'lugares_transportes';
  protected $primaryKey = 'id';
  protected $allowedFields = ['lugar', 'transporte', 'descripcion', 'notas'];  

  public function getLugarTransportesActivos($id)
  {
    return $this->query("select lut.id, lut.lugar id_lugar, lug.nombre nombre_lugar, lut.transporte id_transporte, 
                            tra.nombre nombre_transporte, lut.descripcion, lut.notas
                        from lugares_transportes lut
                        inner join lugares lug on lut.lugar = lug.id
                        inner join transportes tra on lut.transporte = tra.id
                        where lug.id = " . $id)->getResultArray();
  }
  
  public function getLugarTransporte($id)
  {
    return $this->find($id);
  }

  public function getLugarTransporteCombinacion($lugar, $transporte, $descripcion) 
  {
    return $this->where(["lugar"=>$lugar, "transporte"=>$transporte, "descripcion"=>$descripcion])->first();
  }
}