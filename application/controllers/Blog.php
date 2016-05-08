<?php

class Blog extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Blog_model');
	}

	public function index(){

		if($this->input->method() == 'post'){

			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$this->Blog_model->insert($title, $description);
		}

		$data['entry'] = $this->Blog_model->get_last_ten_entries();

		commonView($this, 'blog/index', $data);
	}

	public function edit($id){

		if($this->input->method() == 'post'){

			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$this->Blog_model->update($id, $title, $description);
			redirect('blog');
		}

		$data['blog'] = $this->Blog_model->findById($id);
		commonView($this, 'blog/edit', $data);
	}

	public function delete($id){

		if($this->input->method() == 'post'){

			$this->Blog_model->delete($id);
			redirect('blog');
		}

		$data['blog'] = $this->Blog_model->findById($id);
		commonView($this, 'blog/delete', $data);
	}


}

