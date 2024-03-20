<?php

namespace App\Models;

use CodeIgniter\Model;

class LugarModel extends Model
{
  protected $table = 'lugares';
  protected $primaryKey = 'id';
  protected $allowedFields = [
        'nombre', 'ciudad', 'region', 'clima', 'postal', 'titulo', 'subtitulo', 'descripcion', 
        'notas', 'ancestral', 'extremo', 'avistamiento', 'deportivo', 'valor', 'activo'
    ];

  public function getLugaresActivos()
  {
    return $this->query("select lug.id, lug.ciudad id_ciudad, ciu.nombre nombre_ciudad, lug.region id_region, 
                            reg.nombre nombre_region, lug.clima id_clima, cli.nombre nombre_clima,
                            lug.nombre, lug.postal, lug.titulo, lug.subtitulo, lug.descripcion, lug.notas,
                            lug.ancestral, lug.extremo, lug.avistamiento, lug.deportivo, lug.valor, lug.activo
                        from lugares lug
                        inner join ciudades ciu on lug.ciudad = ciu.id
                        inner join regiones reg on lug.region = reg.id
                        inner join climas cli on lug.clima = cli.id
                        where lug.activo = 1")->getResultArray();
    return $this->where('activo', 1)->findAll();
  }
  
  public function getLugarActivo($id)
  {
    return $this->find($id);
  }

  public function getLugarNombreCiudad($nombre, $ciudad) 
  {
    return $this->where(["nombre"=>$nombre, "ciudad"=>$ciudad])->where(["activo"=>0])->first();
  }
}