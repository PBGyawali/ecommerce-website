<?php
if (! defined('BASEPATH'))  exit('No direct script access allowed');
class product_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    function findAll($order='product_id ',$dir=' ASC')   {
        $this->db->order_by($order.' '.$dir);
        return $this->db->get('product')->result();
    }
    function find($id)    {
        return $this->db->where('product_id', $id)->get('product')->row();
    }  
    public function showAll(){
        return $this->findAll();
    }
    
    public function get_productdata($id){
        return $this->find($id);
    }      
    
     
     public function addproduct($data){
        return $this->db->insert('product', $data);
    }
    public function addWishlist($data){
        return $this->db->insert('wishlist', $data);
    }
    public function wishlistcontents($id=1){
        return $this->db->where('user_id', $id)->get('wishlist')->result();        
    }
    public function updateproduct($id,$field){
        $this->db->where('product_id', $id);
        $this->db->update('product', $field);
        if($this->db->affected_rows() >0)
            return true;
        else
            return false;
    }
    public function updatecontents($id,$field){
        $this->db->where('product_id', $id);
        $this->db->update('wishlist', $field);
        if($this->db->affected_rows() >0)
            return true;
        else
            return false;
    }
      public function deleteproduct($id){
         $this->db->where('product_id', $id);
        $this->db->delete('product');
           if($this->db->affected_rows() >0)
            return true;
        else
            return false;
    }
    public function deleteWishlist($data){   
       $this->db->delete('wishlist',$data);
          if($this->db->affected_rows() >0)
           return true;
       else
           return false;
   }
    public function searchproduct($match) {
        $field = array('product_name','product_quantity','product_base_price','product_tax','product_description');    
        $this->db->like('concat('.implode(',',$field).')',$match);
        $query = $this->db->get('product');
         if($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }





}