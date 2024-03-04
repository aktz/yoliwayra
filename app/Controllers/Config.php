<?php

namespace App\Controllers;

class Config extends BaseController
{
  public function index(): string
  {
    return view('config');
  }
}