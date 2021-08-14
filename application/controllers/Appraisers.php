<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appraisers extends CI_Controller {

    public function index()
    {
         $this->load->view('appraisers-list');
    }

    public function create(){

        $this->load->view('appraisers-create');
    }

}

?>