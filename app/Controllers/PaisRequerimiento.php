<?php

namespace App\Controllers;

class PaisRequerimiento extends BaseController
{
  public function index(): string
  {
    $data["requerimientos"] = $this->requerimiento->getRequerimientosActivos();
    $data["paises"] = $this->pais->getPaisesActivos();
    $data["array"] = $this->pais_requerimiento->getPaisesRequerimientosActivos();
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
    return view('paises_requerimientos', $data);
  }

  public function insert()  
  {
    $requerimiento = $this->request->getPost("requerimiento-ins");
    $pais = $this->request->getPost("pais-ins");

    $existe = $this->pais_requerimiento->getPaisRequerimiento($pais, $requerimiento);

    if ($existe) {
      $this->session->setFlashdata("validation_error", ["Ya existe el requerimiento para el país."]);
    } else {

      $data = [
        "requerimiento"=>$requerimiento,
        "pais"=>$pais
      ];
  
      if (!$this->validation->run($data, 'pais_requerimiento')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->pais_requerimiento->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('paises_requerimientos'));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $requerimiento = $this->request->getPost("requerimiento-upd");
    $pais = $this->request->getPost("pais-upd");

    $data = [
      "requerimiento"=>$requerimiento,
      "pais"=>$pais
    ];

    if (!$this->validation->run($data, 'pais_requerimiento')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->estado->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('paises_requerimientos'));    
  }

  public function delete() {
    $id = $this->request->getPost("id");
    $deleted = $this->pais_requerimiento->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('paises_requerimientos')); 
  }
}