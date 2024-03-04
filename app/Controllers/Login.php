<?php

namespace App\Controllers;

use Config\Services;

class Login extends BaseController
{
  public function index() {
    $data = [];

    if ($this->session->getFlashdata("credentials_error")) {
      $data = ["credentials_error"=>"error"];
    }
    return view("login", $data);
  }

  public function validacion()
  {
    $nick = $this->request->getVar("nick");
    $pass = $this->request->getVar("password");

    if (!$nick || !$pass) {
      return view('login', [
        'credentials_error' => 'error',
      ]);
    } else {
      
      $data = $this->login->validate_user($nick, $pass);   

      if ($data) {
        $this->crear_sesion($data);

        return redirect()->to(base_url('home'));

      } else {
        $this->session->setFlashdata("credentials_error", "error");
        return redirect()->to(base_url('login'));
      }
    }      
  }

  private function crear_sesion($data) {
    $this->session->id_usuario = $data->id;
    $this->session->id_rol = $data->id_rol;
    $this->session->nombre_rol = $data->nombre_rol;
    $this->session->documento = $data->documento;
    $this->session->nombre = $data->nombre;
    $this->session->visualizar = $data->visualizar;
    $this->session->crud = $data->crud;
    $this->session->supervisor = $data->supervisor;
    $this->session->admin = $data->admin;
  }
}