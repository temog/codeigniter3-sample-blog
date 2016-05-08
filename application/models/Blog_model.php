<?php

class Blog_model extends CI_Model {

	public $blog_title;
	public $blog_description;
	public $created_at;

	public function __construct()
	{
		$this->load->database();
	}

	public function get_last_ten_entries()
	{
		$query = $this->db->order_by('created_at', 'DESC')->get('blog', 10);
		return $query->result();
	}

	public function findById($id){

		$query = $this->db->get_where('blog', array('blog_id' => $id));
		$data = $query->result();
		return $data[0] ?? null;
	}


	public function insert($title, $description) {

		// validation 
		if($this->insertValidation($title, $description) !== true){
			return false;
		}

		$this->blog_title = $title;
		$this->blog_description = $description;
		$this->created_at = date("Y-m-d H:i:s");

		if(! $this->db->insert('blog', $this)){
			commonSetError($this, $this->db->error());
			return false;
		}

		commonSetSuccess($this, 'insert success');
		return true;
	}

	public function update($id, $title, $description)
	{
		// validation 
		if($this->updateValidation($id, $title, $description) !== true){
			return false;
		}
		// object(this)突っ込んだら created_at まで更新されたため他の方法で

		$data = ['blog_title' => $title, 'blog_description' => $description];
		if(! $this->db->update('blog', $data, array('blog_id' => $id))){
			commonSetError($this, $this->db->error());
			return false;
		}

		commonSetSuccess($this, 'update success');
		return true;
	}

	public function delete($id)
	{

		$this->load->library('form_validation');
		$this->form_validation->set_data(['id' => $id]);
		$this->form_validation->set_rules(
			'id', 'ID',
			[
				'required',
				['valid_blogId', [$this, 'valid_blogId']],
			]
		);

		if($this->form_validation->run() === false){
			commonSetError($this, $this->form_validation->error_string());
			return false;
		}

		if(! $this->db->delete('blog', ['blog_id' => $id])){
			commonSetError($this, $this->db->error());
			return false;
		}

		commonSetSuccess($this, 'delete success');
		return true;
	}


	public function insertValidation($title, $description){

		$this->load->library('form_validation');
		$this->form_validation->set_data(['title' => $title, 'description' => $description]);

		if($this->form_validation->run('blogInsert') === false){
			commonSetError($this, $this->form_validation->error_string());
			return false;
		}

		return true;
	}

	/*
		ユーザ定義validation が config から使えない・・・
	 */
	public function updateValidation($id, $title, $description){

		$this->load->library('form_validation');
		$this->form_validation->set_data(['id' => $id, 'title' => $title, 'description' => $description]);

		// config/form_valiation から
		if($this->form_validation->run('blogInsert') === false){
			commonSetError($this, $this->form_validation->error_string());
			return false;
		}
		// データ存在チェック
		else {
			$this->form_validation->set_rules(
				'id', 'ID',
				[
					'required',
					['valid_blogId', [$this, 'valid_blogId']],
				]
			);

			if($this->form_validation->run() === false){
				commonSetError($this, $this->form_validation->error_string());
				return false;
			}
		}

		return true;
	}

	public function valid_blogId($id){

		if($this->findById($id)){
			return true;
		}

		return false;
	}


}
