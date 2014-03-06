<?php

class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{

		$this->load->helper('html');
		$this->load->helper('url');

		$data['page_title'] = "Rent A House"; // Capitalize the first letter
		$data['page_slug'] = 'index';

		$this->load->view('templates/header', $data);
		$this->load->view('statics/homepage', $data);
		$this->load->view('templates/footer', $data);

	}

	public function view($page = 'newad')
	{

		$this->load->helper('html');
		$this->load->helper('url');

		$data['page_title'] = ucfirst($page); // Capitalize the first letter
		$data['page_slug'] = $page;

		$this->load->view('templates/header', $data);
//		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);

	}

	public function newad()
	{

		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->helper('form');

		$data['page_title'] = "Post New Ad"; // Capitalize the first letter
		$data['page_slug'] = 'newad';

		$this->load->view('templates/header', $data);
		$this->load->view('statics/newad');
		$this->load->view('templates/footer', $data);

	}
}