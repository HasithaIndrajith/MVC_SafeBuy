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
        
        $this->view->render('CustomerHome');
    }

    function logout()
    {
        if (isset($_SESSION['userID'])) {

            session_destroy();
        }
        header("Location: ../../login/");
    }
}
