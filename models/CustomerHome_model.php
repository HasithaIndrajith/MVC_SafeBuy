<?php
class CustomerHome_Model extends Model{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
       
    }
    function getData(){
      return $this->db->runQuery("SELECT * from users");
    }
  

}

?>