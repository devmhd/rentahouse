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

		redirect(base_url().'ads');

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


	public function submitrating(){


//		print_r($_POST);

		$this->load->helper('url');
		$this->load->model('user');

		$loggedIn = $this->input->cookie('loggedIn');


		$slug = $this->input->post('slug');

		if($loggedIn){

			$data['rated'] = $this->input->post('rated');
			$data['review']  = $this->input->post('review');
			$data['rating'] = $this->input->post('rating'); 
			$data['rater'] = $loggedIn; 
			$data['rater_name'] = $this->user->getUserName($loggedIn);

			$slug = $this->input->post('slug');

			$table = $this->input->post('table');
			if($data['rated'] && $data['rating']){

				$this->load->model('rating');
				$this->rating->insertRating($table, $data);




			}




		}

		redirect(base_url()."ad/".$slug);

		


	}
}