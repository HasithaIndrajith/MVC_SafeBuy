<?php
// session_start();
class customerProfile_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function printSomething()
    {
    }
    function getData()
    {
        $sql = "select * from customer where Customer_id= '" . $_SESSION['userID'] . "'";
        $row = $this->db->runQuery($sql);

        return $row;
    }
    function saveInfo($sql)
    {
        return $this->db->runQuery($sql);
    }
    function saveImage($sql)
    {
        return $this->db->insertQuery($sql);
    }
    function saveEmail($sql)
    {
        return $this->db->insertQuery($sql);
    }
    function savePassword($sql)
    {
        return $this->db->insertQuery($sql);
    }
    function getPassword($userID)
    {
        $sql = "select Password from customer where Customer_id= '" . $_SESSION['userID'] . "'";
        $row = $this->db->runQuery($sql);
        // print_r($row);
        return $row[0]["Password"];
    }
    function getCartItems($userID)
    {
        $cartIDs = $this->db->runQuery("SELECT CART_ID FROM CARTTEMP WHERE Customer_id= '" . $userID . "'");
        $cartID = $cartIDs[0][0];
        $cartItems = $this->db->runQuery("SELECT * FROM CART_ITEMSTEMP WHERE Cart_id= '" . $cartID . "'");
        foreach ($cartItems as $key => $value) {

            $cartItems[$key]["itemDetails"] = $this->db->runQuery("SELECT * FROM ITEM WHERE itemID='" . $value["item_id"] . "'");
        }
        return $cartItems;
    }
    function deleteItemCart($itemCartID)
    {
        $sql = "DELETE FROM CART_ITEMSTEMP WHERE cart_item_id= '" . $itemCartID . "'";
        return $this->db->insertQuery($sql);
    }

    function placeOrder(){
        
    }
}
