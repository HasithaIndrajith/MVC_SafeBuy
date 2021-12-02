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
  
    function getCategory()
    {
        // print_r($this->db->runQuery("SELECT * FROM CATEGORY"));
        return $this->db->runQuery("SELECT * FROM CATEGORY");
    }
    function getItems($categoryID)
    {
        // print_r($this->db->runQuery("SELECT * FROM CATEGORY"));
        return $this->db->runQuery("SELECT * FROM ITEM WHERE CATEGORY_ID='".$categoryID."'");
    }
    function addItemtoCart($itemID){
        return $this->db->runQuery("INSERT INTO CART_ITEMS (CART_ID,ITEM_ID,QUANTITY) VALUES 1,'".$itemID."',1");
    }
}
