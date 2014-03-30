<?php


class Rating extends CI_Model{

	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function isModerator($id){

        $query = $this->db->query("SELECT is_mod FROM user WHERE id=? LIMIT 1", array($id));

        $res = $query->result();

        $res = $this->arrayfy($res);

        return ($res[0]['is_mod'] == 1);

    }



    function insertRating($table, $data){


        $query = $this->db->query("SELECT id FROM ".$table."rating WHERE rater=? AND rated=? LIMIT 1", array($data['rater'], $data['rated']));
        $results = $this->arrayfy($query->result());

        if(count($results)>=1){
            $this->db->where('id', $results[0]['id']);
            $this->db->update($table.'rating', $data); 
        }else{
            return $this->db->insert($table.'rating', $data);    
        }
        
        
    }

    function getRating($table, $id){

        $query = $this->db->query("SELECT rater,review,rating,rater_name FROM ".$table."rating WHERE rated=? ORDER BY created DESC", array($id));

        $results = $this->arrayfy($query->result());

        if(count($results) <= 0) 

            return array(
                "reviews" => $results,
                "count" => 0,
                "rating" => 2.5

                );

        $sum = 0;
        foreach ($results as $row) {
           $sum += $row['rating'];
       }


       $count = count($results);
       $rating = $sum/$count;

       return array(
        "reviews" => $results,
        "count" => $count,
        "rating" => $rating

        );


   }

   function getUserName($id){

    $query = $this->db->query("SELECT name FROM user WHERE id=?", array($id));

    $res = $query->result();

    $res = $this->arrayfy($res);

    return $res[0]['name'];

}

function arrayfy($result){
    $arr = array();

    foreach ($result as $row) {
        $arr[] = get_object_vars($row);
    }
    return $arr;
}





}