<?php

namespace App\Controllers;

class CiudadEmbajada extends BaseController
{
  public function index($id)
  {
    $data["embajadas"] = $this->embajada->getEmbajadasActivas();
    $data["ciudad"] = $this->ciudad->getCiudadActivo($id);
    $data["array"] = $this->ciudad_embajada->getCiudadEmbajadasActivos($id);
    if ($this->session->getFlashdata("insert_fail")) {
      $data["insert_fail"] = "error";
    }
    if ($this->session->getFlashdata("upsert_success")) {
      $data["upsert_success"] = "success";
    }
    if ($this->session->getFlashdata("delete_fail")) {
      $data["delete_fail"] = "delete";
    }
    if ($this->session->getFlashdata("validation_error")) {
      $data["validation_error"] = $this->session->getFlashdata("validation_error");
    }
    return view('ciudades_embajadas', $data);
  }

  public function insert()  
  {
    $embajada = $this->request->getPost("embajada-ins");
    $ciudad = $this->request->getPost("ciudad-ins");
    $descripcion = $this->request->getPost("descripcion-ins");
    $notas = $this->request->getPost("notas-ins");

    $existe = $this->ciudad_embajada->getCiudadEmbajadaDescripcion($ciudad, $embajada, $descripcion);

    if ($existe) {
      $this->session->setFlashdata("validation_error", ["Ya existe la embajada para el país."]);
    } else {

      $data = [
        "embajada"=>$embajada,
        "ciudad"=>$ciudad,
        "descripcion"=>$descripcion,
        "notas"=>$notas
      ];
  
      if (!$this->validation->run($data, 'ciudad_embajada')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->ciudad_embajada->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('ciudades_embajadas' . '/' . $ciudad));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $embajada = $this->request->getPost("embajada-upd");
    $ciudad = $this->request->getPost("hid-id-ciudad-upd");
    $descripcion = $this->request->getPost("descripcion-upd");
    $notas = $this->request->getPost("notas-upd");

    $data = [
      "embajada"=>$embajada,
      "ciudad"=>$ciudad,
      "descripcion"=>$descripcion,
      "notas"=>$notas
    ];

    if (!$this->validation->run($data, 'ciudad_embajada')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->ciudad_embajada->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('ciudades_embajadas' . '/' . $ciudad));    
  }

  public function delete() {
    $id = $this->request->getPost("id");

    $ciudad_embajada = $this->ciudad_embajada->getCiudadEmbajada($id);
    $ciudad = $ciudad_embajada["ciudad"];

    $deleted = $this->ciudad_embajada->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('ciudades_embajadas' . '/' . $ciudad)); 
  }
}