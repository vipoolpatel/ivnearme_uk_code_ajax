<?php

if (! defined ( 'BASEPATH' ))   exit ( 'No direct script access allowed' );
class Panel_photo_model extends CI_Model {
    function __construct() {
        parent::__construct ();
    }
            
    public function countPhoto() 
    {
        $this->db->from('photo');

        return $this->db->count_all_results ();
             
    }
        
    public function getPhoto($limit = NULL, $offset = NULL)
    {
        $this->db->select('*');
        $this->db->from('photo');
        $this->db->limit ( $limit, $offset );

        $this->db->order_by('id','desc');
        $query = $this->db->get ();
        return $query->result ();
    }

// Multiple Gallery 
  
    public function getRows_multiple_gallery($id = ''){
        $this->db->select('id,file_name,created');
        $this->db->from('multiple_gallery');
        if($id){
            $this->db->where('id',$id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('created','desc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }    
    public function insert_multiple_gallery($data = array()){
        $insert = $this->db->insert_batch('multiple_gallery',$data);
        return $insert?true:false;
    }   
    //add buttion start

    public function get_rows_multiple_gallery_pic(){
        $this->db->select('*');
        $this->db->from('multiple_gallery_pic');
        $this->db->order_by('id','desc');
        $query = $this->db->get ();
        return $query->result ();
       
    }

    public function insert_multiple_gallery_insert_recoard($data = array()){   
        $insert = $this->db->insert_batch('multiple_gallery_pic',$data);
        return $insert?true:false;
    } 

    public function delete_rows_multiple_gallery_pic($id)
    {
            return $this->db->delete('multiple_gallery_pic', array('id' => $id));
    }  
    //add buttion End
}

?>