<?php
class CustomerHome extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        if (!isset($_SESSION['userID'])) {

            header("Location: ../login/");
            die();
        }
        $this->view->categories = $this->getCategories();
        foreach ($this->view->categories as $key => $value) {
            $this->view->categories[$key]["items"] = $this->getItems($this->view->categories[$key][0]);
        }
        $this->view->render('CustomerHome');
    }
    function getCategories()
    {

        return $this->model->getCategory();
    }
    function getItems($categoryID)
    {
        return $this->model->getItems($categoryID);
    }
    function logout()
    {
        if (isset($_SESSION['userID'])) {

            session_destroy();
        }
        header("Location: ../../login/");
    }
    function addItem()
    {
        if (isset($_POST["add"])) {
            $itemID = $_GET['ItemID'];
            $isadded = $this->model->addItemtoCart($itemID);
            if ($isadded) {
                $this->view->render('CustomerHome');
            }
        }
    }
}
