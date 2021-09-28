<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WorkInProgress extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('appraiser/Work_Model');
        $this->load->model('appraiser/Log_Model');

       $this->load->model('StatusInfo_Model');

    }

    public function index()
    {
        $loggedUser = $this->session->userdata('loggedUser');
        
        $data['order_list'] = $this->Work_Model->getWork($loggedUser['user_id']);
        
        
    //     echo "<pre>";
    //     print_r($data['order_list']);
       $this->load->view('appraiser/workinprogress', $data);
    }
    public function workView($order_number){

        //  echo "<pre>";
        // print_r($order_number);

        $data['o_single'] = $this->Log_Model->getByOrderNumber($order_number);
        $data['order_single'] = $data['o_single'][0];    

        // $data['city_list'] = $this->CitiesCountries_Model->getCity(); 
        // $data['country_list'] = $this->CitiesCountries_Model->getCountry(); 
        // $data['appraiser_list'] = $this->Appraiser_Model->get(); 
        // $data['client_list'] = $this->Client_Model->get(); 
        // $data['order_types_list'] = $this->OrderTypes_Model->get(); 
        $data['status_info_list'] = $this->StatusInfo_Model->get(); 
        // $data['assignment_types_list'] = $this->AssTypes_Model->get();
        // $data['previous_order_numbers'] = $this->Order_Model->getOrderNumbers();
        
        // echo "<pre>";
        // print_r($data['order_single']);
        // print_r($data['cl_single']);
        // print_r($data['city_list']);
        // print_r($data['country_list']);
        $this->load->view('appraiser/workinprogress-view', $data);

    }

    public function workupdate($order_number){
        // echo "Reached";
        //  echo "<pre>";
        // print_r($order_number);
        $data['order_number'] =  $order_number;
        $data['order_status_id'] = $this->input->post('order_status_id');
        $data['order_action'] = $this->input->post('order_action');
        $data['order_date'] = $this->input->post('order_date');
        $data['order_duedate'] = $this->input->post('order_duedate');
        $data['order_appointmentdate'] = $this->input->post('order_appointmentdate');
        $data['order_appointment_time'] = $this->input->post('order_appointment_time');
        $data['order_purchase'] = $this->input->post('order_purchase');
        $data['order_expense'] = $this->input->post('order_expense');
        $data['order_instruction'] = $this->input->post('order_instruction');


        $result = $this->Work_Model->update($data);

            if($result > 0) {
                // $this->index();
                redirect("appraiser/workinprogress");

            } 
            else {
                
                $this->session->set_flashdata('update_message_error', 'Failed!');
                // $this->index();
                redirect("appraiser/workinprogress");
            }

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