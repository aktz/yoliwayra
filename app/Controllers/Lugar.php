<?php

namespace App\Controllers;

class Lugar extends BaseController
{
  public function index(): string
  {
    $data["array"] = $this->lugar->getLugaresActivos();
    $data["ciudades"] = $this->ciudad->getCiudadesActivas();

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
    return view('lugares', $data);
  }

  public function insert()
  {
    $nombre = $this->request->getPost("nombre-ins");
    $ciudad = $this->request->getPost("ciudad-ins");
    $region = $this->request->getPost("region-ins");
    $clima = $this->request->getPost("clima-ins");
    $postal = $this->request->getPost("postal-ins");
    $titulo = $this->request->getPost("titulo-ins");
    $subtitulo = $this->request->getPost("subtitulo-ins");
    $descripcion = $this->request->getPost("descripcion-ins");
    $notas = $this->request->getPost("notas-ins");
    $ancestral = $this->request->getPost("hid-ancestral-ins");
    $extremo = $this->request->getPost("hid-extremo-ins");
    $avistamiento = $this->request->getPost("hid-avistamiento-ins");
    $deportivo = $this->request->getPost("hid-deportivo-ins");
    $valor = $this->request->getPost("valor-ins");
    $activo = $this->request->getPost("hid-activo-ins");

    $inactivo = $this->lugar->getLugarNombreCiudad($nombre, $ciudad);

    //Hay inactivo igual, actualiza estado
    if ($inactivo) {
      
      $dataInactivo = [
        "nombre"=>$inactivo["nombre"],
        "ciudad"=>$inactivo["ciudad"],
        "region"=>$inactivo["region"],
        "clima"=>$inactivo["clima"],
        "postal"=>$inactivo["postal"],
        "titulo"=>$inactivo["titulo"],
        "subtitulo"=>$inactivo["subtitulo"],
        "descripcion"=>$inactivo["descripcion"],
        "notas"=>$inactivo["notas"],
        "ancestral"=>$inactivo["ancestral"],
        "extremo"=>$inactivo["extremo"],
        "avistamiento"=>$inactivo["avistamiento"],
        "deportivo"=>$inactivo["deportivo"],
        "valor"=>$inactivo["valor"],
        "activo"=>$activo
      ];     

      if (!$this->validation->run($dataInactivo, 'lugar')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->lugar->update($inactivo["id"], $dataInactivo);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }

    // No existe inactivo igual, inserta
    } else {

      $data = [
        "nombre"=>$nombre,
        "ciudad"=>$ciudad,
        "region"=>$region,
        "clima"=>$clima,
        "postal"=>$postal,
        "titulo"=>$titulo,
        "subtitulo"=>$subtitulo,
        "descripcion"=>$descripcion,
        "notas"=>$notas,
        "ancestral"=>$ancestral,
        "extremo"=>$extremo,
        "avistamiento"=>$avistamiento,
        "deportivo"=>$deportivo,
        "valor"=>$valor,
        "activo"=>$activo
      ];

      if (!$this->validation->run($data, 'lugar')) {
        $this->session->setFlashdata("validation_error", $this->validation->getErrors());
      } else {
        $this->lugar->insert($data);
        $this->session->setFlashdata("upsert_success", "Success"); 
      }
    }   

    return redirect()->to(base_url('lugares'));

  }

  public function update() {
    $id = $this->request->getPost("hid-id-upd");
    $nombre = $this->request->getPost("nombre-upd");
    $ciudad = $this->request->getPost("ciudad-upd");
    $region = $this->request->getPost("region-upd");
    $clima = $this->request->getPost("clima-upd");
    $postal = $this->request->getPost("postal-upd");
    $titulo = $this->request->getPost("titulo-upd");
    $subtitulo = $this->request->getPost("subtitulo-upd");
    $descripcion = $this->request->getPost("descripcion-upd");
    $notas = $this->request->getPost("notas-upd");
    $ancestral = $this->request->getPost("hid-ancestral-upd");
    $extremo = $this->request->getPost("hid-extremo-upd");
    $avistamiento = $this->request->getPost("hid-avistamiento-upd");
    $deportivo = $this->request->getPost("hid-deportivo-upd");
    $valor = $this->request->getPost("valor-upd");
    $activo = $this->request->getPost("hid-activo-upd");

    $data = [
        "nombre"=>$nombre,
        "ciudad"=>$ciudad,
        "region"=>$region,
        "clima"=>$clima,
        "postal"=>$postal,
        "titulo"=>$titulo,
        "subtitulo"=>$subtitulo,
        "descripcion"=>$descripcion,
        "notas"=>$notas,
        "ancestral"=>$ancestral,
        "extremo"=>$extremo,
        "avistamiento"=>$avistamiento,
        "deportivo"=>$deportivo,
        "valor"=>$valor,
        "activo"=>$activo
      ];

    if (!$this->validation->run($data, 'lugar')) {
      $this->session->setFlashdata("validation_error", $this->validation->getErrors());
    } else {
      $this->lugar->update($id, $data);
      $this->session->setFlashdata("upsert_success", "Success"); 
    }

    return redirect()->to(base_url('lugares'));    
  }

  public function delete() {
    $id = $this->request->getPost("id");
    $deleted = $this->lugar->delete($id);

    if ($deleted <= 0) {
      $this->session->setFlashdata("delete_fail", "Delete");  
    } else {
      $this->session->setFlashdata("upsert_success", "Success"); 
    }
    
    return redirect()->to(base_url('lugares')); 
  }
}