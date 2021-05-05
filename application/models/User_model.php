<?php 
class User_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

     public function login($username, $password){
        $result = $this->db->get_where('users', array('username' => $username));
        if($result->num_rows() == 0){
            return false;
        }else{
            $db_password = $result->row(5)->password;
            if(password_verify($password, $db_password)){
                return $result->row(0)->id;
            }else{
                return false;
            } 
        }      
    }    
      public function register(){
        $option = ['cost'=>12];
        $encrypted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT,$option);
            $insert_data = array(
             'firstname'=>$this->input->post('firstname'), 
             'lastname'=>$this->input->post('lastname'),   
             'username'=>$this->input->post('username'),   
             'email'=>$this->input->post('email'),
            'password'=>$encrypted_pass
            );         
          return  $insert_data = $this->db->insert('users', $insert_data);
    }    
    
       public function get_userdata($id){
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row();
    }    
    
    public function check_email($email){
        $res = $this->db->get_where('users', array('email' => $email));
        return $res->num_rows()>0 ?true:false;
    }    
    
    public function get_user_by_email($email){
        $query = $this->db->get_where('users', array('email' => $email));
		if($query->num_rows()) return $query->row();
		return false;
    }   
    
   
    public function update_reset_key($reset_key, $email){
        $this->db->where('email',$email);
        $data = array('validation_code'=>$reset_key);
        $this->db->update('users',$data);
         return $this->db->affected_rows() >0 ? true:false;
    } 
     public function change_password($id){
        $option = ['cost'=>12];
        $field = array(
        'password'=> password_hash($this->input->post('password'), PASSWORD_BCRYPT,$option)
        );     
         $this->db->where('id', $id);
        $this->db->update('users', $field);
         return $this->db->affected_rows() >0 ? true:false;
    }    
     
    public function showAll(){
        $this->db->order_by('id', 'DESC');
       $query = $this->db->get('users');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
     public function addUser($data){
        return $this->db->insert('users', $data);
    }
    public function updateUser($id,$field){
        $this->db->where('id', $id);
        $this->db->update('users', $field);
        if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
        }
        
    }
      public function deleteUser($id){
         $this->db->where('id', $id);
        $this->db->delete('users');
           if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
        }
        
    }
    public function searchUser($match) {
        $field = array('firstname','lastname','gender','birthday','email','contact', 'address');    
        $this->db->like('concat('.implode(',',$field).')',$match);
        $query = $this->db->get('users');
         if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
 

}
?>