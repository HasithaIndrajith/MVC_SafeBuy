<?php
class StaffHome_Model extends Model{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
       
    }
    function getData(){
      return $this->db->runQuery("SELECT * from users");
    }
    function getCategory()
    {
        // print_r($this->db->runQuery("SELECT * FROM CATEGORY"));
        return $this->db->runQuery("SELECT * FROM CATEGORY");
    }
    function getItems($categoryId){
        return $this->db->runQuery("SELECT * FROM ITEM WHERE CATEGORY_ID='".$categoryId."'");

    }
}

?>