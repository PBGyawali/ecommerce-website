<?php
if (! defined('BASEPATH'))  exit('No direct script access allowed');
class wishlist_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    function findAll($order='wishlist_id ',$dir=' ASC')   {
        $this->db->order_by($order.' '.$dir);
        return $this->db->get('wishlist')->result();
    }
    function find($id)    {
        return $this->db->where('wishlist_id', $id)->get('wishlist')->row();
    }  
    public function showAll(){
        return $this->findAll();
    }
    
    public function get_wishlistdata($id){
        return $this->find($id);
    }
     
     public function addwishlist($data){
        return $this->db->insert('wishlist', $data);
    }    
    public function wishlistcontents($id=1){
        return $this->db->where('user_id', $id)->get('wishlist')->result();        
    }
    public function updatewishlist($id,$field){
        $this->db->where('wishlist_id', $id);
        $this->db->update('wishlist', $field);
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
    public function searchwishlist($match) {
        $field = array('wishlist_name','wishlist_description');    
        $this->db->like('concat('.implode(',',$field).')',$match);
        $query = $this->db->get('wishlist');
         if($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }





}