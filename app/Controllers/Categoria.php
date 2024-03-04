<?php

namespace App\Controllers;

class Categoria extends BaseController
{
  public function index(): string
  {
    $data["array"] = $this->categoria->getCategoriasActivas();
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
    return view('categorias', $data);
  }

  public function insert()
  {
    //traer campos de la vista
    $nombre = $this->request->getPost("nombre-ins");
    $activo = $this->request->getPost("hidActivo-ins");

    $inactivo = $this->categoria->getCategoriaNombre($nombre);

    //Hay inactivo igual, actualiza estado
    if ($inactivo) {
      
      $dataInactivo = [
        "nombre"=>$inactivo["nombre"],
        "activo"=>$activo
      ];

      if (!$this->validation->run($dataInactivo, 'categoria')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->categoria->update($inactivo["id"], $dataInactivo);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }

    // No existe inactivo igual, inserta
    } else {

      $data = [
        "nombre"=>$nombre,
        "activo"=>$activo
      ];

      if (!$this->validation->run($data, 'categoria')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->categoria->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('categorias'));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $nombre = $this->request->getPost("nombre-upd");
    $activo = $this->request->getPost("hidActivo-upd");

    $data = [
      "nombre"=>$nombre,
      "activo"=>$activo
    ];

    if (!$this->validation->run($data, 'categoria')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->categoria->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('categorias'));    
  }

  public function delete() {
    $id = $this->request->getPost("id");
    $eliminado = $this->categoria->delete($id);

    if ($eliminado <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('categorias')); 
  }
}