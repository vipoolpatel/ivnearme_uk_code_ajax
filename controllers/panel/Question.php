<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {

	
	public function question_list()
	{
		$this->load->view('panel/question/question_list');		
	}



}

