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
    function saveInfo($sql){
        return $this->db->runQuery($sql);
    }
    function saveImage($sql){
        return $this->db->insertQuery($sql);
    }
    function saveEmail($sql){
        return $this->db->insertQuery($sql);
    }
    function savePassword($sql){
        return $this->db->insertQuery($sql);

    }
    function getPassword($userID){
        $sql = "select Password from customer where Customer_id= '" . $_SESSION['userID'] . "'";
        $row=$this->db->runQuery($sql);
        // print_r($row);
        return $row[0]["Password"];
    }
}
