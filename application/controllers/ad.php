<?php

class Ad extends CI_Controller {


	public function index()
	{

		$this->load->helper('html');
		$this->load->helper('url');

		redirect('/browse');

	}

	public function viewad($ad_slug)
	{

		$this->load->helper('html');
		$this->load->helper('url');

		$data['page_title'] = ucfirst($ad_slug); // Capitalize the first letter
		$data['page_slug'] = 'singlead';

		$this->load->view('templates/header', $data);
//		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);

	}
}