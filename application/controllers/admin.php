<?php



class Admin extends CI_Controller
{


    public function index()

    {


        $this->load->helper('html');

        $this->load->view('admin_home');

    }

    public function categories()
    {

        $this->load->helper('html');

        $this->load->view('categories');

    }
}

?>