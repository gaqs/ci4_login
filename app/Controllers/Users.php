<?php

namespace App\Controllers;
use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $data = [];
        if($this->request->getMethod() == 'post'){
          //validation rules
          $rules = [
            'email' => ['label'=>'Correo electrónico', 'rules' => 'required|min_length[6]|max_length[50]|valid_email'],
            'password' => ['label'=>'Contraseña', 'rules' => 'required|min_length[6]|max_length[255]|validate_user[email,password]']
          ];

          $errors = [
            'password' => [
              'validate_user' => 'Correo electrónico o contraseña no coinciden'
            ]
          ];

          if(!$this->validate($rules, $errors)){
            $data['validation'] = $this->validator;
          }else{
            $model = new UserModel();
            $user = $model->where('email', $this->request->getVar('email'))
                          ->first();

            $data = [
              'id'        => $user['id'],
              'name'      => $user['name'],
              'lastname'  => $user['lastname'],
              'email'     => $user['email'],
              'loggedIn'  => true,
            ];
            session()->set($data);
            return redirect()->to( base_url('dashboard'));
          }
        }

        echo view('templates/header');
        echo view('login',$data);
        echo view('templates/footer');
    }

    public function register(){
      $data = [];
      if( $this->request->getMethod() == 'post'){
        //reglas de validacion
        $rules = [
          'name'            => 'required|min_length[3]|max_length[20]',
          'lastname'        => 'required|min_length[3]|max_length[20]',
          'email'           => 'required|min_length[6]|max_length[50]|valid_email|is_unique[administrators.email]',
          'password'        => 'required|min_length[6]|max_length[255]',
          'repeat_password' => 'matches[password]'
        ];

        if(!$this->validate($rules)){
          $data['validation'] = $this->validator;
        }else{
          //guardar informacion de usuario
          $model = new UserModel();
          $userData = [
            'name'      => $this->request->getVar('name'),
            'lastname'  => $this->request->getVar('lastname'),
            'email'     => $this->request->getVar('email'),
            'password'  => $this->request->getVar('password')
          ];

          $model->save($userData);
          session()->setFlashdata('success','Registro Completo');
          return redirect()->to('/');
        }
      }

      echo view('templates/header');
      echo view('register',$data);
      echo view('templates/footer');
    }


    public function profile(){
      $model = new UserModel();
      $data = [];

      if( $this->request->getMethod() == 'post'){
        //reglas de validacion
        $rules = [
          'name'      => 'required|min_length[3]|max_length[20]',
          'lastname'  => 'required|min_length[3]|max_length[20]',
        ];
        //solo si se envia via post la password
        if($this->request->getPost('password') != '' ){
          $rules = [
            'password'        => 'required|min_length[6]|max_length[255]',
            'repeat_password' => 'matches[password]'
          ];
        }


        if(!$this->validate($rules)){
          $data['validation'] = $this->validator;
        }else{
          //guardar informacion de usuario
          $userData = [
            'id'        => session()->get('id'),
            'name'      => $this->request->getVar('name'),
            'lastname'  => $this->request->getVar('lastname'),
          ];
          //solo si se envia via post la password
          if($this->request->getPost('password') != '' ){
            $userData['password'] = $this->request->getPost('password');
          }

          $model->save($userData);
          session()->setFlashdata('success','Actualizacion Completa');
          return redirect()->to( base_url('users/profile') );
        }
      }

      $data['user'] = $model->where('id', session()->get('id'))->first();
      echo view('templates/header');
      echo view('profile',$data);
      echo view('templates/footer');
    }


    public function logout(){
      session()->destroy();
      return redirect()->to(base_url('users'));
    }


}
