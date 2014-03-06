<?php


class Region extends CI_Model{

	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getAllRegion(){

    	$query = $this->db->query("SELECT id, name, lat, lng FROM region WHERE 1 ORDER BY name");

		$res = $query->result();
    	
    	$arr = array();

    	foreach ($res as $row) {
    		$arr[] = get_object_vars($row);
    	}
    	return $arr;

    }

    function getAreaByRegion($rid){

    	$query = $this->db->query("SELECT id, name, lat, lng FROM area WHERE region_id = ?", array($rid));

		$res = $query->result();
    	
    	$arr = array();

    	foreach ($res as $row) {
    		$arr[] = get_object_vars($row);
    	}
    	return $arr;

    }

     function getNeiByArea($aid){

    	$query = $this->db->query("SELECT id, name, lat, lng FROM neigh WHERE area_id = ?", array($aid));

		$res = $query->result();
    	
    	$arr = array();

    	foreach ($res as $row) {
    		$arr[] = get_object_vars($row);
    	}
    	return $arr;

    }
}