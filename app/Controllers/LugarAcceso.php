<?php

namespace App\Controllers;

class LugarAcceso extends BaseController
{
  public function index(): string
  {
    $data["accesos"] = $this->acceso->getAccesosActivos();
    $data["lugares"] = $this->lugar->getLugaresActivos();
    $data["array"] = $this->lugar_acceso->getLugarAccesosActivos();
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
    return view('lugares_accesos', $data);
  }

  public function insert()  
  {
    $acceso = $this->request->getPost("acceso-ins");
    $lugar = $this->request->getPost("lugar-ins");

    $existe = $this->lugar_acceso->getLugarAccesoCombinacion($lugar, $acceso);

    if ($existe) {
      $this->session->setFlashdata("validation_error", ["Ya existe el acceso para el lugar."]);
    } else {

      $data = [
        "acceso"=>$acceso,
        "lugar"=>$lugar
      ];
  
      if (!$this->validation->run($data, 'lugar_acceso')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->lugar_acceso->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('lugares_accesos'));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $acceso = $this->request->getPost("acceso-upd");
    $lugar = $this->request->getPost("lugar-upd");
    $descripcion = $this->request->getPost("descripcion-upd");
    $notas = $this->request->getPost("notas-upd");

    $data = [
      "acceso"=>$acceso,
      "lugar"=>$lugar,
      "descripcion"=>$descripcion,
      "notas"=>$notas
    ];

    if (!$this->validation->run($data, 'lugar_acceso')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->lugar_acceso->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('lugares_accesos'));    
  }

  public function delete() {
    $id = $this->request->getPost("id");
    $deleted = $this->lugar_acceso->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('lugares_accesos')); 
  }
}