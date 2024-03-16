<?php

namespace App\Controllers;

class Acceso extends BaseController
{
  public function index(): string
  {
    $data["array"] = $this->acceso->getAccesosActivos();
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
    return view('accesos', $data);
  }

  public function insert()  
  {
    $codigo = $this->request->getPost("codigo-ins");
    $nombre = $this->request->getPost("nombre-ins");
    $activo = $this->request->getPost("hid-activo-ins");

    $inactivo = $this->acceso->getAccesoCodigoNombre($codigo, $nombre);

    if ($inactivo) {

      $dataInactivo = [
        "codigo"=>$inactivo["codigo"],
        "nombre"=>$inactivo["nombre"],
        "activo"=>$activo
      ];

      if (!$this->validation->run($dataInactivo, 'acceso')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->acceso->update($inactivo["id"], $dataInactivo);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }

    } else {

      $data = [
        "codigo"=>$codigo,
        "nombre"=>$nombre,
        "activo"=>$activo
      ];
  
      if (!$this->validation->run($data, 'acceso')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->acceso->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('accesos'));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $codigo = $this->request->getPost("codigo-upd");
    $nombre = $this->request->getPost("nombre-upd");
    $activo = $this->request->getPost("hid-activo-upd");

    $data = [
      "codigo"=>$codigo,
      "nombre"=>$nombre,
      "activo"=>$activo
    ];

    if (!$this->validation->run($data, 'acceso')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->acceso->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('accesos'));    
  }

  public function delete() {
    $id = $this->request->getPost("id");
    $deleted = $this->acceso->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('accesos')); 
  }
}