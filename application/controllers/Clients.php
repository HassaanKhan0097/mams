<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {

    public function index()
    {
         $this->load->view('client-list');
    }

    public function create()
    {
        $this->load->view('client-create');
    }

    public function edit($id)
    {
        $this->load->view('client-edit');
    }

}

?>