<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends My_Controller {
 

	public function view($page = 'index')
{
        if ( ! file_exists(APPPATH.'views/'.$page.'.php')&&! file_exists(APPPATH.'views/'.$page))
        { show_404(); 
        }
        //$data['google_user'] = $this->session->userdata('google_user');
        $data['title'] =ucwords(str_replace(".php", "",$page));
        if($page == 'index'){
            $data['title'] ='Home';
        }else{           
            $data['userData'] = $this->user_model->get_userdata($this->session->userdata('user_id'));
        }
     
        $this->load->view($page, $data);
        
} 

}
