<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Product extends My_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('product_model','product');       
    }
    public function index(){
        $data['title']='Product';
        $data['products'] = $this->product->findAll();
        $this->load->view('product_vue', $data); 
    }
    public function manage(){
        $data['title']='Product';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar.php'); 
        $this->load->view('products/index');
        $this->load->view('template/footer');
    }   
     function showAll(){
        $result['products']= $this->product->findAll();       
        echo json_encode($result);      
    }

    public function productDetails($order='product_id',$dir=' ASC'){          
        $data = $this->product->findAll($order,$dir);
        echo json_encode($data);
     }
    function searchproduct(){
        $value = $this->input->post('text');
        $result['products'] = $this->product->searchproduct($value);                           
       echo json_encode($result);
   }  
     function addproduct(){
        $this->load->library('form_validation');        
        //load file helper
        $this->load->helper('file');
        $uploadedFile ='';
        $fileerror='';
		$config = array(
             array('field' => 'product_name','label' => 'Product name','rules' => 'trim|required'),
             array('field' => 'product_quantity','label' => 'Product quantity','rules' => 'trim|required'),
             array('field' => 'product_base_price','label' => 'Product price','rules' => 'trim|required'),
             array('field' => 'product_tax','label' => 'Product tax','rules' => 'trim|required'),                       
        );        
        $this->form_validation->set_rules($config);
        if(isset($_FILES['file'])){             
            //upload configuration
            $config['upload_path']   = PRODUCTS_IMAGES_DIR;
            $config['allowed_types'] = ALLOWED_IMAGES;
            $config['encrypt_name'] = TRUE;
            $config['max_size']      = 500;
            $this->load->library('upload');
            $this->upload->initialize($config);
            //upload file to directory
            if($this->upload->do_upload('file')){
                $uploadData = $this->upload->data();
                $uploadedFile = $uploadData['file_name'];
                $result['error'] = false;                                  
            }else{
                $result['error'] = true;
                $fileerror=$this->upload->display_errors(); 
            }
        }
        if ($this->form_validation->run() == FALSE)
            $result['error'] = true;            
        elseif ($result['error'] == false){
                $data = array( 'product_name'=> $this->input->post('product_name'),
                                'product_quantity'=> $this->input->post('product_quantity'),
                                'product_base_price'=> $this->input->post('product_base_price'),
                                'product_tax'=> $this->input->post('product_tax'),               
                                'product_description'=> $this->input->post('product_description'),
                                'product_image'=> $uploadedFile
                            );               
            if($this->product->addproduct($data)){
               $result['error'] = false;
                $result['msg'] ='Product added successfully';
            }
            elseif(!$this->product->addproduct($data)){
                $result['error'] = false;
                $result['msg'] ='<div class="alert alert-warning">No product was added</div>';
            }
        }
        if ($result['error'] == true){
            $result['msg'] = array(
                'product_name'=>form_error('product_name'),
                'product_quantity'=>form_error('product_quantity'),
                'product_price'=>form_error('product_base_price'),
                'product_tax'=>form_error('product_tax'),
                'product_image'=>$fileerror
            );
        }
        echo json_encode($result);
    }

     function updateproduct(){
        $this->load->library('form_validation');        
        //load file helper
        $this->load->helper('file');
        $uploadedFile =$this->input->post('product_image'); 
        $fileerror='';      
         $config = array(
            array('field' => 'product_name','label' => 'Product name','rules' => 'trim|required'),
            array('field' => 'product_quantity','label' => 'Product quantity','rules' => 'trim|required'),
            array('field' => 'product_base_price','label' => 'Product price','rules' => 'trim|required'),
            array('field' => 'product_tax','label' => 'Product tax','rules' => 'trim|required'),            
        );        
       $this->form_validation->set_rules($config); 
        if(isset($_FILES['file'])){             
                //upload configuration
                $config['upload_path']   = PRODUCTS_IMAGES_DIR;
                $config['allowed_types'] = ALLOWED_IMAGES;
                $config['encrypt_name']  = TRUE;
                $config['max_size']      = 500;
                $this->load->library('upload');
                $this->upload->initialize($config);
                //upload file to directory
                if($this->upload->do_upload('file')){
                    $uploadData = $this->upload->data();//Returns array of containing all of the data related to the file you uploaded.
                    $uploadedFile = $uploadData['file_name'];
                    $result['error'] = false;
                    $result['msg'] = ' File has been uploaded successfully';                   
                }else{
                    $result['error'] = true;
                    $fileerror=$this->upload->display_errors(); 
                }
        }
        if ($this->form_validation->run() == FALSE)
            $result['error'] = true;
        else if ($result['error'] == false){
          $id = $this->input->post('product_id');
          $data = array(
                    'product_name'=> $this->input->post('product_name'),
                    'product_quantity'=> $this->input->post('product_quantity'),
                    'product_base_price'=> $this->input->post('product_base_price'),
                    'product_tax'=> $this->input->post('product_tax'),               
                    'product_description'=> $this->input->post('product_description'),
                     'product_image'=> $uploadedFile
                    );
                if($this->product->updateproduct($id,$data)){
                    $result['error'] = false;
                    $result['msg'] = 'Product updated successfully';
                }
                elseif(!$this->product->updateproduct($id,$data)){
                    $result['error'] = false;
                    $result['msg'] = '<div class="alert alert-warning">No product change was made</div>';
                }
        }
        if ($result['error'] == true){
            $result['msg'] = array(
                'product_name'=>form_error('product_name'),
                'product_quantity'=>form_error('product_quantity'),
                'product_price'=>form_error('product_base_price'),
                'product_tax'=>form_error('product_tax'),
                'product_image'=>$fileerror
            );
        }
          echo json_encode($result);
     }
    function deleteproduct(){
         $id = $this->input->post('id');
        if($this->product->deleteproduct($id)){
            $result['error'] = false;
            $result['msg'] = 'Product deleted successfully';
        }else
            $result['error'] = true;        
        echo json_encode($result);         
    }    
    
    public function addToCart(){    
           $data = json_decode(file_get_contents("php://input"));
           $id = $data->id;              
          $product = $this->product->find($id);
      $data = array(
              'id' => $id,
              'name' => $product->product_name, 
              'price' => $product->product_base_price,
              'qty' => 1, 
              'image'=>$product->product_image,
              'tax'=>$product->product_tax,
              'discount'=>$product->product_discount,
              'special_discount'=>$product->product_special_discount,
        );
        $this->cart->insert($data);
        $this->cartCount();
    }
    public function addToWishlist(){    
        $data = json_decode(file_get_contents("php://input"));
        $id = $data->id;              
       //$product = $this->product->find($id);
        $data = array(
                'product_id' => $id, 
                'product_quantity' => 1,
                'user_id' => 1,
            );
            $this->product->addWishlist($data);
            $this->WishlistCount();
        }
    public function cartCount(){ 
        echo $this->cart->total_items();
    }
    public function WishlistCount(){        
        $no=0;
        $wishlist=$this->product->wishlistcontents();
        if($wishlist)
        foreach ($wishlist as $item){         
            $no+=$item->product_quantity;
        }        
        echo $no;
    }
    public function showCartItems(){        
        $data = $this->cart->contents(true);
        echo json_encode($data);
    }
    public function showWishlistItems(){ 
            
        $data = $this->product->wishlistcontents();
        $result=array();
        if($data){
            foreach ($data as $item){                 
                $result[]=$this->product->get_productdata($item->product_id);
            }
            echo json_encode($result);
        } 
        //echo json_encode($data);      
    }
    public function removeCart(){
        $data = json_decode(file_get_contents("php://input"));
        $rowid = $data->rowid;
            $data = array('rowid'  => $rowid, 'qty'  => 0);        
        $this->cart->update($data);    
        echo true;    
    }
    public function removeWishlist(){
        $data = json_decode(file_get_contents("php://input"));
        $rowid = $data->product_id;
            $data = array('product_id'  => $rowid, 'user_id'  => 1);        
        $this->product->deleteWishlist($data);    
        echo true;    
    }
    public function updateWishlist(){
        $data = json_decode(file_get_contents("php://input"));
        $item = array('wish_id'=>$data->wish_id,'product_quantity'=> $data->product_quantity );
        if ($this->product->updatecontents($item))
                echo true;         
           else
                echo  false;           
    }
    public function updateCart(){
        $data = json_decode(file_get_contents("php://input"));
        $item = array('rowid'=>$data->rowid,'qty'=> $data->qty );
        if ($this->cart->update($item))
                echo true;         
           else
                echo  false;           
    }



 
}