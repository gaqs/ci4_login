<?php

namespace App\Controllers;
use App\Models\UserModel;

class Users extends BaseController
{
    public function index() //login
    {
        $data = [];
        if($this->request->getMethod() == 'post'){
          //validation rules
          $rules = [
            'email' => ['label'=>'correo electrónico', 'rules' => 'required|min_length[6]|max_length[50]|valid_email|verified_user[email]'],
            'password' => ['label'=>'contraseña', 'rules' => 'required|min_length[6]|max_length[255]|validate_user[email,password]']
          ];
          $errors = [
            'email' => [
              'verified_user' => 'Correo electrónico no validado.<br>Haga <a href="'.base_url('users/resend_validation').'?email={value}">click aquí</a> para reenviar el correo de validación.'
            ],
            'password' => [
              'validate_user' => 'Correo electrónico o contraseña no coinciden.'
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
    }//end index


    public function register(){
      $data = [];
      if( $this->request->getMethod() == 'post'){
        //reglas de validacion
        $rules = [
          'name'            => ['label' => 'nombre', 'rules' => 'required|min_length[3]|max_length[20]'],
          'lastname'        => ['label' => 'apellido', 'rules' => 'required|min_length[3]|max_length[20]'],
          'email'           => ['label' => 'correo electrónico', 'rules' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]'],
          'password'        => ['label' => 'contraseña', 'rules' => 'required|min_length[6]|max_length[255]'],
          'repeat_password' => ['label' => 'repetir contraseña', 'rules' => 'matches[password]']
        ];

        if(!$this->validate($rules)){
          $data['validation'] = $this->validator;
        }else{
          //guardar informacion de usuario
          $model = new UserModel();

          $data['name']     = $this->request->getVar('name');
          $data['lastname'] = $this->request->getVar('lastname');
          $data['email']    = $this->request->getVar('email');
          $token            = bin2hex(openssl_random_pseudo_bytes(32));
          $password         = $this->request->getVar('password');

          $data['link'] = base_url('users/email_validation?key='.$data['email'].'&token='.$token);

          $userData = [
            'name'                      => $data['name'],
            'lastname'                  => $data['lastname'],
            'email'                     => $data['email'],
            'password'                  => $password,
            'email_verification_token'  => $token
          ];

          $model->save($userData);

          $message = view('templates/emails/validation',$data);

          $send = send_email($data['email'], '', 'Validacion correo electrónico', $message, '');

          if( $send ){
            session()->setFlashdata('success','Hemos enviado un correo electrónico para validar sus datos y completar el registro.');
          }else{
            session()->setFlashdata('failure','Error al enviar el correo de validación.');
          }
          return redirect()->to('/');
        }
      }

      echo view('templates/header');
      echo view('register',$data);
      echo view('templates/footer');

    }//end register


    public function email_validation(){
      $model = new UserModel();
      $data = [];

      if( $this->request->getMethod() == 'get'){
        $email = $this->request->getVar('key');
        $token = $this->request->getVar('token');

        $user = $model->where('email', $email)
                      ->where('email_verification_token', $token)
                      ->first();

        if( $user != null ){
          //update database email_verified_at
          $userData = [
            'id'                => $user['id'],
            'email_verified_at' => date('y-m-d H:i:s')
          ];
          $model->save($userData);
          session()->setFlashdata('success','Correo validado correctamente.');
        }else{
          session()->setFlashdata('success','Correo validado previamente.');
        }
        return redirect()->to( base_url('users') );
      }
    }//end email_validation


    public function profile(){
      $model = new UserModel();
      $data = [];

      if( $this->request->getMethod() == 'post'){
        //reglas de validacion
        $rules = [
          'name'      => ['label' => 'nombre', 'rules' => 'required|min_length[3]|max_length[20]'],
          'lastname'  => ['label' => 'apellidos', 'rules' => 'required|min_length[3]|max_length[20]'],
        ];
        //solo si se envia via post la password
        if($this->request->getPost('password') != '' ){
          $rules = [
            'password'        => ['label' => 'contraseñas', 'rules' => 'required|min_length[6]|max_length[255]'],
            'repeat_password' => ['label' => 'repetir contraseña', 'rules' => 'matches[password]']
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
    }//end profile


    public function resend_validation(){ //resend funciona solo previa validacion de login que correo existe
      $data['email'] = $this->request->getVar('email');

      $model = new UserModel();
      $user = $model->where('email', $data['email'])->first();
      $data['name']     = $user['name'];
      $data['lastname'] = $user['lastname'];
      $data['link']     = base_url('users/email_validation?key='.$data['email'].'&token='.$user['email_verification_token']);

      $message = view('templates/emails/validation',$data);

      $send = send_email($data['email'], '', 'Validacion correo electrónico', $message, '');

      if( $send ){
        session()->setFlashdata('success','Correo de validación enviado correctamente.');
      }else{
        session()->setFlashdata('failure','Error al enviar el correo de validación.');
      }

      return redirect()->to( base_url('users') );

    }//end resend_validation


    public function forgot(){
      $data = [];
      $model = new UserModel();

      if( $this->request->getMethod() == 'post' ){
        $rules = [
          'email' => ['label' => 'correo electrónico', 'rules' => 'required|min_length[6]|max_length[50]|valid_email|verified_user[email]']
        ];
        $errors = [
          'email' => [
            'verified_user' => 'Correo electrónico no validado.<br>Haga <a href="'.base_url('users/resend_validation').'?email={value}">click aquí</a> para reenviar el correo de validación.'
          ]
        ];

        if(!$this->validate($rules,$errors)){
          $data['validation'] = $this->validator;
        }else{
          $user = $model->where('email', $this->request->getVar('email') )
                         ->first();

          if( $user != null ){
            //ver tiempo desde generado el hash
            $limit_time = strtotime($user['email_verified_at']) + 360; //6 min
            $wait = $limit_time - time();
            if( time() < $limit_time ){
              session()->setFlashdata('failure','Correo de recuperación ya enviado. Espere <b>'.$wait.'</b> segundos.');
            }else{

              $userData = [
                'id'                       => $user['id'],
                'email_verification_token' => bin2hex(openssl_random_pseudo_bytes(32)),
                'email_verified_at'        => date('y-m-d H:i:s')
              ];
              $model->save($userData);

              $data_e['link'] = base_url('users/change_password?key='.$user['email'].'&token='.$userData['email_verification_token']);

              $message = view('templates/emails/recover', $data_e);
              $send = send_email($user['email'], '', 'Olvidaste tu contraseña', $message, '');

              if( $send ){
                session()->setFlashdata('success','Correo de recuperación enviado correctamente.');
                return redirect()->to('/');
              }else{
                session()->setFlashdata('failure','Error al enviar el correo de recuepración.');
              }
            }
          }else{
            //redireccion a forgot con mensaje de correo invalidado
            session()->setFlashdata('failure','Correo electrónico no registrado.');
          }
        }
      }
      echo view('templates/header');
      echo view('forgot',$data);
      echo view('templates/footer');
    }//end forgot


    public function change_password(){
      $model = new UserModel();

      if( $this->request->getMethod() == 'get' ){
        $data['key']    = $this->request->getVar('key');
        $data['token']  = $this->request->getVar('token');

        $user = $model->where('email', $this->request->getVar('key') )
                       ->first();

        $limit_time = strtotime($user['email_verified_at']) + 360; //6 min
        $wait = $limit_time - time();
        if( time() > $limit_time ){
          session()->setFlashdata('failure','Token de recuperacion vencido.');
          return redirect()->to( base_url('users/forgot') );
        }
      }//end get

      if( $this->request->getMethod() == 'post' ){

        $rules = [
          'password'        => ['label' => 'contraseña', 'rules' => 'required|min_length[6]|max_length[255]'],
          'repeat_password' => ['label' => 'repetir contraseña', 'rules' => 'matches[password]']
        ];

        if(!$this->validate($rules)){
          $data['validation'] = $this->validator;
        }else{

          $email     = $this->request->getVar('email');
          $password  = $this->request->getVar('password');

          $user = $model->where('email', $this->request->getVar('email') )
                         ->first();

          $userData = [
            'id'          => $user['id'],
            'password'    => $password,
            'updated_at'  => date('y-m-d H:i:s')
          ];
          $model->save($userData);

          session()->setFlashdata('success','Contraseña actualizada correctamente.');
          return redirect()->to('/');

        }
      }

      echo view('templates/header');
      echo view('change',$data);
      echo view('templates/footer');

    }//end change_password


    public function logout(){
      session()->destroy();
      return redirect()->to(base_url('users'));
    }


}
