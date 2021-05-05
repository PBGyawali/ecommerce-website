<?php
if (! defined('BASEPATH'))  exit('No direct script access allowed');
class order_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    function findAll($order='order_id ',$dir=' ASC')   {
        $this->db->order_by($order.' '.$dir);
        return $this->db->get('order')->result();
    }
    function find($id)    {
        return $this->db->where('order_id', $id)->get('order')->row();
    }  
    public function showAll(){
        return $this->findAll();
    }    
    public function get_orderdata($id){
        return $this->find($id);
    }      
     public function addorder($data){
        return $this->db->insert('order', $data);
    }   
    public function ordercontents($id=1){
        return $this->db->where('user_id', $id)->get('order')->result();        
    }
    public function updateorder($id,$field){
        $this->db->where('order_id', $id);
        $this->db->update('order', $field);
        if($this->db->affected_rows() >0)
            return true;
        else
            return false;
    }    
      public function deleteorder($id){
         $this->db->where('order_id', $id);
        $this->db->delete('order');
           if($this->db->affected_rows() >0)
            return true;
        else
            return false;
    }    
    public function searchorder($match) {
        $field = array('order_name','order_quantity','order_base_price','order_tax','order_description');    
        $this->db->like('concat('.implode(',',$field).')',$match);
        $query = $this->db->get('order');
         if($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }





}