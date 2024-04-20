<?php

namespace App\Models;

use CodeIgniter\Model;

class CiudadTransporteModel extends Model
{
  protected $table = 'ciudades_transportes';
  protected $primaryKey = 'id';
  protected $allowedFields = ['origen', 'destino', 'transporte', 'descripcion', 'notas'];  

  public function getCiudadTransportesActivos($id)
  {
    return $this->query("select cit.id, cit.origen id_origen, cit.destino id_destino, 
                            ciu_1.nombre nombre_origen, ciu_2.nombre nombre_destino, 
                            cit.transporte id_transporte, 
                            tra.nombre nombre_transporte, cit.descripcion, cit.notas
                        from ciudades_transportes cit
                        inner join ciudades ciu_1 on cit.origen = ciu_1.id
                        inner join ciudades ciu_2 on cit.destino = ciu_2.id
                        inner join transportes tra on cit.transporte = tra.id
                        where cit.origen = " . $id . " or cit.destino = " . $id)->getResultArray();
  }
  
  public function getCiudadTransporte($id)
  {
    return $this->find($id);
  }

  public function getCiudadTransporteOrigenDestino($origen, $destino, $transporte) 
  {
    return $this->where(["origen"=>$origen, "destino"=>$destino, "transporte"=>$transporte])->first();
  }
}