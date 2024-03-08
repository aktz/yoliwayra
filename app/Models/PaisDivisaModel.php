<?php

namespace App\Models;

use CodeIgniter\Model;

class PaisDivisaModel extends Model
{
  protected $table = 'paises_divisas';
  protected $primaryKey = 'id';
  protected $allowedFields = ['pais', 'divisa'];  

  public function getPaisesDivisasActivas()
  {
    return $this->query("select pad.id, pad.pais id_pais, pai.nombre nombre_pais, pad.divisa id_divisa, 
                            dis.nombre nombre_divisa
                        from paises_divisas pad
                        inner join paises pai on pad.pais = pai.id
                        inner join divisas dis on pad.divisa = dis.id")->getResultArray();
  }
  
  public function getPaisDivisaActiva($id)
  {
    return $this->find($id);
  }

  public function getPaisDivisa($pais, $divisa) 
  {
    return $this->where(["pais"=>$pais, "divisa"=>$divisa])->first();
  }
}