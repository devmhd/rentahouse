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




		$slug = $this->ad->insert($this->input->post());

		// if($slug){
		// 	redirect('/addphoto/'. $slug);
		// }else{
		// 	redirect('/newad?error=true');
		// }

	}

	public function newad_photos()
	{

		$config['upload_path'] =  'ad_images/';


		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1600';
		$config['max_height']  = '900';

		print_r($config);

		
		$this->load->library('upload', $config);
		
		print_r($_FILES['images']);

		foreach ($_FILES['images'] as $fieldname => $fileObject)  //fieldname is the form field name
		{
			if (!empty($fileObject['name']))
			{

				$config['file_name']  = 'akka';
				$this->upload->initialize($config);
				if (!$this->upload->do_upload($fieldname))
				{
					$errors = $this->upload->display_errors();
					print_r($errors);
				}
				else
				{
					print_r($this->upload->data());
             		// Code After Files Upload Success GOES HERE
				}
			}
		}

		// if ( ! $this->upload->do_upload('images[]'))
		// {
		// 	$error = array('error' => $this->upload->display_errors());

		// 	print_r($error);
		// 	//$this->load->view('upload_form', $error);
		// }
		// else
		// {
		// 	$data = array('upload_data' => $this->upload->data());

		// 	print_r($data);
		// 	//$this->load->view('upload_success', $data);
		// }

	}

	public function login(){


		$email = $this->input->post('email');
		if(!$email) redirect('/login');

		$password = $this->input->post('password');
		if(!$password) redirect('/login');

		$this->load->model('user');

		$loggedIn = $this->user->verifyLogin($email, $password);

		if($loggedIn)
		{
			$this->input->set_cookie(array('name'=>'loggedIn', 'value'=>$loggedIn, 'expire' => '86500'));
			redirect(urldecode($this->input->post('redirect_url')));
		}	
		else{
			redirect('/login?error=true&redirect_url='.$this->input->post('redirect_url'));
		}

	}


	public function register(){


		$email = $this->input->post('email');
		if(!$email) redirect('/register');

		$password = $this->input->post('password');
		if(!$password) redirect('/register');

		$name = $this->input->post('name');
		if(!$name) redirect('/register');

		$contact = $this->input->post('contact');
		if(!$contact) redirect('/register');

		$this->load->model('user');

		$data = $this->input->post();

		unset($data['password_repeat']);



		$register = $this->user->insert($data);

		print_r($register);

		if($register)
		{
			$this->input->set_cookie(array('name'=>'loggedIn', 'value'=>$register, 'expire' => '86500'));
			redirect('/browse');
		}	
		else{
			redirect('/register?error=true');
		}

	}

	
	
}