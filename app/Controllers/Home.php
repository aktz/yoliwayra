<?php

namespace App\Controllers;

class Home extends BaseController
{
  public function index(): string
  {
    $data = [];
    $session = $this->session->user;

    if ($session) {
      $data["profile"] = $session["profile"];
    }   

    return view('home', $data);
  }
}
