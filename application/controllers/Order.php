<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Order extends My_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('order_model','order');       
    }
    public function index(){
        $data['title']='order';
        $data['orders'] = $this->order->findAll();
        $this->load->view('order_vue', $data); 
    }
    public function manage(){
        $data['title']='order';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar.php'); 
        $this->load->view('orders/index');
        $this->load->view('template/footer');
    }   
     function showAll(){
        $result['orders']= $this->order->findAll();       
        echo json_encode($result);      
    }

    public function orderDetails($order='order_id',$dir=' ASC'){          
        $data = $this->order->findAll($order,$dir);
        echo json_encode($data);
     }
    function searchorder(){
        $value = $this->input->post('text');
        $result['orders'] = $this->order->searchorder($value);                           
       echo json_encode($result);
   }  
     function addorder(){
        $this->load->library('form_validation'); 
		$config = array(
             array('field' => 'order_name','label' => 'order name','rules' => 'trim|required'),
             array('field' => 'order_quantity','label' => 'order quantity','rules' => 'trim|required'),
             array('field' => 'order_address','label' => 'order address','rules' => 'trim|required'),                                  
        );        
        $this->form_validation->set_rules($config);       
      
                $data = array( 'order_name'=> $this->input->post('order_name'),
                                'order_quantity'=> $this->input->post('order_quantity'),                                             
                                'order_address'=> $this->input->post('order_address'),                               
                            );               
            if($this->order->addorder($data)){
               $result['error'] = false;
                $result['msg'] ='order added successfully';
            }
            elseif(!$this->order->addorder($data)){
                $result['error'] = false;
                $result['msg'] ='<div class="alert alert-warning">No order was added</div>';
            }        
        if ($result['error'] == true){
            $result['msg'] = array(
                'order_name'=>form_error('order_name'),
                'order_quantity'=>form_error('order_quantity'),
                'order_address'=>form_error('order_address'),
                           
            );
        }
        echo json_encode($result);
    }

     function updateorder(){
        $this->load->library('form_validation');           
         $config = array(
            array('field' => 'order_name','label' => 'order name','rules' => 'trim|required'),
            array('field' => 'order_quantity','label' => 'order quantity','rules' => 'trim|required'),
            array('field' => 'order_address','label' => 'order address','rules' => 'trim|required'),                      
        );        
       $this->form_validation->set_rules($config);       
        if ($this->form_validation->run() == FALSE)
            $result['error'] = true;
        else {
          $id = $this->input->post('order_id');
          $data = array(
                    'order_name'=> $this->input->post('order_name'),
                    'order_quantity'=> $this->input->post('order_quantity'),                                 
                    'order_address'=> $this->input->post('order_address'),                   
                    );
                if($this->order->updateorder($id,$data)){
                    $result['error'] = false;
                    $result['msg'] = 'order updated successfully';
                }
                elseif(!$this->order->updateorder($id,$data)){
                    $result['error'] = false;
                    $result['msg'] = '<div class="alert alert-warning">No order change was made</div>';
                }
        }
        if ($result['error'] == true){
            $result['msg'] = array(
                'order_name'=>form_error('order_name'),
                'order_quantity'=>form_error('order_quantity'),
                'order_address'=>form_error('order_base_price'),                             
            );
        }
          echo json_encode($result);
     }
    function deleteorder(){
         $id = $this->input->post('id');
        if($this->order->deleteorder($id)){
            $result['error'] = false;
            $result['msg'] = 'order deleted successfully';
        }else
            $result['error'] = true;        
        echo json_encode($result);         
    }   
       
    public function showCartItems(){        
        $data = $this->cart->contents(true);       
    }
    public function showorderItems(){
        $data = $this->order->ordercontents();
        $result=array();
        if($data){
            foreach ($data as $item){                 
                $result[]=$this->order->get_orderdata($item->order_id);
            }
            echo json_encode($result);
        }         
    }
   
    public function removeorder(){
        $data = json_decode(file_get_contents("php://input"));
        $rowid = $data->order_id;
            $data = array('order_id'  => $rowid, 'user_id'  => 1);        
        $this->order->deleteorder($data);    
        echo true;    
    }
       



 
}