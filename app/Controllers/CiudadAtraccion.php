<?php

namespace App\Controllers;

class CiudadAtraccion extends BaseController
{
  public function index($id)
  {
    $data["ciudad"] = $this->ciudad->getCiudadActivo($id);
    $data["array"] = $this->ciudad_atraccion->getCiudadAtraccionesActivas($id);
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
    $ciudad = $this->request->getPost("ciudad-ins");
    $descripcion = $this->request->getPost("descripcion-ins");
    $notas = $this->request->getPost("notas-ins");
    $activo = $this->request->getPost("hid-activo-ins");

    $existe = $this->ciudad_atraccion->getCiudadAtraccionDescripcion($ciudad, $descripcion);

    if ($existe) {
      $this->session->setFlashdata("validation_error", ["Ya existe la atraccion para el país."]);
    } else {

      $data = [
        "ciudad"=>$ciudad,
        "descripcion"=>$descripcion,
        "notas"=>$notas,
        "activo"=>$activo
      ];
  
      if (!$this->validation->run($data, 'ciudad_atraccion')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->ciudad_atraccion->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('ciudades_atracciones' . '/' . $ciudad));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $ciudad = $this->request->getPost("hid-id-ciudad-upd");
    $descripcion = $this->request->getPost("descripcion-upd");
    $notas = $this->request->getPost("notas-upd");
    $activo = $this->request->getPost("hid-activo-upd");

    $data = [
      "ciudad"=>$ciudad,
      "descripcion"=>$descripcion,
      "notas"=>$notas,
      "activo"=>$activo
    ];

    if (!$this->validation->run($data, 'ciudad_atraccion')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->ciudad_atraccion->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('ciudades_atracciones' . '/' . $ciudad));    
  }

  public function delete() {
    $id = $this->request->getPost("id");

    $ciudad_atraccion = $this->ciudad_atraccion->getCiudadAtraccion($id);
    $ciudad = $ciudad_atraccion["ciudad"];

    $deleted = $this->ciudad_atraccion->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('ciudades_atracciones' . '/' . $ciudad)); 
  }
}