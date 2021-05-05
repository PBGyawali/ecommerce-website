<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Controller{    
    function __construct(){
        parent::__construct();
         $this->load->model('Category_model','category');       
    } 
    public function index(){
        $data['title']='Category';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar.php'); 
        $this->load->view('Category/index');
        $this->load->view('template/footer');
    }
    public function addCategory(){       
        $config = array(
            array('field' =>'category_name','label' =>'Category name',
            'rules' =>'trim|required|is_unique[category.category_name]'));
        $this->form_validation->set_rules($config); 
        if($this->form_validation->run()){
            $data = array('category_name'=> $this->input->post('category_name') );            
            if($this->category->addCategory($data)){
               $result['error'] = false;
                $result['msg'] ='Category added successfully';
            }           
        }else{
            $result['error'] = true;
            $result['msg'] = array('category_name'=>form_error('category_name') );            
        }       
        echo json_encode($result);
    }   
    
     function showAll(){
       $query= $this->category->showAll();
             if($query){
                   $result['categories']  = $this->category->showAll();
                   echo json_encode($result);
             }        
    } 
     function updateCategory(){		
         $config = array(
            array('field' => 'category_name','label' => 'Category name','rules' => 'trim|required|is_unique[category.category_name]')                      
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $result['error'] = true;
            $result['msg'] = array(
                 'category_name'=>form_error('category_name'),                
            );
        }else{
          $id = $this->input->post('category_id');
          $data = array( 'category_name'=> $this->input->post('category_name'));
                if($this->category->updateCategory($id,$data)){
                    $result['error'] = false;
                    $result['success'] = 'Category updated successfully';
                }
    }
          echo json_encode($result);
     }
    function deleteCategory(){
         $id = $this->input->post('category_id');
        if($this->category->deleteCategory($id)){
             $msg['error'] = false;
            $msg['success'] = 'Category deleted successfully';
        }else
             $msg['error'] = true;    
        echo json_encode($msg);         
    }
    function searchCategory(){
         $value = $this->input->post('text');
          $query =  $this->category->searchCategory($value);
           if($query){
               $result['categories']= $query;
               echo json_encode($result);
           }           
        
    }
}
    
