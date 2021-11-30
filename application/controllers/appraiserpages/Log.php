<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('appraiser/Log_Model');
        $this->load->model('Notes_Model');

    }

    public function index()
    {
        $loggedUser = $this->session->userdata('loggedUser');
        
        $data['order_list'] = $this->Log_Model->getLog($loggedUser['user_app']);       
        
    //     echo "<pre>";
    //     print_r($data['order_list']);
       $this->load->view('appraiser/log', $data);
    }

    public function logView($order_number){

        //  echo "<pre>";
        // print_r($order_number);

        $data['o_single'] = $this->Log_Model->getByOrderNumber($order_number);
        $data['order_single'] = $data['o_single'][0];    
        

        $data['loggedUser'] = $this->session->userdata('loggedUser');
        $data['notes'] = $this->Notes_Model->getById($order_number);
        // echo "<pre>";
        // print_r($data['order_single']);
        // print_r($data['cl_single']);
        // print_r($data['city_list']);
        // print_r($data['country_list']);
        $this->load->view('appraiser/log-view', $data);

    }



    public function createCountry()
    {
        $this->form_validation->set_rules('country_name','country_name','required');

        if ($this->form_validation->run() == TRUE) {

            $data['country_name'] = $this->input->post('country_name');

            $result = $this->CitiesCountries_Model->createCountry($data);

            if($result > 0) {

                $this->session->set_flashdata('message_success_country', 'Entry Created Successfully!');
                redirect("citiescountries");

            } 
            else {
                
                $this->session->set_flashdata('message_error_country', 'Failed!');
                redirect("citiescountries");
            }
            
        } 
        else {
            $this->index();
        }

    }


    public function updateCountry()
    {
        $this->form_validation->set_rules('upd_country_name','upd_country_name','required');

        if ($this->form_validation->run() == TRUE) {

            $data['country_id'] = $this->uri->segment(3);
            $data['country_name'] = $this->input->post('upd_country_name');

            $result = $this->CitiesCountries_Model->updateCountry($data);

            if($result > 0) {

                redirect("citiescountries");

            } 
            else {
                
                $this->session->set_flashdata('update_message_error', 'Failed!');
                $this->index();
            }
            
        } 

    }



    public function deleteCountry()
    {
        
        $data['country_id'] = $this->uri->segment(3);

        $result = $this->CitiesCountries_Model->deleteCountry($data);

        if($result > 0) {

            redirect("citiescountries");

        } 
        else {
            
            $this->session->set_flashdata('delete_message_error', 'Failed!');
            $this->index();
        }

    }



    public function createCity()
    {
        $this->form_validation->set_rules('city_name','city_name','required');

        if ($this->form_validation->run() == TRUE) {

            $data['city_name'] = $this->input->post('city_name');
            $data['city_country_id'] = $this->input->post('city_country_id');

            $result = $this->CitiesCountries_Model->createCity($data);

            if($result > 0) {

                $this->session->set_flashdata('message_success_city', 'Entry Created Successfully!');
                redirect("citiescountries");

            } 
            else {
                
                $this->session->set_flashdata('message_error_city', 'Failed!');
                redirect("citiescountries");
            }
            
        } 
        else {
            $this->index();
        }

    }


    public function updateCity()
    {
        $this->form_validation->set_rules('upd_city_name','upd_city_name','required');

        if ($this->form_validation->run() == TRUE) {

            $data['city_id'] = $this->uri->segment(3);
            $data['city_country_id'] = $this->input->post('upd_city_country_id');
            $data['city_name'] = $this->input->post('upd_city_name');

            $result = $this->CitiesCountries_Model->updateCity($data);

            if($result > 0) {

                redirect("citiescountries");

            } 
            else {
                
                $this->session->set_flashdata('update_message_error', 'Failed!');
                $this->index();
            }
            
        } else{
            $this->session->set_flashdata('update_message_error', 'Failed!');
                $this->index();
        }

    }



    public function deleteCity()
    {
        
        $data['city_id'] = $this->uri->segment(3);

        $result = $this->CitiesCountries_Model->deleteCity($data);

        if($result > 0) {

            redirect("citiescountries");

        } 
        else {
            
            $this->session->set_flashdata('delete_message_error', 'Failed!');
            $this->index();
        }

    }

}

?>