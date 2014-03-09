<?php

class Handler extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('ad');

		$this->load->helper('html');
		$this->load->helper('url');
	}


	public function index()
	{

		redirect('/browse');

	}



	public function newad()
	{

		$title = $this->input->post('title');
		if(!$title) redirect('/newad');

		$region = $this->input->post('region');
		if($region=='none') redirect('/newad');

		$area = $this->input->post('area');
		if($area=='none') redirect('/newad');

		$neigh = $this->input->post('neigh');
		if($neigh=='none') redirect('/newad');

		$n_bed = $this->input->post('n_bed');
		if($n_bed=='none') redirect('/newad');

		$n_bath = $this->input->post('n_bath');
		if($n_bath=='none') redirect('/newad');

		$n_living = $this->input->post('n_living');
		if($n_living=='none') redirect('/newad');

		$n_balcony = $this->input->post('n_balcony');
		if($n_balcony=='none') redirect('/newad');

		$n_dining = $this->input->post('n_dining');
		if($n_dining=='none') redirect('/newad');

		$description = $this->input->post('description');
		if(!$description) $description='none';

		$sqft = $this->input->post('sqft');
		if(!$sqft) redirect('/newad');

		$rent = $this->input->post('rent');
		if(!$rent) redirect('/newad');

		$contactno = $this->input->post('contactno');
		if(!$contactno) redirect('/newad');

		$availabledate = $this->input->post('availabledate');
		if(!$availabledate) redirect('/newad');


		


		print_r($this->input->post());

		$this->ad->insert($this->input->post());

	//	echo $this->slugify($title);

//		$data = $this->region->getAllRegion();

//		$this->output->set_content_type('application/html');
		//$this->output->set_output($address);

	}

	
	
}