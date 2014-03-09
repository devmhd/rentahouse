<?php


class Ad extends CI_Model{

	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getAll(){

    	$query = $this->db->query("SELECT * FROM ad WHERE 1 ORDER BY created DESC");

		$res = $query->result();
    	
    	$arr = array();

    	foreach ($res as $row) {
    		$arr[] = get_object_vars($row);
    	}
    	return $arr;

    }

    function insert($post_arr){

        $arr = $post_arr;

        $arr['slug'] = $this->slugify($arr['title']) . '-for-rent';

        if($this->db->insert('ad', $arr))
            return $arr['slug']; 

        else
            return false;


    }

    private function slugify($text)
    { 
  // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

  // trim
        $text = trim($text, '-');

  // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // lowercase
        $text = strtolower($text);

  // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text))
        {
            return 'n-a';
        }

        return $text;
    }


    
}