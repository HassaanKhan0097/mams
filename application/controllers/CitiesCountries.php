<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CitiesCountries extends CI_Controller {

    public function index()
    {
        $this->load->view('citiescountries');
    }

}

?>