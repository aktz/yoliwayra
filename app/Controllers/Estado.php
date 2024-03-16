<?php

namespace App\Controllers;

class Estado extends BaseController
{
  public function index(): string
  {
    $data["paises"] = $this->pais->getPaisesActivos();
    $data["array"] = $this->estado->getEstadosActivos();
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
    return view('estados', $data);
  }

  public function insert()  
  {
    $pais = $this->request->getPost("pais-ins");
    $nombre = $this->request->getPost("nombre-ins");
    $activo = $this->request->getPost("hid-activo-ins");

    $inactivo = $this->estado->getEstadoNombre($pais, $nombre);

    if ($inactivo) {

      $dataInactivo = [
        "pais"=>$inactivo["pais"],
        "nombre"=>$inactivo["nombre"],
        "activo"=>$activo
      ];

      if (!$this->validation->run($dataInactivo, 'estado')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->estado->update($inactivo["id"], $dataInactivo);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }

    } else {

      $data = [
        "pais"=>$pais,
        "nombre"=>$nombre,
        "activo"=>$activo
      ];
  
      if (!$this->validation->run($data, 'estado')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->estado->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('estados'));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $pais = $this->request->getPost("pais-upd");
    $nombre = $this->request->getPost("nombre-upd");
    $activo = $this->request->getPost("hid-activo-upd");

    $data = [
      "pais"=>$pais,
      "nombre"=>$nombre,
      "activo"=>$activo
    ];

    if (!$this->validation->run($data, 'estado')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->estado->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('estados'));    
  }

  public function delete() {
    $id = $this->request->getPost("id");
    $deleted = $this->estado->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('estados')); 
  }
}