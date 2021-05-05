<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Coupon extends CI_Controller{
    
    function __construct(){
        parent::__construct();
         $this->load->model('store_model','coupon');       
    }   
    public function index(){
        $data['title']='Coupon';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar.php'); 
        $this->load->view('coupon/index');
        $this->load->view('template/footer');
    }   
    
     function showAll(){
       $query=  $this->coupon->showAll();
        if($query)
            $result['coupons']  = $this->coupon->showAll();             
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
            if($this->coupon->addStore($data)){
               $result['error'] = false;
                $result['msg'] ='Coupon added successfully';
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
               if($this->coupon->updateStore($id,$data)){
                   $result['error'] = false;
                   $result['success'] = 'Coupon updated successfully';
               }
   }
         echo json_encode($result);
    }
  
    function deleteCoupon(){
        $id = $this->input->post('id');
       if($this->coupon->deletecoupon($id)){
            $msg['error'] = false;
           $msg['success'] = 'Coupon deleted successfully';
       }else
            $msg['error'] = true;       
       echo json_encode($msg);         
   }  
    function searchcoupon(){
        $value = $this->input->post('text');
         $query = $this->coupon->searchcoupon($value);
          if($query){
              $result['coupon']= $query;
              $result['status']= 'success';
              $result['discount']=100;
              $result['message']='Price reduced by NRS '.$result['discount'] ;
          }           
       echo json_encode($result);
   }
}
    
