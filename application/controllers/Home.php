<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends My_Controller {

public function __construct(){
    parent::__construct();
    $this->load->model('user_model','user');     
}
public function index(){
    $data['title']='Sign in /Register';
    $this->load->view('includes/head',$data);
    $this->load->view('login');    
    $this->load->view('includes/foot');
}

public function register(){
    $validator = array('success' => false, 'message' =>array());
    $validation_data = array(
    array('field' => 'firstname','label' => 'Firstname','rules' => 'trim|required'),
    array('field' => 'lastname','label' => 'Lastname','rules' => 'trim|required'),
    array('field' => 'username','label' => 'Username','rules' => 'trim|required|is_unique[users.username]'),
    array('field' => 'email','label' => 'Email','rules' => 'trim|required|valid_email|is_unique[users.email]' ),
    array('field' => 'password','label' => 'Password','rules' => 'trim|required|matches[confirm_password]' ),
    array('field' => 'confirm_password','label' => 'Confirm Password','rules' => 'trim|required')
    );
    $this->form_validation->set_rules($validation_data);
    if($this->form_validation->run()){
        $this->user->register();
        $validator['success'] = true;
        $validator['message']['success'] = 'Successfully Registered';            
    }else{
        $validator['success'] = false;
        foreach($_POST as $key =>$value){
            $validator['message'][$key] = form_error($key);
        }
    }
    echo json_encode($validator);
}

public function login(){
    $validator = array('error' => true, 'message' =>array());
    $validation_data = array(
          array('field' => 'username','label' => 'Username', 'rules' => 'trim|required'),
          array('field' => 'password','label' => 'Password','rules' => 'trim|required')
        );
    $this->form_validation->set_rules($validation_data);
    if($this->form_validation->run()===false){
      $validator['error'] = true;
        foreach($_POST as $key =>$value){
            $validator['message'][$key] = form_error($key);
        }
    }else{
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $login = $this->user->login($username, $password);
        if($login){
        $data = array('user_id' => $login,'logged_in' => true);
        $this->session->set_userdata($data);
        $validator['error'] = false;
        $validator['message']['success'] = 'Dashboard';
        }else{
        $validator['error'] = true;
        $validator['message']['failed'] = 'Incorrect username or password'; 
        }
    }
    echo json_encode($validator);
}
public function logout(){
    $this->session->sess_destroy();
    redirect('./','refresh');
}
public function forgot_password(){
    $this->form_validation->set_rules('email','Email', 'trim|required|valid_email');
    if($this->form_validation->run()){
        $email = $this->input->post('email');
    $email_check = $this->user->check_email($email);
    if($email_check){
        $data['error'] = false;
        $user = $this->user->get_user_by_email($email);
        $reset_key = md5(uniqid($email));
       if( $this->user->update_reset_key($reset_key, $email)){
    $this->load->library("phpmailer");
           $mail = $this->phpmailer->load();
           $mail->isSMTP();
           $mail->Host = 'smtp.gmail.com'; 
           $mail->Username = "prakhar.deutschland@gmail.com";                 
           $mail->Password = 'philieep'; 
           $mail->Port = 465; 
           $mail->SMTPSecure = 'ssl';  
           $mail->SMTPAuth = true;
           $mail->isHTML(true); 
           
           $mail->setFrom(SITE_NAME.'.com');
           $mail->addAddress($email);
           $mail->Subject = 'Reset your password';
           $mail->Body = '<html>';
           $mail->Body .= "<body>";
           $mail->Body .= "<div style='background-color:#f2f3f5; padding:30px;'>";
           $mail->Body .= "<div style='background-color:#42a5f5;border: 1px solid rgba(0, 0, 0, 0.125);border-radius:0.25rem 0.25rem 0px 0px; padding:10px;'>";
           $mail->Body .= "<h1 style=' margin-bottom: 0.5rem;font-family: inherit;font-weight: 500;line-height: 1.1;color:white;text-align: center;'>Hi, ".$user->firstname." ".$user->lastname."</h1>";
           $mail->Body .= '</div>';
           $mail->Body .= "<div style='background-color:white;border: 10px solid rgba(0, 0, 0, 0.125);border-radius:0px 0px 0.25rem 0.25rem; padding:50px;'>";
           $mail->Body .= '<h3 style="text-align: center;color: #292b2c;">Your Security Code:</h3>';
           $mail->Body .= '<h3 style="text-align: center;color: #292b2c;">'.$reset_key.'</h3>';
           $mail->Body .= '</div>';
           $mail->Body .= '</div>';
           $mail->Body .= '</body>';
           $mail->Body .= '</html>';
           if($mail->send()){
               $data['error'] = false;
               $data['email'] = $email;
           }else{
               $data['error'] = true;
               $data['message'] = 'Cannot send email! Kindly contact to our customer service to help you';
           }
       }
    }else{
        $data['error'] = true;
        $data['message'] = 'Email was not found';
    }
}else{
        $data['error'] = true;
        $data['message'] = form_error('email');
    }
        echo json_encode($data); 
}

public function change_password(){
     $validation_data = array(
    array('field' => 'password','label' => 'Password','rules' => 'trim|required|matches[confirm_password]' ),
    array('field' => 'confirm_password','label' => 'Confirm Password','rules' => 'trim|required' )
    );
    $this->form_validation->set_rules($validation_data);
     if($this->form_validation->run()){
       $result=$this->user->change_password($this->input->post('id'));
        if($result){
            $data['error'] = false;
            $data['message'] = 'Your password has been successfully changed';
        }else{
            $data['error'] = true;
            $data['message'] = 'Your password cannot be change sorry ';
        }
     }else{
        $data['error'] = true;
        $data['message'] = form_error('password');
     }
    echo json_encode($data);
}


}
