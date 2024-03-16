<?php

namespace App\Controllers;

class CiudadTransporte extends BaseController
{
  public function index(): string
  {
    $data["transportes"] = $this->transporte->getTransportesActivos();
    $data["origenes"] = $this->ciudad->getCiudadesActivas();
    $data["destinos"] = $this->ciudad->getCiudadesActivas();
    $data["array"] = $this->ciudad_transporte->getCiudadTransportesActivos();
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
    return view('ciudades_transportes', $data);
  }

  public function insert()  
  {
    $origen = $this->request->getPost("origen-ins");
    $destino = $this->request->getPost("destino-ins");
    $transporte = $this->request->getPost("transporte-ins");
    $descripcion = $this->request->getPost("descripcion-ins");
    $notas = $this->request->getPost("notas-ins");

    $existe_combinacion = $this->ciudad_transporte->getCiudadTransporteOrigenDestino($origen, $destino, $transporte);
    $existe_igual_ciudad = $this->ciudad_transporte->getCiudadTransporteOrigenDestino($origen, $destino, $transporte);

    if ($existe_combinacion) {
      $this->session->setFlashdata("validation_error", ["Ya existe esta configuración origen/destino."]);
    } else if ($origen == $destino) {
      $this->session->setFlashdata("validation_error", ["El origen no puede ser igual al destino."]);
    } else {

      $data = [
        "origen"=>$origen,
        "destino"=>$destino,
        "transporte"=>$transporte,
        "descripcion"=>$descripcion,
        "notas"=>$notas
      ];
  
      if (!$this->validation->run($data, 'ciudad_transporte')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->ciudad_transporte->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('ciudades_transportes'));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $origen = $this->request->getPost("origen-upd");
    $destino = $this->request->getPost("destino-upd");
    $transporte = $this->request->getPost("transporte-upd");
    $descripcion = $this->request->getPost("descripcion-upd");
    $notas = $this->request->getPost("notas-upd");

    $data = [
      "origen"=>$origen,
      "destino"=>$destino,
      "transporte"=>$transporte,
      "descripcion"=>$descripcion,
      "notas"=>$notas
    ];

    if (!$this->validation->run($data, 'ciudad_transporte')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->ciudad_transporte->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('ciudades_transportes'));    
  }

  public function delete() {
    $id = $this->request->getPost("id");
    $deleted = $this->ciudad_transporte->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('ciudades_transportes')); 
  }
}