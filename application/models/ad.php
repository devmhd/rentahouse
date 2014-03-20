<?php


class Ad extends CI_Model{

	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getOwner($slug){

        $query = $this->db->query("SELECT owner FROM ad WHERE slug=?", array($slug));

        $res = $this->arrayfy($query->result());

        if(count($res)>0){
            return $res[0]['owner'];
        }
        else
            return false;

    }

    function getAll(){

    	$query = $this->db->query("SELECT * FROM ad WHERE 1 ORDER BY created DESC");

        $res = $query->result();


        return arrayfy($res);

    }

    function insert($post_arr){

        $arr = $post_arr;

        $arr['slug'] = $this->slugify($arr['title']) . '-for-rent';

        if($this->db->insert('ad', $arr))
            return $arr['slug']; 

        else
            return false;


    }

    function updatePhotos($photos, $ad_slug){

        $data = array(
            'photos' => $photos
         );

        $this->db->where('slug', $ad_slug);
        $this->db->update('ad', $data); 


    }



    function getBySlug($slug){

        $query = $this->db->query("SELECT * FROM ad WHERE slug = ? LIMIT 1", array($slug));

        $ads = $this->arrayfy($query->result());


        if(count($ads)>0){
            return $ads[0];
        }

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

    private function arrayfy($result){
        $arr = array();

        foreach ($result as $row) {
            $arr[] = get_object_vars($row);
        }
        return $arr;
    }



}

