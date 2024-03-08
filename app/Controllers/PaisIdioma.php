<?php

namespace App\Controllers;

class PaisIdioma extends BaseController
{
  public function index(): string
  {
    $data["idiomas"] = $this->idioma->getIdiomasActivos();
    $data["paises"] = $this->pais->getPaisesActivos();
    $data["array"] = $this->pais_idioma->getPaisesIdiomasActivos();
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
    return view('paises_idiomas', $data);
  }

  public function insert()  
  {
    $idioma = $this->request->getPost("idioma-ins");
    $pais = $this->request->getPost("pais-ins");

    $existe = $this->pais_idioma->getPaisIdioma($pais, $idioma);

    if ($existe) {
      $this->session->setFlashdata("validation_error", ["Ya existe el idioma para el país."]);
    } else {

      $data = [
        "idioma"=>$idioma,
        "pais"=>$pais
      ];
  
      if (!$this->validation->run($data, 'pais_idioma')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->pais_idioma->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('paises_idiomas'));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $idioma = $this->request->getPost("idioma-upd");
    $pais = $this->request->getPost("pais-upd");

    $data = [
      "idioma"=>$idioma,
      "pais"=>$pais
    ];

    if (!$this->validation->run($data, 'estado')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->estado->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('paises_idiomas'));    
  }

  public function delete() {
    $id = $this->request->getPost("id");
    $deleted = $this->pais_idioma->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('paises_idiomas')); 
  }
}