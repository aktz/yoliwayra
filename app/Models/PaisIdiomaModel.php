<?php

namespace App\Models;

use CodeIgniter\Model;

class PaisIdiomaModel extends Model
{
  protected $table = 'paises_idiomas';
  protected $primaryKey = 'id';
  protected $allowedFields = ['pais', 'idioma'];  

  public function getPaisesIdiomasActivos()
  {
    return $this->query("select pad.id, pad.pais id_pais, pai.nombre nombre_pais, pad.idioma id_idioma, 
                            dis.nombre nombre_idioma
                        from paises_idiomas pad
                        inner join paises pai on pad.pais = pai.id
                        inner join idiomas dis on pad.idioma = dis.id")->getResultArray();
  }
  
  public function getPaisIdiomaActivo($id)
  {
    return $this->find($id);
  }

  public function getPaisIdioma($pais, $idioma) 
  {
    return $this->where(["pais"=>$pais, "idioma"=>$idioma])->first();
  }
}