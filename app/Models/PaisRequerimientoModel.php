<?php

namespace App\Models;

use CodeIgniter\Model;

class PaisRequerimientoModel extends Model
{
  protected $table = 'paises_requerimientos';
  protected $primaryKey = 'id';
  protected $allowedFields = ['pais', 'requerimiento'];  

  public function getPaisesRequerimientosActivos()
  {
    return $this->query("select pad.id, pad.pais id_pais, pai.nombre nombre_pais, pad.requerimiento id_requerimiento, 
                            req.nombre nombre_requerimiento
                        from paises_requerimientos pad
                        inner join paises pai on pad.pais = pai.id
                        inner join requerimientos req on pad.requerimiento = req.id")->getResultArray();
  }
  
  public function getPaisRequerimientoActivo($id)
  {
    return $this->find($id);
  }

  public function getPaisRequerimiento($pais, $requerimiento) 
  {
    return $this->where(["pais"=>$pais, "requerimiento"=>$requerimiento])->first();
  }
}