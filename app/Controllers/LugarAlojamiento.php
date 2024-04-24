<?php

namespace App\Controllers;

class LugarAlojamiento extends BaseController
{
  public function index($id)
  {
    $data["alojamientos"] = $this->alojamiento->getAlojamientosActivos();
    $data["lugar"] = $this->lugar->getLugarActivo($id);
    $data["array"] = $this->lugar_alojamiento->getLugarAlojamientosActivos($id);

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
    return view('lugares_alojamientos', $data);
  }

  public function insert()  
  {
    $alojamiento = $this->request->getPost("alojamiento-ins");
    $lugar = $this->request->getPost("lugar-ins");
    $descripcion = $this->request->getPost("descripcion-ins");
    $notas = $this->request->getPost("notas-ins");

    $existe = $this->lugar_alojamiento->getLugarAlojamientoCombinacion($lugar, $alojamiento, $descripcion);

    if ($existe) {
      $this->session->setFlashdata("validation_error", ["Ya existe el alojamiento para el lugar."]);
    } else {

      $data = [
        "alojamiento"=>$alojamiento,
        "lugar"=>$lugar,
        "descripcion"=>$descripcion,
        "notas"=>$notas
      ];
  
      if (!$this->validation->run($data, 'lugar_alojamiento')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->lugar_alojamiento->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('lugares_alojamientos' . '/' . $lugar));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $alojamiento = $this->request->getPost("hid-id-alojamiento-upd");
    $lugar = $this->request->getPost("hid-id-lugar-upd");
    $descripcion = $this->request->getPost("descripcion-upd");
    $notas = $this->request->getPost("notas-upd");

    $data = [
      "alojamiento"=>$alojamiento,
      "lugar"=>$lugar,
      "descripcion"=>$descripcion,
      "notas"=>$notas
    ];

    if (!$this->validation->run($data, 'lugar_alojamiento')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->lugar_alojamiento->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('lugares_alojamientos' . '/' . $lugar));    
  }

  public function delete() {
    $id = $this->request->getPost("id");
    $deleted = $this->lugar_alojamiento->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('lugares_alojamientos' . '/' . $lugar)); 
  }
}