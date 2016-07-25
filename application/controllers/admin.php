<?php



class Admin extends CI_Controller
{



    public function index()

    {


        $this->load->helper('html');

        $this->load->view('admin_home');

    }

    public function categories(){

        $this->load->helper('html');

        $this->load->view('categories');

    }

    public function addPosts(){

        $this->load->helper('html');

        $this->load->view('add_posts');

    }

    public function AdminUpdateCategories(){

        $this->load->helper('html');

        $this->load->view('categories');

        $this->load->view('admin_update_categories');


    }

    public function AdminViewAllPosts(){

        $this->load->helper('html');
        $this->load->view('admin_view_all_posts');

    }
}

?>