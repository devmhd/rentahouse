<?php

class Ajax extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('region');
	}


	public function index()
	{

		$this->load->helper('html');
		$this->load->helper('url');

		redirect('/browse');

	}

	public function districts()
	{

		$data = $this->region->getAllRegion();

		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));

	}

	public function area($rid)
	{

		$data = $this->region->getAreaByRegion($rid);

		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));

	}

	public function neighborhood($aid)
	{

		$data = $this->region->getNeiByArea($aid);

		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));

	}

	public function checkemail(){

		$email = $this->input->get('email');
		$this->load->model('user');

		$data = $this->user->checkEmail($email);



		$this->output->set_content_type('application/json');

		//if($data) $this->output->set_output('This email is already registered');
		$this->output->set_output($data);
		

	}
}