<?php

class Example_model extends CI_Model {

	public function __construct() {
		parent::__construct();

		$this->load->library('form_validation');
	}

	public function validate($post,$type='insert') {
		/* we just handle all types the same in this example */
	
		$rules = array(
			array(
				'field' => 'firstname',
				'label' => 'First Name',
				'rules' => 'required|min_length[3]|max_length[100]|alpha_numeric_spaces'
			),
			array(
				'field' => 'lastname',
				'label' => 'Last Name',
				'rules' => 'required|min_length[3]|max_length[100]|alpha_numeric_spaces'
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|valid_email|min_length[3]|max_length[100]'
			),
			array(
				'field' => 'check_me_out',
				'label' => 'Check Me Out',
				'rules' => 'integer|less_than[2]|greater_than[-1]'
			)
		);

		$success = $this->form_validation->set_rules($rules)->set_data($post)->run();

		return (!$success) ? $this->form_validation->error_array() : $success;
	}

	public function insert($post) {
		$success = $this->validate($post,'insert');
	
		if ($success === true) {
			/* ok it's good insert it into the database or something */
		}
		
		return $success;
	}

} /* end class */