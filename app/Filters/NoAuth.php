<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class NoAuth implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    //filtro para evitar que trate de entrar sin sesion iniciada
    if(session()->get('loggedIn'))
      return redirect()->to(base_url('dashboard'));
  }

  //---------------------------------------------------------------------

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {

  }
}
