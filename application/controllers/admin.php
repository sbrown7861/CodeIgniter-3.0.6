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

    public function view_all_posts(){

        $this->load->helper('html');

        $this->load->view('view_all_posts');

    }

    public function add_post(){

        $this->load->helper('html');

        $this->load->library('upload');

        $this->load->view('add_post');


    }
}

?>