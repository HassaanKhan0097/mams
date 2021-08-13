<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appraiser extends CI_Controller {

    public function index()
    {
         $this->load->view('newapprasier');
    }
    public function create(){
        $this->load->view('newapprasier');
    }
    public function show(){
        $this->load->view('listofappraisers');
    }

}

?>