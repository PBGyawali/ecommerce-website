<?php 
class Brand_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    } 
       public function get_Branddata($id){      
        return $this->get_Brand_by_id($id);
    }  
    
    public function get_Brand_by_id($id){
        $query = $this->db->get_where('brand', array('brand_id' => $id));
		if($query->num_rows()) return $query->row();
		return false;
    }   
     
    public function showAll(){
       $query = $this->db->get('brand');
        if($query->num_rows() > 0)
            return $query->result();
        else
            return false;        
    }
     public function addBrand($data){
        return $this->db->insert('brand', $data);
    }
    public function updateBrand($id,$field){
        $this->db->where('brand_id', $id);
        $this->db->update('brand', $field);
        if($this->db->affected_rows() >0)
            return true;
        else
            return false;  
    }
      public function deleteBrand($id){
         $this->db->where('brand_id', $id);
        $this->db->delete('brand');
           if($this->db->affected_rows() >0)
            return true;
        else
            return false;                
    }
    public function searchBrand($match) {
        $field = array('brand_name');    
        $this->db->like('concat('.implode(',',$field).')',$match);
        $query = $this->db->get('brand');
         if($query->num_rows() > 0)
            return $query->result();
        else
            return false;        
    }
 

}
?>