<?php

namespace App\Controllers;

class CiudadBanco extends BaseController
{
  public function index($id)
  {
    $data["bancos"] = $this->banco->getBancosActivos();
    $data["ciudad"] = $this->ciudad->getCiudadActivo($id);
    $data["array"] = $this->ciudad_banco->getCiudadBancosActivos($id);
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
    return view('ciudades_bancos', $data);
  }

  public function insert()  
  {
    $banco = $this->request->getPost("banco-ins");
    $ciudad = $this->request->getPost("ciudad-ins");
    $descripcion = $this->request->getPost("descripcion-ins");
    $notas = $this->request->getPost("notas-ins");

    $existe = $this->ciudad_banco->getCiudadBancoDescripcion($ciudad, $banco, $descripcion);

    if ($existe) {
      $this->session->setFlashdata("validation_error", ["Ya existe el banco para el país."]);
    } else {

      $data = [
        "banco"=>$banco,
        "ciudad"=>$ciudad,
        "descripcion"=>$descripcion,
        "notas"=>$notas
      ];
  
      if (!$this->validation->run($data, 'ciudad_banco')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->ciudad_banco->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('ciudades_bancos' . '/' . $ciudad));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $banco = $this->request->getPost("banco-upd");
    $ciudad = $this->request->getPost("ciudad-upd");
    $descripcion = $this->request->getPost("descripcion-upd");
    $notas = $this->request->getPost("notas-upd");

    $data = [
      "banco"=>$banco,
      "ciudad"=>$ciudad,
      "descripcion"=>$descripcion,
      "notas"=>$notas
    ];

    if (!$this->validation->run($data, 'ciudad_banco')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->ciudad_banco->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('ciudades_bancos' . '/' . $ciudad));    
  }

  public function delete() {
    $id = $this->request->getPost("id");

    $ciudad_banco = $this->ciudad_banco->getCiudadBanco($id);
    $ciudad = $ciudad_banco["ciudad"];

    $deleted = $this->ciudad_banco->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('ciudades_bancos' . '/' . $ciudad)); 
  }
}