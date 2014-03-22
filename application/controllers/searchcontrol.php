<?php

class Searchcontrol extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		
	}

	public function search(){

		 $this->load->helper('html');
		 $this->load->helper('url');
		// $this->load->helper('form');
		$this->load->model('user');
		$this->load->model('ad');
		

		$data['page_title'] = "Search"; // Capitalize the first letter
		$data['page_slug'] = 'search';

		$data['loggedIn'] = $this->input->cookie('loggedIn');
		if($data['loggedIn']){
			$data['loggedUser'] = $this->user->getUserName($data['loggedIn']);
		}



		$data['myAds'] = $this->ad->getByOwner($data['loggedIn']);
		$this->load->view('templates/header', $data);
		$this->load->view('statics/search', $data);
		$this->load->view('templates/footer', $data);
	}

	public function ads()
	{

		 $this->load->helper('html');
		 $this->load->helper('url');

		$this->load->model('search');
		$this->load->model('user');
		$this->load->model('ad');


		$mapurl = base_url().'mapads?';

		foreach ($_GET as $key => $value) {
			$mapurl .= $key . '=' . $value . '&';
		}

		$mapurl = rtrim($mapurl, '&');

		//echo $mapurl;

		$params = array();

		$page = ($this->input->get('p'))?($this->input->get('p')):'1';


		$nei = ($this->input->get('nei'))?($this->input->get('nei')):'all';
		$area = ($this->input->get('area'))?($this->input->get('area')):'all';
		$region = ($this->input->get('region'))?($this->input->get('region')):'all';


		if($nei!='all'){
			$params['htype'] = 'nei';
			$params['hval'] = $nei;
		}else{

			if($area!='all'){

				$params['htype'] = 'area';
				$params['hval'] = $area;

			}else{

				if($region!='all'){

					$params['htype'] = 'region';
					$params['hval'] = $region;

				}else{
					$params['htype'] = 'all';
					$params['hval'] = 'all';
				}

			}

		}

		$params['n_bed'] 		= ($this->input->get('bed'))?($this->input->get('bed')):'all';
		$params['n_balc'] 		= ($this->input->get('balc'))?($this->input->get('balc')):'all';
		$params['n_bath'] 		= ($this->input->get('bath'))?($this->input->get('bath')):'all';
		$params['n_living'] 	= ($this->input->get('living'))?($this->input->get('living')):'all';
		$params['minrent'] 		= ($this->input->get('minrent'))?($this->input->get('minrent')):'0';
		$params['maxrent'] 		= ($this->input->get('maxrent'))?($this->input->get('maxrent')):'999999999';





		$result['ads'] = $this->search->customSearch($params, $page);


		$stuffedresult['ads'] = $this->stuffLocalNames($result['ads']);


	
		

		$data['page_title'] = "Search Results"; // Capitalize the first letter
		$data['page_slug'] = 'browse';

		$data['loggedIn'] = $this->input->cookie('loggedIn');
		if($data['loggedIn']){
			$data['loggedUser'] = $this->user->getUserName($data['loggedIn']);
		}


		$stuffedresult['mapurl'] = $mapurl;
		$data['myAds'] = $this->ad->getByOwner($data['loggedIn']);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/searchresults', $stuffedresult);
		$this->load->view('templates/footer', $data);






		


	}


	public function mapads()
	{

		 $this->load->helper('html');
		 $this->load->helper('url');

		$this->load->model('search');
		$this->load->model('user');
		$this->load->model('ad');


		$mapurl = base_url().'ads?';

		foreach ($_GET as $key => $value) {
			$mapurl .= $key . '=' . $value . '&';
		}

		$mapurl = rtrim($mapurl, '&');

		//echo $mapurl;

		$params = array();

		$page = ($this->input->get('p'))?($this->input->get('p')):'1';


		$nei = ($this->input->get('nei'))?($this->input->get('nei')):'all';
		$area = ($this->input->get('area'))?($this->input->get('area')):'all';
		$region = ($this->input->get('region'))?($this->input->get('region')):'all';


		if($nei!='all'){
			$params['htype'] = 'nei';
			$params['hval'] = $nei;
		}else{

			if($area!='all'){

				$params['htype'] = 'area';
				$params['hval'] = $area;

			}else{

				if($region!='all'){

					$params['htype'] = 'region';
					$params['hval'] = $region;

				}else{
					$params['htype'] = 'all';
					$params['hval'] = 'all';
				}

			}

		}

		$params['n_bed'] 		= ($this->input->get('bed'))?($this->input->get('bed')):'all';
		$params['n_balc'] 		= ($this->input->get('balc'))?($this->input->get('balc')):'all';
		$params['n_bath'] 		= ($this->input->get('bath'))?($this->input->get('bath')):'all';
		$params['n_living'] 	= ($this->input->get('living'))?($this->input->get('living')):'all';
		$params['minrent'] 		= ($this->input->get('minrent'))?($this->input->get('minrent')):'0';
		$params['maxrent'] 		= ($this->input->get('maxrent'))?($this->input->get('maxrent')):'999999999';





		$result['ads'] = $this->search->customSearch($params, $page);


		$stuffedresult['ads'] = $this->stuffLocalNames($result['ads']);
		

		$data['page_title'] = "Search Results in Map"; // Capitalize the first letter
		$data['page_slug'] = 'mapads';

		$data['loggedIn'] = $this->input->cookie('loggedIn');
		if($data['loggedIn']){
			$data['loggedUser'] = $this->user->getUserName($data['loggedIn']);
		}


		$stuffedresult['mapurl'] = $mapurl;
		$data['myAds'] = $this->ad->getByOwner($data['loggedIn']);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/mapresults', $stuffedresult);
		$this->load->view('templates/footer', $data);






		


	}


	private function stuffLocalNames($oldResults){

		$newResults = array();

		$this->load->model('region');

		foreach ($oldResults as $ad) {
			
			$ad['regionName'] = $this->region->getRegion($ad['region']);
			$ad['areaName'] = $this->region->getArea($ad['area']);
			$ad['neiName'] = $this->region->getNei($ad['neigh']);

			$newResults[]= $ad;
		}

		return $newResults;

		
	}





}