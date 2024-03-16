<?php

namespace App\Controllers;

class Embajada extends BaseController
{
  public function index(): string
  {
    $data["array"] = $this->embajada->getEmbajadasActivas();
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
    return view('embajadas', $data);
  }

  public function insert()  
  {
    $nombre = $this->request->getPost("nombre-ins");
    $consulado = $this->request->getPost("hid-consulado-ins");
    $activo = $this->request->getPost("hid-activo-ins");

    $inactivo = $this->embajada->getEmbajadaNombre($nombre);

    if ($inactivo) {

      $dataInactivo = [
        "nombre"=>$inactivo["nombre"],
        "consulado"=>$consulado,
        "activo"=>$activo
      ];

      if (!$this->validation->run($dataInactivo, 'embajada')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->embajada->update($inactivo["id"], $dataInactivo);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }

    } else {

      $data = [
        "nombre"=>$nombre,
        "consulado"=>$consulado,
        "activo"=>$activo
      ];
  
      if (!$this->validation->run($data, 'embajada')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->embajada->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('embajadas'));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $nombre = $this->request->getPost("nombre-upd");
    $consulado = $this->request->getPost("hid-consulado-upd");
    $activo = $this->request->getPost("hid-activo-upd");

    $data = [
      "nombre"=>$nombre,
      "consulado"=>$consulado,
      "activo"=>$activo
    ];

    if (!$this->validation->run($data, 'embajada')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->embajada->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('embajadas'));    
  }

  public function delete() {
    $id = $this->request->getPost("id");
    $deleted = $this->embajada->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('embajadas')); 
  }
}