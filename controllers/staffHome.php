<?php
class StaffHome extends Controller
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
        $this->view->render('StaffHome');
    }

    function logout()
    {
        if (isset($_SESSION['userID'])) {

            session_destroy();
        }
        header("Location: ../../login/");
    }
    function getCategories()
    {

        return $this->model->getCategory();
    }
    function editItems()
    {
        if (isset($_POST["getItem"])) {

            $categoryID = $_GET["categoryid"];
            $items = $this->model->getItems($categoryID);
            foreach ($items as $key) {
               foreach ($key as $data) {
                   echo $data;
                   echo "<br>";
                   
               }
            }
        }
    }
}
