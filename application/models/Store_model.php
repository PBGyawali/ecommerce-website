<?php 
class Store_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }
       public function get_storedata($id){
        $query = $this->db->get_where('store', array('store_id' => $id));
        return $query->row();
    } 
     
     
    public function showAll(){
       $query = $this->db->get('store');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
     public function addStore($data){
        return $this->db->insert('store', $data);
    }
    public function addCoupon($data){
        return $this->db->insert('coupon', $data);
    }
    public function updateStore($id,$field){
        $this->db->where('store_id', $id);
        $this->db->update('store', $field);
        if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
        }        
    }
    public function updateCoupon($id,$field){
        $this->db->where('coupon', $id);
        $this->db->update('coupon', $field);
        if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
        }        
    }

      public function deletestore($id){
         $this->db->where('store_id', $id);
        $this->db->delete('store');
           if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
        }
        
    }
    public function deletecoupon($id){
        $this->db->where('coupon_id', $id);
       $this->db->delete('coupon');
          if($this->db->affected_rows() >0){
           return true;
       }else{
           return false;
       }
       
   }
    public function searchstore($match) {
        $field = array('firstname','lastname','gender','birthday','email','contact', 'address');    
        $this->db->like('concat('.implode(',',$field).')',$match);
        $query = $this->db->get('store');
         if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function searchcoupon($match) {    ;
        $field = array('coupon_code'=>$match);    
        $query =$this->db->get_where('coupon',$field);        
         if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
 
 

}
?>