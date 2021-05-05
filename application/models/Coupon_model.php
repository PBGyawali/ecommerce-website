<?php 
class Coupon_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }
       public function get_storedata($id){
        $query = $this->db->get_where('coupon', array('coupon_id' => $id));
        return $query->row();
    } 
     
     
    public function showAll(){
       $query = $this->db->get('coupon');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
   
    public function addCoupon($data){
        return $this->db->insert('coupon', $data);
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

      
    public function deletecoupon($id){
        $this->db->where('coupon_id', $id);
       $this->db->delete('coupon');
          if($this->db->affected_rows() >0){
           return true;
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