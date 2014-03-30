<?php

class Adcontrol extends CI_Controller {


	public function index()
	{

		$this->load->helper('html');
		$this->load->helper('url');

		redirect(base_url().'ads');

	}

	public function viewad($ad_slug)
	{

		


		$this->load->helper('html');
		$this->load->helper('url');

		$this->load->model('ad');


		$ad = $this->ad->getBySlug($ad_slug);

		$loggedIn = $this->input->cookie('loggedIn');

		if($ad){

			$this->load->model('user');
			$this->load->model('region');
			$this->load->model('rating');

			$data['page_title'] = $ad['title']; // Capitalize the first letter
			$data['page_slug'] = 'singlead';
			$data['loggedIn'] = $loggedIn;
			if($data['loggedIn']){
				$data['loggedUser'] = $this->user->getUserName($data['loggedIn']);
				$data['myAds'] = $this->ad->getByOwner($data['loggedIn']);
				$data['is_mod'] = $this->user->isModerator($data['loggedIn']);
			}

			$addata['ad'] = $ad;

			$addata['nearby'] = $this->stuffLocalNames($this->ad->getNearbyHouses($ad['lat'], $ad['lng'], 5));


			$addata['owner_name'] = $this->user->getUserName($ad['owner']);
			$addata['region_name'] = $this->region->getRegion($ad['region']);
			$addata['area_name'] = $this->region->getArea($ad['area']);
			$addata['neigh_name'] = $this->region->getNei($ad['neigh']);

			$addata['oratingdata'] = $this->rating->getRating('o', $ad['id']);
			$addata['eratingdata'] = $this->rating->getRating('e', $ad['id']);
			$addata['gratingdata'] = $this->rating->getRating('g', $ad['id']);
			$addata['wratingdata'] = $this->rating->getRating('w', $ad['id']);

			

			$this->load->view('templates/header', $data);
			$this->load->view('templates/singlead', $addata);
			$this->load->view('templates/footer', $data);

		}

		else
			show_404($ad_slug);
// 		$data['page_slug'] = 'singlead';

// 		$this->load->view('templates/header', $data);
// //		$this->load->view('pages/'.$page, $data);
// 		$this->load->view('templates/footer', $data);

	}


	private function stuffLocalNames($oldResults){

		$newResults = array();

		$this->load->model('region');

		foreach ($oldResults as $ad) {
			
			$ad['areaName'] = $this->region->getArea($ad['area']);
			$ad['neiName'] = $this->region->getNei($ad['neigh']);

			$newResults[]= $ad;
		}

		return $newResults;

		
	}


}