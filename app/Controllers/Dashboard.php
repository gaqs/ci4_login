<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
      $data = [];
      echo view('templates/header');
      echo view('dashboard',$data);
      echo view('templates/footer');

    }
}
