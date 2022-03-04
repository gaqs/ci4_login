<?php
use CodeIgniter\Email\Email;

function generate_pass($chars){
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  return substr(str_shuffle($data), 0, $chars);
}

function send_email($send_to, $send_cc, $subject, $message, $attach){
  $email = \Config\Services::email();

  $config = Array(
							'protocol' => 'smtp',
							'SMTPHost' => 'mail.lukasparaemprender.com',
							'SMTPPort' => '587',
							'SMTPUser' => 'postmaster@lukasparaemprender.com',
							'SMTPPass' => 'g3@N1Phrd=JL',
							'mailType' => 'html',
							'charset'  => 'utf-8',
							'newline'	 => "\r\n"
						);

  $email->initialize($config);

  $email->setFrom('postmaster@lukasparaemprender.com', 'Testing');
  $email->setTo($send_to);
  $email->setCC($send_cc);

  $email->attach($attach);

  $email->setSubject($subject);
  $email->setMessage($message);

  if ( $email->send() ){
    return true;
  } else {
    //echo $email->printDebugger();
    return false;
  }

}//end send_email
