<?php

namespace App\Controllers;

class LugarEvento extends BaseController
{
  public function index($id)
  {
    $data["lugar"] = $this->lugar->getLugarActivo($id);
    $data["array"] = $this->lugar_evento->getLugarEventosActivos($id);
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
    return view('lugares_eventos', $data);
  }

  public function insert()  
  {
    $lugar = $this->request->getPost("lugar-ins");
    $titulo = $this->request->getPost("titulo-ins");
    $subtitulo = $this->request->getPost("subtitulo-ins");
    $descripcion = $this->request->getPost("descripcion-ins");
    $fecha_inicio = $this->request->getPost("fecha-inicio-ins");
    $fecha_fin = $this->request->getPost("fecha-fin-ins");
    $valor = $this->request->getPost("valor-ins");

    $existe = $this->lugar_evento->getLugarEventoDescripcion($lugar, $titulo);

    if ($existe) {
      $this->session->setFlashdata("validation_error", ["Ya existe el evento para el país."]);
    } else {

      $data = [
        "lugar"=>$lugar,
        "titulo"=>$titulo,
        "subtitulo"=>$subtitulo,
        "descripcion"=>$descripcion,
        "fecha_inicio"=>$fecha_inicio,
        "fecha_fin"=>$fecha_fin,
        "valor"=>$valor        
      ];
  
      if (!$this->validation->run($data, 'lugar_evento')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->lugar_evento->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('lugares_eventos' . '/' . $lugar));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $lugar = $this->request->getPost("hid-id-lugar-upd");
    $titulo = $this->request->getPost("titulo-upd");
    $subtitulo = $this->request->getPost("subtitulo-upd");
    $descripcion = $this->request->getPost("descripcion-upd");
    $fecha_inicio = $this->request->getPost("fecha-inicio-upd");
    $fecha_fin = $this->request->getPost("fecha-fin-upd");
    $valor = $this->request->getPost("valor-upd");

    $data = [
        "lugar"=>$lugar,
        "titulo"=>$titulo,
        "subtitulo"=>$subtitulo,
        "descripcion"=>$descripcion,
        "fecha_inicio"=>$fecha_inicio,
        "fecha_fin"=>$fecha_fin,
        "valor"=>$valor 
    ];

    if (!$this->validation->run($data, 'lugar_evento')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->lugar_evento->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('lugares_eventos' . '/' . $lugar));    
  }

  public function delete() {
    $id = $this->request->getPost("id");

    $lugar_evento = $this->lugar_evento->getLugarEvento($id);
    $lugar = $lugar_evento["lugar"];

    $deleted = $this->lugar_evento->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('lugares_eventos' . '/' . $lugar)); 
  }
}