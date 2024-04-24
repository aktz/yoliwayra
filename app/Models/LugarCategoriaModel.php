<?php

namespace App\Models;

use CodeIgniter\Model;

class LugarCategoriaModel extends Model
{
  protected $table = 'lugares_categorias';
  protected $primaryKey = 'id';
  protected $allowedFields = ['lugar', 'categoria', 'notas'];  

  public function getLugarCategoriasActivas($id)
  {
    return $this->query("select luc.id, luc.lugar id_lugar, lug.nombre nombre_lugar, luc.categoria id_categoria, 
                            acc.nombre nombre_categoria, luc.notas
                        from lugares_categorias luc
                        inner join lugares lug on luc.lugar = lug.id
                        inner join categorias acc on luc.categoria = acc.id
                        where lug.id = " . $id)->getResultArray();
  }
  
  public function getLugarCategoria($id)
  {
    return $this->find($id);
  }

  public function getLugarCategoriaCombinacion($lugar, $categoria) 
  {
    return $this->where(["lugar"=>$lugar, "categoria"=>$categoria])->first();
  }
}