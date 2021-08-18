<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Controller {

    public function index()
    {
         $this->load->view('file-list');
    }

    public function create()
    {
        $this->load->view('file-create');
    }

    public function edit($id)
    {
        $this->load->view('file-edit');
    }

}

?>