<?php

namespace App\Controllers;

class LugarAlimentacion extends BaseController
{
  public function index($id)
  {
    $data["alimentaciones"] = $this->alimentacion->getAlimentacionesActivas();
    $data["lugar"] = $this->lugar->getLugarActivo($id);
    $data["array"] = $this->lugar_alimentacion->getLugarAlimentacionesActivas($id);

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
    return view('lugares_alimentaciones', $data);
  }

  public function insert()  
  {
    $alimentacion = $this->request->getPost("alimentacion-ins");
    $lugar = $this->request->getPost("lugar-ins");
    $descripcion = $this->request->getPost("descripcion-ins");
    $notas = $this->request->getPost("notas-ins");

    $existe = $this->lugar_alimentacion->getLugarAlimentacionCombinacion($lugar, $alimentacion, $descripcion);

    if ($existe) {
      $this->session->setFlashdata("validation_error", ["Ya existe la alimentacion para el lugar."]);
    } else {

      $data = [
        "alimentacion"=>$alimentacion,
        "lugar"=>$lugar,
        "descripcion"=>$descripcion,
        "notas"=>$notas
      ];
  
      if (!$this->validation->run($data, 'lugar_alimentacion')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->lugar_alimentacion->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('lugares_alimentaciones/' . $lugar));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $alimentacion = $this->request->getPost("alimentacion-upd");
    $lugar = $this->request->getPost("lugar-upd");
    $descripcion = $this->request->getPost("descripcion-upd");
    $notas = $this->request->getPost("notas-upd");

    $data = [
      "alimentacion"=>$alimentacion,
      "lugar"=>$lugar,
      "descripcion"=>$descripcion,
      "notas"=>$notas
    ];

    if (!$this->validation->run($data, 'lugar_alimentacion')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->lugar_alimentacion->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('lugares_alimentaciones/' . $lugar));    
  }

  public function delete() {
    $id = $this->request->getPost("id");

    $lugar_alimentacion = $this->lugar_alimentacion->getLugarAlimentacion($id);
    $lugar = $lugar_alimentacion["lugar"];

    $deleted = $this->lugar_alimentacion->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('lugares_alimentaciones/' . $lugar)); 
  }
}