<?php


class Search extends CI_Model{

	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    
    function customSearch($params, $page){

        $whereClause = " WHERE 1";

        if($params['htype'] == 'region')
            $whereClause .= " AND region = " . $params['hval'];
        else if($params['htype'] == 'area')
            $whereClause .= " AND area = " . $params['hval'];
        else if($params['htype'] == 'nei')
            $whereClause .= " AND neigh = " . $params['hval'];


        if($params['n_bed'] != 'all'){
            $whereClause .= " AND n_bed >= " . $params['n_bed'];
        }

        if($params['n_balc'] != 'all'){
            $whereClause .= " AND n_balcony >= " . $params['n_balc'];
        }

        if($params['n_bath'] != 'all'){
            $whereClause .= " AND n_bath >= " . $params['n_bath'];
        }

        if($params['n_living'] != 'all'){
            $whereClause .= " AND n_living >= " . $params['n_living'];
        }

        $whereClause .= " AND rent >= " . $params['minrent'];
        $whereClause .= " AND rent <= " . $params['maxrent'];

        $sql = "SELECT slug,title,rent,sqft,n_bed,n_bath,area,neigh,region,photos,lat,lng FROM ad" . $whereClause;

        //echo $sql;



        $query = $this->db->query($sql);



        return $this->arrayfy($query->result());

    }


    function simpleSearch(){

        echo "simpledummy";
    }





    private function arrayfy($result){
        $arr = array();

        foreach ($result as $row) {
            $arr[] = get_object_vars($row);
        }
        return $arr;
    }



}

