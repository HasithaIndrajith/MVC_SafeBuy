<?php
class CustomerHome_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
    }
    function getData()
    {
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
        return $this->db->runQuery("SELECT * FROM ITEM WHERE CATEGORY_ID='" . $categoryID . "'");
    }
    function addItemtoCart($itemID, $quantity)
    {
        $query = "INSERT INTO CART_ITEMSTEMP (CART_ID,ITEM_ID,QUANTITY) VALUES ('3','" . $itemID . "','" . $quantity . "')";
        echo $query;
        return $this->db->insertQuery($query);
    }

    function checkAlreadyIn($itemID)
    {
        $arrayOfItems = $this->db->runQuery("SELECT ITEM_ID FROM CART_ITEMSTEMP");
        foreach ($arrayOfItems as $key => $value) {
            if (($value)[0] == $itemID) {
                return true;
            }
        }
        return false;
    }

    function UpdateItemtoCart($itemID, $quantity)
    {
        $prevQuan = $this->db->runQuery("SELECT QUANTITY FROM CART_ITEMSTEMP WHERE ITEM_ID='" . $itemID . "'")[0][0];
        $newQuantity = $quantity + $prevQuan;
        $query = "UPDATE CART_ITEMSTEMP SET QUANTITY='" . $newQuantity . "' WHERE ITEM_ID='" . $itemID . "'";
        return $this->db->insertQuery($query);
    }
}
