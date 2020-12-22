<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Support extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (! $this->session->userdata ( 'user_logged_in' )) {
                redirect ( $this->config->item ( 'panel_folder' ) . '/login' );
                exit ();
        }
        
        $this->load->model ( 'panel/panel_support_model', '', TRUE );
          
    }

    function index() {
        redirect ( $this->config->item ( 'panel_folder' ) . '/support/support_list' );        
    }
    
    function support_list() {       
        
        $this->load->library ( 'pagination' );
      
        $total = $this->panel_support_model->countsupport();
        $per_page = 40;
        $data['getSupport'] = $this->panel_support_model->getsupport($per_page, $this->uri->segment ( 4 ));
        $base_url = base_url ().'/panel/support/support_list';
        
        	
        $config ['base_url'] = $base_url;
        $config ['total_rows'] = $total;
        $config ['per_page'] = $per_page;
        $config ['uri_segment'] = '4';
        $this->pagination->initialize ( $config );
        
        
        $data['heder_title'] = 'Support List';
        $this->load->view('panel/support/support_list',$data);        
    }

     function reply($id) {       
        
        $getSupport = $this->db->where('id',$id);
        $getSupport = $this->db->get('support')->row();
        $data['getSupport'] = $getSupport;
        
        $getSupportReply = $this->db->order_by('id','asc');
        $getSupportReply = $this->db->where('support_id',$id);
        $getSupportReply = $this->db->get('support_reply')->result();
        $data['getSupportReply'] = $getSupportReply;
        
        $data['heder_title'] = 'Contact Detail';
        $this->load->view('panel/support/reply',$data);        
    }

     function submitreply(){
            $array = array(
                'support_id' => $this->input->post('id'),
                'message'=> $this->input->post('message'),
                'created_date'=> date('Y-m-d H:i:s'),
                'status'=> 1,
            );
                
            $this->db->insert('support_reply',$array);
            
            $get =  $this->db->where('id',$this->input->post('id'));
            $get =  $this->db->get('support')->row();
               
            $getNurse =  $this->db->where('id',$get->user_id);
            $getNurse =  $this->db->get('nurse')->row();
               
            
            $data['name'] = $getNurse->name;
            $data['subject'] = $get->subject;
            $data['message'] = $this->input->post('message');
            $this->load->library('email');
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->from('info@cbtfornurses.com', 'CBT For Nurses');
            $this->email->to($getNurse->email);
            $htmlMessage = $this->load->view('email_app/reply_message', $data, true);
            $this->email->subject('RE: Message from CBT For Nurses');
            $this->email->message($htmlMessage);
            @$this->email->send();
            
            
            $this->session->set_flashdata ( 'SUCCESS', "Reply successfully send!" );
            redirect ( 'panel/support/reply/'. $this->input->post('id'));
    }

       public function update_support_status(){
            $status = $this->input->post('status');
            $id = $this->input->post('id');
            $array = array(
                'status' => $status,
            );
            
            $update =  $this->db->where('id',$this->input->post('id'));
            $update =  $this->db->update('support',$array);
            
            $json['sucess'] = true;
            echo json_encode($json);
    }

    
}
