<?php

namespace App\Controllers;

class CiudadAtraccion extends BaseController
{
  public function index(): string
  {
    $data["atracciones"] = $this->atraccion->getAtraccionesActivas();
    $data["ciudades"] = $this->ciudad->getCiudadesActivas();
    $data["array"] = $this->ciudad_atraccion->getCiudadAtraccionesActivas();
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
    return view('ciudades_atracciones', $data);
  }

  public function insert()  
  {
    $atraccion = $this->request->getPost("atraccion-ins");
    $ciudad = $this->request->getPost("ciudad-ins");
    $descripcion = $this->request->getPost("descripcion-ins");
    $notas = $this->request->getPost("notas-ins");

    $existe = $this->ciudad_atraccion->getCiudadAtraccion($ciudad, $atraccion);

    if ($existe) {
      $this->session->setFlashdata("validation_error", ["Ya existe la atraccion para el país."]);
    } else {

      $data = [
        "atraccion"=>$atraccion,
        "ciudad"=>$ciudad,
        "descripcion"=>$descripcion,
        "notas"=>$notas
      ];
  
      if (!$this->validation->run($data, 'ciudad_atraccion')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->ciudad_atraccion->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('ciudades_atracciones'));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $atraccion = $this->request->getPost("atraccion-upd");
    $ciudad = $this->request->getPost("ciudad-upd");
    $descripcion = $this->request->getPost("descripcion-upd");
    $notas = $this->request->getPost("notas-upd");

    $data = [
      "atraccion"=>$atraccion,
      "ciudad"=>$ciudad,
      "descripcion"=>$descripcion,
      "notas"=>$notas
    ];

    if (!$this->validation->run($data, 'ciudad_atraccion')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->ciudad_atraccion->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('ciudades_atracciones'));    
  }

  public function delete() {
    $id = $this->request->getPost("id");
    $deleted = $this->ciudad_atraccion->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('ciudades_atracciones')); 
  }
}