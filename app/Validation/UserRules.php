<?php
namespace App\Validation;
use App\Models\UserModel;

class UserRules
{

  public function validate_user(string $str, string $fields,array $data){
    $model = new UserModel();
    $user = $model->where('email', $data['email'])
                  ->first();

    if( !$user ){
      return false;
    }

    return password_verify($data['password'], $user['password']);
  }

  public function verified_user(string $str, string $fields,array $data){
    $model = new UserModel();
    $user = $model->where('email', $data['email'])
                  ->first();

    if($user != null){
      if( $user['email_verified_at'] == '0000-00-00 00:00:00'){ return false; }
    }
    
    return true;

  }


}
