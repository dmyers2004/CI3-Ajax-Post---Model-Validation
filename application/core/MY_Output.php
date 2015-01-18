<?php 

class MY_Output extends CI_Output {

	public function json($data = [], $val = null) {	
		$data = ($val !== NULL) ? [$data => $val] : $data;
		$json = (is_array($data)) ? json_encode($data) : $data;

		$this
			->nocache()
			->set_content_type('application/json', 'utf=8')
			->set_output($json);

		/* allow chaining */
		return $this;
	}

	public function nocache() {	
		$this->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
		$this->set_header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
		$this->set_header('Cache-Control: post-check=0, pre-check=0', false);
		$this->set_header('Pragma: no-cache');

		/* allow chaining */
		return $this;
	}

} /* end class */