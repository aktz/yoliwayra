<?php

namespace App\Controllers;

class CiudadAlojamiento extends BaseController
{
  public function index($id)
  {
    $data["alojamientos"] = $this->alojamiento->getAlojamientosActivos();
    $data["ciudad"] = $this->ciudad->getCiudadActivo($id);
    $data["array"] = $this->ciudad_alojamiento->getCiudadAlojamientosActivos($id);
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
    return view('ciudades_alojamientos', $data);
  }

  public function insert()  
  {
    $alojamiento = $this->request->getPost("alojamiento-ins");
    $ciudad = $this->request->getPost("ciudad-ins");
    $descripcion = $this->request->getPost("descripcion-ins");
    $notas = $this->request->getPost("notas-ins");

    $existe = $this->ciudad_alojamiento->getCiudadAlojamientoDescripcion($ciudad, $alojamiento, $descripcion);

    if ($existe) {
      $this->session->setFlashdata("validation_error", ["Ya existe la alojamiento para el país."]);
    } else {

      $data = [
        "alojamiento"=>$alojamiento,
        "ciudad"=>$ciudad,
        "descripcion"=>$descripcion,
        "notas"=>$notas
      ];
  
      if (!$this->validation->run($data, 'ciudad_alojamiento')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->ciudad_alojamiento->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('ciudades_alojamientos' . '/' . $ciudad));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $alojamiento = $this->request->getPost("alojamiento-upd");
    $ciudad = $this->request->getPost("ciudad-upd");
    $descripcion = $this->request->getPost("descripcion-upd");
    $notas = $this->request->getPost("notas-upd");

    $data = [
      "alojamiento"=>$alojamiento,
      "ciudad"=>$ciudad,
      "descripcion"=>$descripcion,
      "notas"=>$notas
    ];

    if (!$this->validation->run($data, 'ciudad_alojamiento')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->ciudad_alojamiento->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('ciudades_alojamientos' . '/' . $ciudad));    
  }

  public function delete() {
    $id = $this->request->getPost("id");

    $ciudad_alojamiento = $this->ciudad_alojamiento->getCiudadAlojamiento($id);
    $ciudad = $ciudad_alojamiento["ciudad"];

    $deleted = $this->ciudad_alojamiento->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('ciudades_alojamientos' . '/' . $ciudad)); 
  }
}