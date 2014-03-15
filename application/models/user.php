<?php




class User extends CI_Model{

	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function checkEmail($email){

    	$query = $this->db->query("SELECT email FROM user WHERE email=?", array($email));

		$res = $query->result();
    	
        $arr = $this->arrayfy($res);
    	
        if(count($arr)>0)
            return "This email is already taken";
        else
            return 'true';

    }

    function verifyLogin($email, $pass){

        echo $email, $pass;

        $query = $this->db->query("SELECT password,id FROM user WHERE email=?", array($email));

        $res = $query->result();

        $res = $this->arrayfy($res);

        if($pass == $res[0]['password'])
            return $res[0]['id'];

        else
            return false;
    }

    function insert($post_arr){



        $arr = $post_arr;

        print_r($post_arr);

        if($this->db->insert('user', $arr))
        {
            $query = $this->db->query("SELECT LAST_INSERT_ID() from user");

            $res = $query->result();
            $res = $this->arrayfy($res);


            return $res[0]['LAST_INSERT_ID()'];
        }

        else
            return false;


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