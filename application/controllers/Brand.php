<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Brand extends CI_Controller{    
    function __construct(){
        parent::__construct();
         $this->load->model('Brand_model','brand');       
    } 
    public function index(){
        $data['title']='Brand';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar.php');        
        $this->load->view('Brand/index');
        $this->load->view('template/footer');
    }
    public function addBrand(){       
        $config = array(
            array('field' =>'brand_name','label' =>'Brand name',
            'rules' =>'trim|required|is_unique[brand.brand_name]'));
        $this->form_validation->set_rules($config); 
        if($this->form_validation->run()){
            $data = array('brand_name'=> $this->input->post('brand_name') );            
            if($this->brand->addBrand($data)){
               $result['error'] = false;
                $result['msg'] ='Brand added successfully';
            }           
        }else{
            $result['error'] = true;
            $result['msg'] = array('brand_name'=>form_error('brand_name') );            
        }
        
        echo json_encode($result);
    }   
    
     function showAll(){
       $query= $this->brand->showAll();
             if($query){
                   $result['brands']  = $this->brand->showAll();
                   echo json_encode($result);
             }        
    } 
     function updateBrand(){		
         $config = array(
            array('field' => 'brand_name','label' => 'Brand name','rules' => 'trim|required|is_unique[brand.brand_name]')                      
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $result['error'] = true;
            $result['msg'] = array(
                 'brand_name'=>form_error('brand_name'),                
            );
        }else{
          $id = $this->input->post('brand_id');
          $data = array( 'brand_name'=> $this->input->post('brand_name'));
                if($this->brand->updateBrand($id,$data)){
                    $result['error'] = false;
                    $result['success'] = 'Brand updated successfully';
                }
    }
          echo json_encode($result);
     }
    function deleteBrand(){
         $id = $this->input->post('brand_id');
        if($this->brand->deleteBrand($id)){
             $msg['error'] = false;
            $msg['success'] = 'Brand deleted successfully';
        }else{
             $msg['error'] = true;
        }
        echo json_encode($msg);         
    }
    function searchBrand(){
         $value = $this->input->post('text');
          $query =  $this->brand->searchBrand($value);
           if($query){
               $result['brands']= $query;
               echo json_encode($result);
           }           
        
    }
}
    
