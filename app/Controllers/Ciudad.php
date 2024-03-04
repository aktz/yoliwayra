<?php

namespace App\Controllers;

class Ciudad extends BaseController
{
  public function index(): string
  {
    $data["estados"] = $this->estado->getEstadosActivos();
    $data["regiones"] = $this->region->getRegionesActivas();
    $data["climas"] = $this->clima->getClimasActivos();
    $data["array"] = $this->ciudad->getCiudadesActivas();
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
    return view('ciudades', $data);
  }

  public function insert()  
  {
    $estado = $this->request->getPost("estado-ins");
    $region = $this->request->getPost("region-ins");
    $clima = $this->request->getPost("clima-ins");
    $nombre = $this->request->getPost("nombre-ins");
    $activo = $this->request->getPost("hidActivo-ins");

    $inactivo = $this->ciudad->getCiudadNombre($nombre);

    if ($inactivo) {

      $dataInactivo = [
        "estado"=>$inactivo["estado"],
        "region"=>$inactivo["region"],
        "clima"=>$inactivo["clima"],
        "nombre"=>$inactivo["nombre"],
        "activo"=>$activo
      ];

      if (!$this->validation->run($dataInactivo, 'estado')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->estado->update($inactivo["id"], $dataInactivo);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }

    } else {

      $data = [
        "estado"=>$estado,
        "region"=>$region,
        "clima"=>$clima,
        "nombre"=>$nombre,
        "activo"=>$activo
      ];
  
      if (!$this->validation->run($data, 'ciudad')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->ciudad->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('ciudades'));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $estado = $this->request->getPost("estado-upd");
    $region = $this->request->getPost("region-upd");
    $clima = $this->request->getPost("clima-upd");
    $nombre = $this->request->getPost("nombre-upd");
    $activo = $this->request->getPost("hidActivo-upd");

    $data = [
      "estado"=>$estado,
      "region"=>$region,
      "clima"=>$clima,
      "nombre"=>$nombre,
      "activo"=>$activo
    ];

    if (!$this->validation->run($data, 'ciudad')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->ciudad->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('ciudades'));    
  }

  public function delete() {
    $id = $this->request->getPost("id");
    $deleted = $this->ciudad->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('ciudades')); 
  }
}