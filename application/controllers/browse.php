<?php

class Browse extends CI_Controller {


	public function index()
	{

		$this->load->helper('html');
		$this->load->helper('url');

		$data['page_title'] = "Browse houses"; // Capitalize the first letter
		$data['page_slug'] = 'browse';

		$this->load->view('templates/header', $data);
//		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);

	}

}