
<?php
if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );
class Panel_modal_ajax_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
       public function get_entries()
        {
                $query = $this->db->get('crud');
                if (count($query->result()) > 0){
                return $query->result();
            }
        }

        public function insert_entry($data)
        {
        	return $this->db->insert('crud', $data);
        }

        public function delete_query($id){
        	return $this->db->delete('crud', array('id' => $id));
        }
        public function single_entry($id)
        {
        	$this->db->select("*");
        	$this->db->from("crud");
        	$this->db->where("id", $id);
        	$qr = $this->db->get();
        	if(count($qr->result()) > 0){
        		return $qr->row();
        	}

        }

        public function update_entry($data)
        {
        	return $this->db->update('crud', $data, array('id' => $data['id']));
        }
       
        public function save_upload($f_name,$type,$image_logo)
        {
            $data = array(
                'f_name' => $f_name,
                'type'   => $type,
                'image_logo' => $image_logo

            );
            $result = $this->db->insert('ajax_modal', $data);
            return $result;
        }

        public function view_ajax_display_records()
        {
            $qy = $this->db->query("select * from ajax_modal");
            return $qy->result();
        }

        // Image Ajax

        public function save_in_database($f_name, $l_name, $c_name)
        {
            $data_v = array(
                'first_name'  => $f_name,
                'last_name'   => $l_name,
                'city_name'   => $c_name
            );
            $q = $this->db->insert('image_ajax', $data_v);
            return $q;
        }

        public function update_in_database($id,$f_name,$l_name,$c_name)
        {
            $data_update = array(
                'first_name' => $f_name,
                'last_name' => $l_name,
                'city_name' => $c_name
            );
            $qs = $this->db->update('image_ajax', $data_update, array('id' => $id));
            return $qs;
        }

        public function dalete_in_database($id){
        	return $this->db->delete('image_ajax', array('id' => $id));
        }

        public function view_image_ajax_single_entry($id)
        {
            $this->db->select("*");
            $this->db->from("image_ajax");
            $this->db->where("id", $id);
            $qr = $this->db->get();
            if(count($qr->result()) > 0){
                return $qr->row();
            }

        }

        // Pic Ajax

        public function save_ajax_insert_in_database($f_name,$a_address,$image_pic)
        {
            $data = array(
                'first_name'   => $f_name,
                'address'      => $a_address,
                'profile_pic'  => $image_pic
            );  
            $result= $this->db->insert('pic_ajax_img',$data);
            return $result;
        }

        public function Update_ajax_Update_in_database($id,$f_name,$a_address,$image_pic)
        {
            $data = array(
                'first_name'   => $f_name,
                'address'      => $a_address,
                'profile_pic'  => $image_pic
            );  
            $result= $this->db->update('pic_ajax_img', $data, array('id' => $id));
            return $result;
        }

        public function pic_dalete_in_database($id){
        	return $this->db->delete('pic_ajax_img', array('id' => $id));
        }

        public function view_pic_ajax_single_entry($id){
            
            $this->db->select("*");
            $this->db->from("pic_ajax_img");
            $this->db->where("id", $id);
            $qr = $this->db->get();
            if(count($qr->result()) > 0){
                return $qr->row();
            }
        }

//
    public function edit_ajax_single_entry($id)
    {
        $this->db->select("*");
        $this->db->from("ajax_modal");
        $this->db->where("id", $id);
        $q = $this->db->get();
        if(count($q->result()) > 0){
            return $q->row();
        }
    }

}
?>