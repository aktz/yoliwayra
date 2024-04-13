<?php

namespace App\Controllers;

class CiudadEvento extends BaseController
{
  public function index($id)
  {
    $data["ciudad"] = $this->ciudad->getCiudadActivo($id);
    $data["array"] = $this->ciudad_evento->getCiudadEventosActivos($id);
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
    return view('ciudades_eventos', $data);
  }

  public function insert()  
  {
    $ciudad = $this->request->getPost("ciudad-ins");
    $titulo = $this->request->getPost("titulo-ins");
    $subtitulo = $this->request->getPost("subtitulo-ins");
    $descripcion = $this->request->getPost("descripcion-ins");
    $fecha_inicio = $this->request->getPost("fecha-inicio-ins");
    $fecha_fin = $this->request->getPost("fecha-fin-ins");
    $valor = $this->request->getPost("valor-ins");

    $existe = $this->ciudad_evento->getCiudadEventoDescripcion($ciudad, $titulo);

    if ($existe) {
      $this->session->setFlashdata("validation_error", ["Ya existe el evento para el país."]);
    } else {

      $data = [
        "ciudad"=>$ciudad,
        "titulo"=>$titulo,
        "subtitulo"=>$subtitulo,
        "descripcion"=>$descripcion,
        "fecha_inicio"=>$fecha_inicio,
        "fecha_fin"=>$fecha_fin,
        "valor"=>$valor        
      ];
  
      if (!$this->validation->run($data, 'ciudad_evento')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->ciudad_evento->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('ciudades_eventos' . '/' . $ciudad));
  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $ciudad = $this->request->getPost("ciudad-upd");
    $titulo = $this->request->getPost("titulo-upd");
    $subtitulo = $this->request->getPost("subtitulo-upd");
    $descripcion = $this->request->getPost("descripcion-upd");
    $fecha_inicio = $this->request->getPost("fecha-inicio-upd");
    $fecha_fin = $this->request->getPost("fecha-fin-upd");
    $valor = $this->request->getPost("valor-upd");

    $data = [
        "ciudad"=>$ciudad,
        "titulo"=>$titulo,
        "subtitulo"=>$subtitulo,
        "descripcion"=>$descripcion,
        "fecha_inicio"=>$fecha_inicio,
        "fecha_fin"=>$fecha_fin,
        "valor"=>$valor 
    ];

    if (!$this->validation->run($data, 'ciudad_evento')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->ciudad_evento->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('ciudades_eventos' . '/' . $ciudad));    
  }

  public function delete() {
    $id = $this->request->getPost("id");

    $ciudad_evento = $this->ciudad_evento->getCiudadEvento($id);
    $ciudad = $ciudad_evento["ciudad"];

    $deleted = $this->ciudad_evento->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('ciudades_eventos' . '/' . $ciudad)); 
  }
}