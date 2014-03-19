<?php


class Region extends CI_Model{

	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getRegion($id){
        $query = $this->db->query("SELECT name FROM region WHERE id=?", array($id));

        $rows = $this->arrayfy($query->result());

        if(count($rows)>0){
            return $rows[0]['name'];
        }
        else return false;
    }

    function getArea($id){
        $query = $this->db->query("SELECT name FROM area WHERE id=?", array($id));

        $rows = $this->arrayfy($query->result());

        if(count($rows)>0){
            return $rows[0]['name'];
        }
        else return false;
    }

    function getNei($id){
        $query = $this->db->query("SELECT name FROM neigh WHERE id=?", array($id));

        $rows = $this->arrayfy($query->result());

        if(count($rows)>0){
            return $rows[0]['name'];
        }
        else return false;
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

    private function arrayfy($result){
        $arr = array();

        foreach ($result as $row) {
            $arr[] = get_object_vars($row);
        }
        return $arr;
    }
}