<?php

namespace App\Models;

use CodeIgniter\Model;

class CiudadModel extends Model
{
  protected $table = 'ciudades';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nombre', 'estado', 'region', 'clima', 'activo'];  

  public function getCiudadesActivas()
  {
    return $this->query("select ciu.id id_ciudad, ciu.nombre nombre_ciudad, ciu.estado id_estado, 
                            est.nombre nombre_estado, ciu.region id_region, reg.nombre nombre_region, 
                            ciu.clima id_clima, cli.nombre nombre_clima, ciu.activo activo_ciudad
                        from ciudades ciu
                        inner join estados est on ciu.estado = est.id
                        inner join regiones reg on ciu.region = reg.id
                        inner join climas cli on ciu.clima = cli.id
                        where ciu.activo = 1")->getResultArray();
  }
  
  public function getCiudadActivo($id)
  {
    return $this->find($id);
  }

  public function getCiudadNombre($nombre) 
  {
    return $this->where(["nombre"=>$nombre, "activo"=>0])->first();
  }
}