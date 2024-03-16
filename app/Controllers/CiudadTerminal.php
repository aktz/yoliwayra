<?php

namespace App\Controllers;

class CiudadTerminal extends BaseController
{
  public function index(): string
  {
    $data["terminales"] = $this->terminal->getTerminalesActivos();
    $data["ciudades"] = $this->ciudad->getCiudadesActivas();
    $data["array"] = $this->ciudad_terminal->getCiudadTerminalesActivos();
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
    return view('ciudades_terminales', $data);
  }

  public function insert()  
  {
    $terminal = $this->request->getPost("terminal-ins");
    $ciudad = $this->request->getPost("ciudad-ins");
    $descripcion = $this->request->getPost("descripcion-ins");
    $notas = $this->request->getPost("notas-ins");

    $existe = $this->ciudad_terminal->getCiudadTerminal($ciudad, $terminal);

    if ($existe) {
      $this->session->setFlashdata("validation_error", ["Ya existe la terminal para la ciudad."]);
    } else {

      $data = [
        "terminal"=>$terminal,
        "ciudad"=>$ciudad,
        "descripcion"=>$descripcion,
        "notas"=>$notas
      ];
  
      if (!$this->validation->run($data, 'ciudad_terminal')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->ciudad_terminal->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('ciudades_terminales'));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $terminal = $this->request->getPost("terminal-upd");
    $ciudad = $this->request->getPost("ciudad-upd");
    $descripcion = $this->request->getPost("descripcion-upd");
    $notas = $this->request->getPost("notas-upd");

    $data = [
      "terminal"=>$terminal,
      "ciudad"=>$ciudad,
      "descripcion"=>$descripcion,
      "notas"=>$notas
    ];

    if (!$this->validation->run($data, 'ciudad_terminal')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->ciudad_terminal->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('ciudades_terminales'));    
  }

  public function delete() {
    $id = $this->request->getPost("id");
    $deleted = $this->ciudad_terminal->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('ciudades_terminales')); 
  }
}