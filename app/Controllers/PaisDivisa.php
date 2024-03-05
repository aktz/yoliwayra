<?php

namespace App\Controllers;

class PaisDivisa extends BaseController
{
  public function index(): string
  {
    $data["divisas"] = $this->divisa->getDivisasActivas();
    $data["paises"] = $this->pais->getPaisesActivos();
    $data["array"] = $this->pais_divisa->getPaisesDivisasActivas();
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
    return view('paises_divisas', $data);
  }

  public function insert()  
  {
    $divisa = $this->request->getPost("divisa-ins");
    $pais = $this->request->getPost("pais-ins");

    $existe = $this->pais_divisa->getPaisDivisa($pais, $divisa);

    if ($existe) {
      $this->session->setFlashdata("validation_error", "Ya existe la divisa para el país.");
    } else {

      $data = [
        "divisa"=>$divisa,
        "pais"=>$pais
      ];
  
      if (!$this->validation->run($data, 'pais_divisa')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->estado->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('paises_divisas'));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $divisa = $this->request->getPost("divisa-upd");
    $pais = $this->request->getPost("pais-upd");

    $data = [
      "divisa"=>$divisa,
      "pais"=>$pais
    ];

    if (!$this->validation->run($data, 'estado')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->estado->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('paises_divisas'));    
  }

  public function delete() {
    $id = $this->request->getPost("id");
    $deleted = $this->estado->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('paises_divisas')); 
  }
}