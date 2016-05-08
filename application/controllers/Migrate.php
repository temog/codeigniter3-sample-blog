<?php

class Migrate extends CI_Controller {

	public function index() {

		if($_SERVER['REMOTE_ADDR'] ?? false){
			show_404();
		}

		$this->load->library('migration');

		if ($this->migration->current() === FALSE)
		{
			show_error($this->migration->error_string());
		}
	}

	public function version($v) {

		if($_SERVER['REMOTE_ADDR'] ?? false){
			show_404();
		}

		$this->load->library('migration');

		if ($this->migration->version($v) === FALSE)
		{
			show_error($this->migration->error_string());
		}
	}


}

