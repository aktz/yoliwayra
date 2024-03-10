<?php

namespace App\Controllers;

class CiudadAlimentacion extends BaseController
{
  public function index(): string
  {
    $data["alimentaciones"] = $this->alimentacion->getAlimentacionesActivas();
    $data["ciudades"] = $this->ciudad->getCiudadesActivas();
    $data["array"] = $this->ciudad_alimentacion->getCiudadAlimentacionesActivas();
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
    return view('ciudades_alimentaciones', $data);
  }

  public function insert()  
  {
    $alimentacion = $this->request->getPost("alimentacion-ins");
    $ciudad = $this->request->getPost("ciudad-ins");
    $descripcion = $this->request->getPost("descripcion-ins");
    $notas = $this->request->getPost("notas-ins");

    $existe = $this->ciudad_alimentacion->getCiudadAlimentacion($ciudad, $alimentacion);

    if ($existe) {
      $this->session->setFlashdata("validation_error", ["Ya existe la alimentacion para el país."]);
    } else {

      $data = [
        "alimentacion"=>$alimentacion,
        "ciudad"=>$ciudad,
        "descripcion"=>$descripcion,
        "notas"=>$notas
      ];
  
      if (!$this->validation->run($data, 'ciudad_alimentacion')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->ciudad_alimentacion->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('ciudades_alimentaciones'));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $alimentacion = $this->request->getPost("alimentacion-upd");
    $ciudad = $this->request->getPost("ciudad-upd");
    $descripcion = $this->request->getPost("descripcion-upd");
    $notas = $this->request->getPost("notas-upd");

    $data = [
      "alimentacion"=>$alimentacion,
      "ciudad"=>$ciudad,
      "descripcion"=>$descripcion,
      "notas"=>$notas
    ];

    if (!$this->validation->run($data, 'ciudad_alimentacion')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->ciudad_alimentacion->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('ciudades_alimentaciones'));    
  }

  public function delete() {
    $id = $this->request->getPost("id");
    $deleted = $this->ciudad_alimentacion->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('ciudades_alimentaciones')); 
  }
}