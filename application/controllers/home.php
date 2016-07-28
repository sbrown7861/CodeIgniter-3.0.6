<?php



class Home extends CI_Controller
{

    public function index()
    {
        $this->load->helper('html');

        $this->load->view('home');

    }

    public function search(){

        $this->load->helper('html');

        $this->load->view('search');

    }


}






?>