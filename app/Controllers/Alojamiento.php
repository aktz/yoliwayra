<?php

namespace App\Controllers;

class Alojamiento extends BaseController
{
  public function index(): string
  {
    $data["array"] = $this->alojamiento->getAlojamientosActivos();
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
    return view('alojamientos', $data);
  }

  public function insert()
  {
    $nombre = $this->request->getPost("nombre-ins");
    $activo = $this->request->getPost("hidActivo-ins");

    $inactivo = $this->alojamiento->getAlojamientoNombre($nombre);

    //Hay inactivo igual, actualiza estado
    if ($inactivo) {
      
      $dataInactivo = [
        "nombre"=>$inactivo["nombre"],
        "activo"=>$activo
      ];     

      if (!$this->validation->run($dataInactivo, 'alojamiento')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->alojamiento->update($inactivo["id"], $dataInactivo);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }

    // No existe inactivo igual, inserta
    } else {

      $data = [
        "nombre"=>$nombre,
        "activo"=>$activo
      ];

      if (!$this->validation->run($data, 'alojamiento')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->alojamiento->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('alojamientos'));

  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $nombre = $this->request->getPost("nombre-upd");
    $activo = $this->request->getPost("hidActivo-upd");

    $data = [
      "nombre"=>$nombre,
      "activo"=>$activo
    ];

    if (!$this->validation->run($data, 'alojamiento')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->alojamiento->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('alojamientos'));    
  }

  public function delete() {
    $id = $this->request->getPost("id");
    $deleted = $this->alojamiento->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('alojamientos')); 
  }
}