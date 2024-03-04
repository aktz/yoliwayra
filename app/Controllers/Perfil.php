<?php

namespace App\Controllers;

class Perfil extends BaseController
{
  public function index(): string
  {
    $data["array"] = $this->perfil->getPerfilesActivos();
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
    return view('perfiles', $data);
  }

  public function insert()
  {
    //traer campos de la vista
    $descripcion = $this->request->getPost("descripcion-ins");
    $crear = $this->request->getPost("hidCrear-ins");
    $actualizar = $this->request->getPost("hidActualizar-ins");
    $eliminar = $this->request->getPost("hidEliminar-ins");
    $aprobar = $this->request->getPost("hidAprobar-ins");
    $activo = $this->request->getPost("hidActivo-ins");

    $inactivo = $this->perfil->getPerfilDescripcion($descripcion);

    //Hay inactivo igual, actualiza estado
    if ($inactivo) {
      
      $dataInactivo = [
        "descripcion"=>$inactivo["descripcion"],
        "crear"=>$crear,
        "actualizar"=>$actualizar,
        "eliminar"=>$eliminar,
        "aprobar"=>$aprobar,
        "activo"=>$activo
      ];

      if (!$this->validation->run($dataInactivo, 'perfil')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->perfil->update($inactivo["id"], $dataInactivo);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }

    // No existe inactivo igual, inserta
    } else {

      $data = [
        "descripcion"=>$descripcion,
        "crear"=>$crear,
        "actualizar"=>$actualizar,
        "eliminar"=>$eliminar,
        "aprobar"=>$aprobar,
        "activo"=>$activo
      ];

      if (!$this->validation->run($data, 'perfil')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->perfil->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('perfiles'));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $descripcion = $this->request->getPost("descripcion-upd");
    $crear = $this->request->getPost("hidCrear-upd");
    $actualizar = $this->request->getPost("hidActualizar-upd");
    $eliminar = $this->request->getPost("hidEliminar-upd");
    $aprobar = $this->request->getPost("hidAprobar-upd");
    $activo = $this->request->getPost("hidActivo-upd");

    $data = [
        "descripcion"=>$descripcion,
        "crear"=>$crear,
        "actualizar"=>$actualizar,
        "eliminar"=>$eliminar,
        "aprobar"=>$aprobar,
        "activo"=>$activo
    ];

    if (!$this->validation->run($data, 'perfil')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->perfil->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('perfiles'));    
  }

  public function delete() {
    $id = $this->request->getPost("id");
    $eliminado = $this->perfil->delete($id);

    if ($eliminado <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('perfiles')); 
  }
}