<?php
/**
* CodeIgniter
*
* An open source application development framework for PHP
*
* This content is released under the MIT License (MIT)
*
* Copyright (c) 2014 - 2015, British Columbia Institute of Technology
*
* Permission is hereby granted, free of charge, to any person obtaining a copy
* of this software and associated documentation files (the "Software"), to deal
* in the Software without restriction, including without limitation the rights
* to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
* copies of the Software, and to permit persons to whom the Software is
* furnished to do so, subject to the following conditions:
*
* The above copyright notice and this permission notice shall be included in
* all copies or substantial portions of the Software.
*
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
* IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
* FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
* AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
* LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
* OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
* THE SOFTWARE.
*
* @package	CodeIgniter
* @author	EllisLab Dev Team
* @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
* @copyright	Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
* @license	http://opensource.org/licenses/MIT	MIT License
* @link	http://codeigniter.com
* @since	Version 1.0.0
* @filesource
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	* Index Page for this controller.
	*
	* Maps to the following URL
	* 		http://example.com/index.php/welcome
	*	- or -
	* 		http://example.com/index.php/welcome/index
	*	- or -
	* Since this controller is set as the default controller in
	* config/routes.php, it's displayed at http://example.com/
	*
	* So any other public methods not prefixed with an underscore will
	* map to /index.php/welcome/<method_name>
	* @see http://codeigniter.com/user_guide/general/urls.html
	*/
	public function __construct() {
		parent::__construct();

		$this->load->model('example_model');
	}

	public function index() {
		$this->load->helper('form');

		$this->load->view('welcome_message');
	}

	/*
	I personally believe the validation goes in the model
	if the validation goes in the form then the controller would need to 
	have detailed information about the model I don't feel this is a good seperation
	between Model and Controller. I feel the model should validate it's own input.
	That way if the model changes for what ever reason
	the model can change it's validation as needed
	instead of going to 3 or 4 controllers which work with this model
	and make the changes. This binds the controller to closesly with the model storage
	Like I mentioned before using this method we don't need to even "leave" the form until 
	it's good
	*/

	/*
	In this example both of these are pretty much the same
	but, there could be other processing that might need to take place
	in one and not the other.
	*/
	public function form_post_validation() {
		$json['success'] = true;

		$success = $this->example_model->validate($this->input->post(),'insert');

		if ($success !== true) {
			$json['success'] = false;
			$json['errors'] = $success;
		} else {
			$json['link'] = 'https://github.com/dmyers2004/CI3-Ajax-Post---Model-Validation/archive/master.zip';
			$json['text'] = 'GitHub Download';
		}

		$this->output->json($json);
	}

	public function form_post() {
		$json['success'] = true;

		$success = $this->example_model->insert($this->input->post());

		if ($success !== true) {
			/*
			ok since we already validated this it should be good
			if it's not then somebody is messing around with the input
			*/
			show_error('Validation Error');
		}
		
		$this->load->view('thank_you');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */