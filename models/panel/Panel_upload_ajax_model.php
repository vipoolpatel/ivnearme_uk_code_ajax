<?php

if (! defined ( 'BASEPATH' ))   exit ( 'No direct script access allowed' );
class Panel_upload_ajax_model extends CI_Model{


	function __construct() {
        parent::__construct ();
	}

	function save_upload($title,$image){
        $data = array(
                'title'     => $title,
                'file_name' => $image
            );  
        $result= $this->db->insert('gallery',$data);
        return $result;
    }

    public function get_entries()
        {
            $query = $this->db->get('gallery');
            if (count($query->result()) > 0){
            return $query->result();
          }
        }

   

    public function delete_query($id){
        	return $this->db->delete('gallery', array('id' => $id));
        }

	public function single_entry($id)
        {
        	$this->db->select("*");
        	$this->db->from("gallery");
        	$this->db->where("id", $id);
        	$qr = $this->db->get();
        	if(count($qr->result()) > 0){
        		return $qr->row();
        	}

        }

       

       public function update_entry($title,$image, $id){
       
        $data = array(
                'title'     => $title,
                'file_name' => $image
            );  
        $result= $this->db->update('gallery', $data, array('id' => $id));
        return $result;
    }

       


}
?>

