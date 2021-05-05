<?php 
class Category_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    } 
       public function get_Categorydata($id){      
        return $this->get_Category_by_id($id);
    }  
    
    public function get_Category_by_id($id){
        $query = $this->db->get_where('category', array('category_id' => $id));
		if($query->num_rows()) return $query->row();
		return false;
    }   
     
    public function showAll(){
       $query = $this->db->get('category');
        if($query->num_rows() > 0)
            return $query->result();
        else
            return false;        
    }
     public function addCategory($data){
        return $this->db->insert('category', $data);
    }
    public function updateCategory($id,$field){
        $this->db->where('category_id', $id);
        $this->db->update('category', $field);
        if($this->db->affected_rows() >0)
            return true;
        else
            return false;  
    }
      public function deleteCategory($id){
         $this->db->where('category_id', $id);
        $this->db->delete('category');
           if($this->db->affected_rows() >0)
            return true;
        else
            return false;                
    }
    public function searchCategory($match) {
        $field = array('category_name');    
        $this->db->like('concat('.implode(',',$field).')',$match);
        $query = $this->db->get('category');
         if($query->num_rows() > 0)
            return $query->result();
        else
            return false;        
    }
 

}
?>