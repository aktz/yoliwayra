<?php

namespace App\Controllers;

class Clima extends BaseController
{
  public function index(): string
  {
    $data["array"] = $this->clima->getClimasActivos();
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
    return view('climas', $data);
  }

  public function insert()
  {
    //traer campos de la vista
    $nombre = $this->request->getPost("nombre-ins");
    $activo = $this->request->getPost("hid-activo-ins");

    $inactivo = $this->clima->getClimaNombre($nombre);

    //Hay inactivo igual, actualiza estado
    if ($inactivo) {
      
      $dataInactivo = [
        "nombre"=>$inactivo["nombre"],
        "activo"=>$activo
      ];

      if (!$this->validation->run($dataInactivo, 'clima')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->clima->update($inactivo["id"], $dataInactivo);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }

    // No existe inactivo igual, inserta
    } else {

      $data = [
        "nombre"=>$nombre,
        "activo"=>$activo
      ];

      if (!$this->validation->run($data, 'clima')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->clima->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('climas'));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $nombre = $this->request->getPost("nombre-upd");
    $activo = $this->request->getPost("hid-activo-upd");

    $data = [
      "nombre"=>$nombre,
      "activo"=>$activo
    ];

    if (!$this->validation->run($data, 'clima')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->clima->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('climas'));    
  }

  public function delete() {
    $id = $this->request->getPost("id");
    $eliminado = $this->clima->delete($id);

    if ($eliminado <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('climas')); 
  }
}