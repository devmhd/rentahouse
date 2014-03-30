<?php

class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}


	public function approve($slug){


		$this->load->model('user');
		$this->load->model('ad');
		$this->load->helper('url');

		$data['loggedIn'] = $this->input->cookie('loggedIn');
		if($data['loggedIn']){

			$data['is_mod'] = $this->user->isModerator($data['loggedIn']);
			$data['loggedUser'] = $this->user->getUserName($data['loggedIn']);

			$data['myAds'] = $this->ad->getByOwner($data['loggedIn']);
		}



		$this->load->model('ad');

		$this->ad->approveAd($slug);

		redirect(base_url().'ad/'.$slug);

	}

	public function edit($slug){


		$this->load->model('user');
		$this->load->model('ad');
		$this->load->model('region');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('form');

		$data['loggedIn'] = $this->input->cookie('loggedIn');

		if($data['loggedIn'] && $data['loggedIn'] == $this->ad->getOwner($slug)){


			$ad = $data['ad'] = $this->ad->getBySlug($slug);

			$data['page_title'] = "Edit Ad"; // Capitalize the first letter
			$data['page_slug'] = 'editad';

			$data['is_mod'] = $this->user->isModerator($data['loggedIn']);
			$data['loggedUser'] = $this->user->getUserName($data['loggedIn']);
			$data['myAds'] = $this->ad->getByOwner($data['loggedIn']);


			$data['regions'] = $this->region->getAllRegion();
			$data['areas'] = $this->region->getAreaByRegion($ad['region']);
			$data['neis'] = $this->region->getNeiByArea($ad['area']);


			$this->load->view('templates/header', $data);
			$this->load->view('statics/editad', $data);
			$this->load->view('templates/footer', $data);



		}else{

			redirect(base_url().'ad/'.$slug);

		}

	}


	public function index()
	{

		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->model('user');
		$this->load->model('ad');

		$data['page_title'] = "Rent A House"; // Capitalize the first letter
		$data['page_slug'] = 'index';

		$data['loggedIn'] = $this->input->cookie('loggedIn');
		if($data['loggedIn']){

			$data['is_mod'] = $this->user->isModerator($data['loggedIn']);
			$data['loggedUser'] = $this->user->getUserName($data['loggedIn']);

			$data['myAds'] = $this->ad->getByOwner($data['loggedIn']);
		}


		

		$this->load->view('templates/header', $data);
		$this->load->view('statics/homepage', $data);
		$this->load->view('templates/footer', $data);

	}



	public function newad()
	{

		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('user');
		$this->load->model('ad');


		$loggedIn = $this->input->cookie('loggedIn');

		if($loggedIn){

			$data['page_title'] = "Post New Ad"; // Capitalize the first letter
			$data['page_slug'] = 'newad';
			$data['loggedUser'] = $this->user->getUserName($loggedIn);
			$data['loggedIn'] = $loggedIn;
			$data['is_mod'] = $this->user->isModerator($data['loggedIn']);

			$data['myAds'] = $this->ad->getByOwner($data['loggedIn']);
			$this->load->view('templates/header', $data);
			$this->load->view('statics/newad', $data);
			$this->load->view('templates/footer', $data);

		}else{

			redirect('/login?required=true&redirect_url='.urlencode('/newad'));
		}

		

	}

	public function addphotos($slug)
	{

		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('user');
		$this->load->model('ad');


		$loggedIn = $this->input->cookie('loggedIn');

		if($loggedIn){

			if($this->ad->getOwner($slug) == $loggedIn){
				$data['page_title'] = "Add Photos"; // Capitalize the first letter
				$data['page_slug'] = 'newad_photos';
				$data['ad_slug'] = $slug;
				$data['loggedIn'] = $loggedIn;
				if($data['loggedIn']){
					$data['loggedUser'] = $this->user->getUserName($data['loggedIn']);
					$data['is_mod'] = $this->user->isModerator($data['loggedIn']);
				}

				$data['myAds'] = $this->ad->getByOwner($data['loggedIn']);
				$this->load->view('templates/header', $data);
				$this->load->view('statics/newad_photos', $data);
				$this->load->view('templates/footer', $data);
			}

		}else{

			redirect('/login?required=true&redirect_url='.urlencode('/newad'));
		}

		

	}

	public function login()
	{

		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('user');
		$this->load->model('ad');
		

		$data['page_title'] = "Login"; // Capitalize the first letter
		$data['page_slug'] = 'login';
		$data['redirect_url'] = $this->input->get('redirect_url');
		$data['error'] = ($this->input->get('error'))=='true';
		$data['required'] = ($this->input->get('required'))=='true';
		$data['loggedIn'] = $this->input->cookie('loggedIn');
		if($data['loggedIn']){
			$data['loggedUser'] = $this->user->getUserName($data['loggedIn']);
			$data['myAds'] = $this->ad->getByOwner($data['loggedIn']);
			$data['is_mod'] = $this->user->isModerator($data['loggedIn']);
		}

		$this->load->view('templates/header', $data);
		$this->load->view('statics/login', $data);
		$this->load->view('templates/footer', $data);

	}

	public function register()
	{

		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('user');
		$this->load->model('ad');
		

		$data['page_title'] = "Register"; // Capitalize the first letter
		$data['page_slug'] = 'register';
		$data['error'] = ($this->input->get('error'))=='true';
		$data['required'] = ($this->input->get('required'))=='true';
		$data['loggedIn'] = $this->input->cookie('loggedIn');
		if($data['loggedIn']){

			$data['is_mod'] = $this->user->isModerator($data['loggedIn']);
			$data['loggedUser'] = $this->user->getUserName($data['loggedIn']);
		}


		$data['myAds'] = $this->ad->getByOwner($data['loggedIn']);
		$this->load->view('templates/header', $data);
		$this->load->view('statics/register', $data);
		$this->load->view('templates/footer', $data);

	}

	public function logout()
	{

		$this->load->helper('url');

		$this->input->set_cookie(array('name'=>'loggedIn'));

		redirect('/');
		

	}

	public function cookies(){
		$this->output->set_output($this->input->cookie('loggedIn'));
	}
}