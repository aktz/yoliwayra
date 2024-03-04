<?php

namespace App\Controllers;

class Banco extends BaseController
{
  public function index(): string
  {
    $data["array"] = $this->banco->getBancosActivos();
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
    return view('bancos', $data);
  }

  public function insert()
  {
    $nombre = $this->request->getPost("nombre-ins");
    $oficina = $this->request->getPost("hidOficina-ins");
    $cajero = $this->request->getPost("hidCajero-ins");
    $corresponsal = $this->request->getPost("hidCorresponsal-ins");
    $activo = $this->request->getPost("hidActivo-ins");

    $inactivo = $this->banco->getBancoNombre($nombre);

    //Hay inactivo igual, actualiza estado
    if ($inactivo) {
      
      $dataInactivo = [
        "nombre"=>$inactivo["nombre"],
        "oficina"=>$oficina,
        "cajero"=>$cajero,
        "corresponsal"=>$corresponsal,
        "activo"=>$activo
      ];     

      if (!$this->validation->run($dataInactivo, 'banco')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->banco->update($inactivo["id"], $dataInactivo);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }

    // No existe inactivo igual, inserta
    } else {

      $data = [
        "nombre"=>$nombre,
        "oficina"=>$oficina,
        "cajero"=>$cajero,
        "corresponsal"=>$corresponsal,
        "activo"=>$activo
      ];

      if (!$this->validation->run($data, 'banco')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->banco->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('bancos'));

  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $nombre = $this->request->getPost("nombre-upd");
    $oficina = $this->request->getPost("hidOficina-upd");
    $cajero = $this->request->getPost("hidCajero-upd");
    $corresponsal = $this->request->getPost("hidCorresponsal-upd");
    $activo = $this->request->getPost("hidActivo-upd");

    $data = [
      "nombre"=>$nombre,
      "oficina"=>$oficina,
      "cajero"=>$cajero,
      "corresponsal"=>$corresponsal,
      "activo"=>$activo
    ];

    if (!$this->validation->run($data, 'banco')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->banco->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('bancos'));    
  }

  public function delete() {
    $id = $this->request->getPost("id");
    $deleted = $this->banco->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('bancos')); 
  }
}