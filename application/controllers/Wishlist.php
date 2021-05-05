<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Wishlist extends My_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('wishlist_model','wishlist');       
    }
    public function index(){
        $data['title']='Wishlist';
        $data['wishlists'] = $this->wishlist->findAll();
        $this->load->view('wishlist_vue', $data); 
    }
    public function manage(){
        $data['title']='Wishlist';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar.php'); 
        $this->load->view('products/index');
        $this->load->view('template/footer');
    }   
     function showAll(){
        $result['wishlists']= $this->wishlist->findAll();       
        echo json_encode($result);      
    }

    public function wishlistDetails($order='wishlist_id',$dir=' ASC'){          
        $data = $this->wishlist->findAll($order,$dir);
        echo json_encode($data);
     }
   
    public function addToWishlist(){    
        $data = json_decode(file_get_contents("php://input"));
        $id = $data->id;              
       //$wishlist = $this->wishlist->find($id);
        $data = array(
                'product_id' => $id, 
                'product_quantity' => 1,
                'user_id' => 1,
            );
            $this->wishlist->addWishlist($data);
            $this->WishlistCount();
        }
    
    public function WishlistCount(){        
        $no=0;
        $wishlist=$this->wishlist->wishlistcontents();
        if($wishlist)
        foreach ($wishlist as $item){         
            $no+=$item->product_quantity;
        }        
        echo $no;
    }
    
    public function showWishlistItems(){ 
            
        $data = $this->wishlist->wishlistcontents();
        $result=array();
        if($data){
            foreach ($data as $item){                 
                $result[]=$this->wishlist->get_productdata($item->product_id);
            }
            echo json_encode($result);
        }             
    }    
    public function removeWishlist(){
        $data = json_decode(file_get_contents("php://input"));
        $rowid = $data->product_id;
            $data = array('product_id'  => $rowid, 'user_id'  => 1);        
        $this->wishlist->deleteWishlist($data);    
        echo true;    
    }
    public function updateWishlist(){
        $data = json_decode(file_get_contents("php://input"));
        $item = array('wish_id'=>$data->wish_id,'product_quantity'=> $data->product_quantity );
        if ($this->wishlist->updatecontents($item))
                echo true;         
           else
                echo  false;           
    }
 
}