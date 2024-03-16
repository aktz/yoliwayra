<?php

namespace App\Controllers;

class Alimentacion extends BaseController
{
  public function index(): string
  {
    $data["array"] = $this->alimentacion->getAlimentacionesActivas();
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
    return view('alimentaciones', $data);
  }

  public function insert()
  {
    //traer campos de la vista
    $nombre = $this->request->getPost("nombre-ins");
    $activo = $this->request->getPost("hid-activo-ins");

    $inactivo = $this->alimentacion->getAlimentacionNombre($nombre);

    //Hay inactivo igual, actualiza estado
    if ($inactivo) {
      
      $dataInactivo = [
        "nombre"=>$inactivo["nombre"],
        "activo"=>$activo
      ];

      if (!$this->validation->run($dataInactivo, 'alimentacion')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->alimentacion->update($inactivo["id"], $dataInactivo);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }

    // No existe inactivo igual, inserta
    } else {

      $data = [
        "nombre"=>$nombre,
        "activo"=>$activo
      ];

      if (!$this->validation->run($data, 'alimentacion')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->alimentacion->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('alimentaciones'));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $nombre = $this->request->getPost("nombre-upd");
    $activo = $this->request->getPost("hid-activo-upd");

    $data = [
      "nombre"=>$nombre,
      "activo"=>$activo
    ];

    if (!$this->validation->run($data, 'alimentacion')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->alimentacion->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('alimentaciones'));    
  }

  public function delete() {
    $id = $this->request->getPost("id");
    $eliminado = $this->alimentacion->delete($id);

    if ($eliminado <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('alimentaciones')); 
  }
}