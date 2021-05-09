<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogin extends CI_Controller {

	public function index()
	{
		$this->load->model('User');
		$data['listuser'] = $this->User->getData()->result_array();
		$this->load->view('testtes',$data);
	}

	public function tes(){	
		$this->load->model('User');
		$data = array(
			"id_user"=>$this->input->post("id"),
			"email"=>$this->input->post("email"),
			"password"=>$this->input->post("password")
		);
		$this->User->insert($data);
		redirect('AdminLogin/index');
	}

	public function viewForm(){
		$this->load->view('test');
	}
	
	public function deleteData($datadelete){
		$this->load->model('User');
		$where = array(
			'id_user'=>$datadelete
		);
		$this->User->deleteData($where);
		redirect('AdminLogin/index');
	}
	public function loadData($id_user){
		$this->load->model('User');
		$where = array(
			"id_user" => $id_user
		);
		$dataload['data_user'] = $this->User->loadData($where)->result_array();
		$this->load->view('updateform',$dataload);
	}
	public function updateData(){
		$this->load->model('User');
		$data = array(
			"email"=> $this->input->post('email'),
			"password"=> $this->input->post('password')
		);
		$where = array(
			"id_user"=> $this->input->post('id')
		);
		$this->User->updatedata($data,$where);
		redirect('AdminLogin/index');
	}


}
