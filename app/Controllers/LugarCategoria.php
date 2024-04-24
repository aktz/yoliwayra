<?php

namespace App\Controllers;

class LugarCategoria extends BaseController
{
  public function index($id)
  {
    $data["categorias"] = $this->categoria->getCategoriasActivas();
    $data["lugar"] = $this->lugar->getLugarActivo($id);
    $data["array"] = $this->lugar_categoria->getLugarCategoriasActivas($id);

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
    return view('lugares_categorias', $data);
  }

  public function insert()  
  {
    $categoria = $this->request->getPost("categoria-ins");
    $lugar = $this->request->getPost("lugar-ins");
    $notas = $this->request->getPost("notas-ins");

    $existe = $this->lugar_categoria->getLugarCategoriaCombinacion($lugar, $categoria);

    if ($existe) {
      $this->session->setFlashdata("validation_error", ["Ya existe el categoria para el lugar."]);
    } else {

      $data = [
        "categoria"=>$categoria,
        "lugar"=>$lugar,
        "notas"=>$notas
      ];
  
      if (!$this->validation->run($data, 'lugar_categoria')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->lugar_categoria->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('lugares_categorias' . '/' . $lugar));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $categoria = $this->request->getPost("hid-id-categoria-upd");
    $lugar = $this->request->getPost("hid-id-lugar-upd");
    $notas = $this->request->getPost("notas-upd");

    $data = [
      "categoria"=>$categoria,
      "lugar"=>$lugar,
      "notas"=>$notas
    ];

    if (!$this->validation->run($data, 'lugar_categoria')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->lugar_categoria->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('lugares_categorias' . '/' . $lugar));    
  }

  public function delete() {
    $id = $this->request->getPost("id");
    $deleted = $this->lugar_categoria->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('lugares_categorias' . '/' . $lugar)); 
  }
}