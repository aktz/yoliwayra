<?php

namespace App\Controllers;

class LugarGuianza extends BaseController
{
  public function index($id)
  {
    $data["lugar"] = $this->lugar->getLugarActivo($id);
    $data["array"] = $this->lugar_guianza->getLugarGuianzasActivas($id);
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
    return view('lugares_guianzas', $data);
  }

  public function insert()  
  {
    $guianza = $this->request->getPost("guianza-ins");
    $lugar = $this->request->getPost("lugar-ins");
    $descripcion = $this->request->getPost("descripcion-ins");
    $notas = $this->request->getPost("notas-ins");

    $existe = $this->lugar_guianza->getLugarGuianzaDescripcion($lugar, $guianza, $descripcion);

    if ($existe) {
      $this->session->setFlashdata("validation_error", ["Ya existe la guianza para la lugar."]);
    } else {

      $data = [
        "nombre"=>$guianza,
        "lugar"=>$lugar,
        "descripcion"=>$descripcion,
        "notas"=>$notas
      ];
  
      if (!$this->validation->run($data, 'lugar_guianza')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->lugar_guianza->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('lugares_guianzas' . '/' . $lugar));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $guianza = $this->request->getPost("guianza-upd");
    $lugar = $this->request->getPost("hid-id-lugar-upd");
    $descripcion = $this->request->getPost("descripcion-upd");
    $notas = $this->request->getPost("notas-upd");

    $data = [
      "nombre"=>$guianza,
      "lugar"=>$lugar,
      "descripcion"=>$descripcion,
      "notas"=>$notas
    ];

    if (!$this->validation->run($data, 'lugar_guianza')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->lugar_guianza->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('lugares_guianzas' . '/' . $lugar));    
  }

  public function delete() {
    $id = $this->request->getPost("id");

    $lugar_guianza = $this->lugar_guianza->getLugarGuianza($id);
    $lugar = $lugar_guianza["lugar"];

    $deleted = $this->lugar_guianza->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('lugares_guianzas' . '/' . $lugar)); 
  }
}