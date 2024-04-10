<?php

namespace App\Controllers;

class CiudadCoworking extends BaseController
{
  public function index($id)
  {
    $data["ciudad"] = $this->ciudad->getCiudadActivo($id);
    $data["array"] = $this->ciudad_coworking->getCiudadCoworkingActivos($id);
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
    return view('ciudades_coworking', $data);
  }

  public function insert()  
  {
    $ciudad = $this->request->getPost("ciudad-ins");
    $descripcion = $this->request->getPost("descripcion-ins");
    $notas = $this->request->getPost("notas-ins");

    $existe = $this->ciudad_coworking->getCiudadCoworkingDescripcion($ciudad, $descripcion);

    if ($existe) {
      $this->session->setFlashdata("validation_error", ["Ya existe el coworking para el país."]);
    } else {

      $data = [
        "ciudad"=>$ciudad,
        "descripcion"=>$descripcion,
        "notas"=>$notas
      ];
  
      if (!$this->validation->run($data, 'ciudad_coworking')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->ciudad_coworking->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('ciudades_coworking' . '/' . $ciudad));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $coworking = $this->request->getPost("coworking-upd");
    $ciudad = $this->request->getPost("ciudad-upd");
    $descripcion = $this->request->getPost("descripcion-upd");
    $notas = $this->request->getPost("notas-upd");

    $data = [
      "ciudad"=>$ciudad,
      "descripcion"=>$descripcion,
      "notas"=>$notas
    ];

    if (!$this->validation->run($data, 'ciudad_coworking')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->ciudad_coworking->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('ciudades_coworking' . '/' . $ciudad));    
  }

  public function delete() {
    $id = $this->request->getPost("id");

    $ciudad_coworking = $this->ciudad_coworking->getCiudadCoworking($id);
    $ciudad = $ciudad_coworking["ciudad"];

    $deleted = $this->ciudad_coworking->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('ciudades_coworking' . '/' . $ciudad)); 
  }
}