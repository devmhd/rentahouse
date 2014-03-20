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

		
		if(!($loggedIn = $this->input->cookie('loggedIn')))
		{
			redirect(base_url() . 'login?required=true');
			return;
		}


		if($slug = $this->input->post('ad_slug')){

			if($this->ad->getOwner($slug) == $loggedIn){


				$uploads_dir =  SITE_ROOT . '/../../ad_images';

				$photos = array();

				foreach ($_FILES["images"]["error"] as $key => $error) {

					if ($error == UPLOAD_ERR_OK) {
						$tmp_name = $_FILES["images"]["tmp_name"][$key];
						$ext = $this->getExt($_FILES["images"]["type"][$key]);
						$name = md5($this->input->ip_address() . time() . "_$key") . $ext;
						move_uploaded_file($tmp_name, "$uploads_dir/$name");

						$desc = $_POST['img-desc'][$key];

						$photos[]= array($name, $desc);
					}
				}



				$photo_json =  json_encode($photos);

				$this->ad->updatePhotos($photo_json, $slug);

				redirect(base_url().'ad/'.$slug.'?success=1');

			}
		};



		




		


		

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









	function getExt($filetype)
	{
		if($filetype=='image/png')
			return '.png';

		if($filetype=='image/jpeg')
			return '.jpg';

		if($filetype=='image/gif')
			return '.gif';


		throw new Exception();

	}

	
	
}