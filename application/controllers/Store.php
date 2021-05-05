<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Store extends CI_Controller{
    
    function __construct(){
        parent::__construct();
         $this->load->model('store_model','store');       
    }   
    public function index(){
        $data['title']='Store';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar.php'); 
        $this->load->view('store/index');
        $this->load->view('template/footer');
    }   
    
     function showAll(){
       $query=  $this->store->showAll();
        if($query)
            $result['stores']  = $this->store->showAll();             
        echo json_encode($result);
    }
     function addStore(){
		$config = array(
             array('field' => 'storename','label' => 'storename','rules' => 'trim|required'),
             array('field' => 'lastname','label' => 'Lastname','rules' => 'trim|required'),
             array('field' => 'gender','label' => 'Gender','rules' => 'required'),
             array('field' => 'birthday','label' => 'Birthday','rules' => 'trim|required'),
             array('field' => 'email','label' => 'Email','rules' => 'trim|required'),
             array('field' => 'contact','label' => 'Contact','rules' => 'trim|required'),
             array('field' => 'address','label' => 'Address','rules' => 'trim|required')
        );
        $this->form_validation->set_rules($config);      
        if ($this->form_validation->run() == FALSE) {
            $result['error'] = true;
            $result['msg'] = array(
                'storename'=>form_error('storename'),
                'lastname'=>form_error('lastname'),
                'gender'=>form_error('gender'),
                'birthday'=>form_error('birthday'),
                'email'=>form_error('email'),
                'contact'=>form_error('contact'),
                'address'=>form_error('address')
            );
        }else{
                $data = array(
                'storename'=> $this->input->post('storename'),
                'lastname'=> $this->input->post('lastname'),
                'gender'=> $this->input->post('gender'),
                'birthday'=> $this->input->post('birthday'),
                'email'=> $this->input->post('email'),
                'contact'=> $this->input->post('contact'),
                'address'=> $this->input->post('address')
            );
            if($this->store->addStore($data)){
               $result['error'] = false;
                $result['msg'] ='store added successfully';
            }
        }
        echo json_encode($result);
    }

    function addCoupon(){
		$config = array(
             array('field' => 'coupon_code','label' => 'coupon_code','rules' => 'trim|required'),           
        );
        $this->form_validation->set_rules($config);      
        if ($this->form_validation->run() == FALSE) {
            $result['error'] = true;
            $result['msg'] = array(
                'coupon_code'=>form_error('coupon_code'),               
            );
        }else{
                $data = array(
                'coupon_code'=> $this->input->post('coupon_code'),                
            );
            if($this->store->addStore($data)){
               $result['error'] = false;
                $result['msg'] ='Coupon added successfully';
            }
        }
        echo json_encode($result);
    }

     function updateStore(){		
         $config = array(
             array('field' => 'storename', 'label' => 'storename','rules' => 'trim|required'),
             array('field' => 'lastname', 'label' => 'Lastname', 'rules' => 'trim|required'),
             array('field' => 'gender','label' => 'Gender','rules' => 'required'),
             array('field' => 'birthday', 'label' => 'Birthday', 'rules' => 'trim|required'),
             array('field' => 'email','label' => 'Email','rules' => 'trim|required'),
             array('field' => 'contact', 'label' => 'Contact','rules' => 'trim|required'),
             array( 'field' => 'address', 'label' => 'Address', 'rules' => 'trim|required')
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $result['error'] = true;
            $result['msg'] = array(
                 'storename'=>form_error('storename'),
                'lastname'=>form_error('lastname'),
                'gender'=>form_error('gender'),
                'birthday'=>form_error('birthday'),
                'email'=>form_error('email'),
                'contact'=>form_error('contact'),
                'address'=>form_error('address')
            );
        }else{
          $id = $this->input->post('id');
          $data = array(
                 'storename'=> $this->input->post('storename'),
                'lastname'=> $this->input->post('lastname'),
                'gender'=> $this->input->post('gender'),
                'birthday'=> $this->input->post('birthday'),
                'email'=> $this->input->post('email'),
                'contact'=> $this->input->post('contact'),
                'address'=> $this->input->post('address')
            );
                if($this->store->updateStore($id,$data)){
                    $result['error'] = false;
                    $result['success'] = 'store updated successfully';
                }
    }
          echo json_encode($result);
     }
     function updateCoupon(){		
        $config = array(
            array('field' => 'coupon_code', 'label' => 'coupon_code','rules' => 'trim|required'),            
       );
       $this->form_validation->set_rules($config);
       if ($this->form_validation->run() == FALSE) {
           $result['error'] = true;
           $result['msg'] = array(  'coupon_code'=>form_error('coupon_code'), );
       }else{
         $id = $this->input->post('id');
         $data = array(
                'coupon_code'=> $this->input->post('coupon_code'),               
           );
               if($this->store->updateStore($id,$data)){
                   $result['error'] = false;
                   $result['success'] = 'Coupon updated successfully';
               }
   }
         echo json_encode($result);
    }
    function deleteStore(){
         $id = $this->input->post('id');
        if($this->store->deletestore($id)){
             $msg['error'] = false;
            $msg['success'] = 'store deleted successfully';
        }else
             $msg['error'] = true;
        
        echo json_encode($msg);         
    }
    function deleteCoupon(){
        $id = $this->input->post('id');
       if($this->store->deletecoupon($id)){
            $msg['error'] = false;
           $msg['success'] = 'Coupon deleted successfully';
       }else
            $msg['error'] = true;       
       echo json_encode($msg);         
   }
       function searchStore(){
         $value = $this->input->post('text');
          $query =  $this->store->searchstore($value);
           if($query){
               $result['stores']= $query;
           }           
        echo json_encode($result);
    }


    function searchcoupon(){
        $value = $this->input->post('text');
         $query = $this->store->searchcoupon($value);
          if($query){
              $result['coupon']= $query;
              $result['status']= 'success';
              $result['discount']=100;
              $result['message']='Price reduced by NRS '.$result['discount'] ;
          }           
       echo json_encode($result);
   }
}
    
