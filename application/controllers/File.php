<?php

class File extends My_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function upload($file,$destination=PRODUCTS_IMAGES_DIR,$types=ALLOWED_IMAGES){ 
            $this->load->helper('file'); 
            $this->load->library('upload');
            $config['upload_path']   = $destination;
            $config['allowed_types'] = $types;
            $config['encrypt_name']  = TRUE;
            $config['max_size']      = 500;            
            $this->upload->initialize($config);
            if($this->upload->do_upload('file')){
                $uploadData = $this->upload->data();
                $result['filename']=$uploadData['file_name'];
                $result['error'] = false;
                $result['msg'] = ' File has been uploaded successfully';                   
            }else{
                $result['error'] = true;
                $fileerror=$this->upload->display_errors(); 
            }
    }
    
}


















}