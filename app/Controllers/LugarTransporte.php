<?php

namespace App\Controllers;

class LugarTransporte extends BaseController
{
  public function index($id)
  {
    $data["transportes"] = $this->transporte->getTransportesActivos();
    $data["lugar"] = $this->lugar->getLugarActivo($id);
    $data["array"] = $this->lugar_transporte->getLugarTransportesActivos($id);

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
    return view('lugares_transportes', $data);
  }

  public function insert()  
  {
    $transporte = $this->request->getPost("transporte-ins");
    $lugar = $this->request->getPost("lugar-ins");
    $descripcion = $this->request->getPost("descripcion-ins");
    $notas = $this->request->getPost("notas-ins");

    $existe = $this->lugar_transporte->getLugarTransporteCombinacion($lugar, $transporte, $descripcion);

    if ($existe) {
      $this->session->setFlashdata("validation_error", ["Ya existe el transporte para el lugar."]);
    } else {

      $data = [
        "transporte"=>$transporte,
        "lugar"=>$lugar,
        "descripcion"=>$descripcion,
        "notas"=>$notas
      ];
  
      if (!$this->validation->run($data, 'lugar_transporte')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->lugar_transporte->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('lugares_transportes' . '/' . $lugar));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $transporte = $this->request->getPost("hid-id-transporte-upd");
    $lugar = $this->request->getPost("hid-id-lugar-upd");
    $descripcion = $this->request->getPost("descripcion-upd");
    $notas = $this->request->getPost("notas-upd");

    $data = [
      "transporte"=>$transporte,
      "lugar"=>$lugar,
      "descripcion"=>$descripcion,
      "notas"=>$notas
    ];

    if (!$this->validation->run($data, 'lugar_transporte')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->lugar_transporte->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('lugares_transportes' . '/' . $lugar));    
  }

  public function delete() {
    $id = $this->request->getPost("id");
    $deleted = $this->lugar_transporte->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('lugares_transportes' . '/' . $lugar)); 
  }
}