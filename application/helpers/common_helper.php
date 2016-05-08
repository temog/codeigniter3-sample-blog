<?php

function commonView($c, $path, $data = []){

	$data['templateContent'] = $c->load->view($path, $data, true);
	$data['error'] = commonGetError($c);
	$data['success'] = commonGetSuccess($c);

	$c->load->view('template', $data);
}

/*
	flash が get post 別々に1度使わないと消えないため
	(post で表示したあと get で読み込むとまた出てしまう）
	明示的に unset している
*/
function commonSetError($c, $message){

	if(is_array($message)){
		$message = implode("\n", $message);
	}

	$c->session->set_flashdata('error', $message);
}

function commonGetError($c){
	$error = $c->session->flashdata('error');
	$c->session->unset_userdata('error');
	return $error;
}

function commonSetSuccess($c, $message){

	$c->session->set_flashdata('success', $message);
}

function commonGetSuccess($c){
	$success = $c->session->flashdata('success');
	$c->session->unset_userdata('success');
	return $success;
}

