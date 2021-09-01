<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webusers extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Webuser_Model');

    }

    public function index()
    {
        $data['webuser_list'] = $this->Webuser_Model->get(); 
        $this->load->view('webusers', $data);
    }



    public function create()
    {
        $this->form_validation->set_rules('web_username','web_username','required');
        $this->form_validation->set_rules('web_login','web_login','required');
        $this->form_validation->set_rules('web_password','web_password','required');
        $this->form_validation->set_rules('web_seclevel','web_seclevel','required');

        if ($this->form_validation->run() == TRUE) {

            
            $data['web_username'] = $this->input->post('web_username');
            $data['web_login'] = $this->input->post('web_login');
            $data['web_password'] = $this->input->post('web_password');
            $data['web_seclevel'] = $this->input->post('web_seclevel');
            $data['web_description'] = $this->input->post('web_desc');
            // $data['web_lastlogindate'] = date("m / d / y");
            // $data['web_lastloginip'] = $this->input->ip_address();
            $data['web_active'] = 'checked';
             

            $result = $this->Webuser_Model->create($data);

            if($result > 0) {

                $this->session->set_flashdata('message_success', 'Entry Created Successfully!');
                redirect("webusers");

            } 
            else {
                
                $this->session->set_flashdata('message_error', 'Failed!');
                redirect("webusers");
            }
            
        } 
        else {
            $this->index();
        }

    }


    public function update($id)
    {
        
        // echo "reached";
        $this->form_validation->set_rules('upd_web_username','upd_web_username','required');
        $this->form_validation->set_rules('upd_web_login','upd_web_login','required');
        $this->form_validation->set_rules('upd_web_password','upd_web_password','required');
        $this->form_validation->set_rules('upd_web_seclevel','upd_web_seclevel','required');
        
        if ($this->form_validation->run() == TRUE || 1==2) {
            
            $data['web_id'] = $this->uri->segment(3);
            $data['web_username'] = $this->input->post('upd_web_username');
            $data['web_login'] = $this->input->post('upd_web_login');
            $data['web_password'] = $this->input->post('upd_web_password');
            $data['web_seclevel'] = $this->input->post('upd_web_seclevel');
            $data['web_description'] = $this->input->post('upd_web_desc');
            $active = $this->input->post('upd_web_active');
            if($active == 'on'){
                $data['web_active'] = 'checked';
            }else{
                $data['web_active'] = '';
            }

            
            

          

            $result = $this->Webuser_Model->update($data);

            if($result > 0) {

                redirect("webusers");

            } 
            else {
                
                $this->session->set_flashdata('update_message_error', 'Failed!');
                $this->index();
            }
            
        } 
        // else{
        //     $this->session->set_flashdata('update_message_error', 'Failed!');
        //     redirect("webusers");
        // }

    }



    public function delete()
    {
        
        $data['web_id'] = $this->uri->segment(3);

        $result = $this->Webuser_Model->delete($data);

        if($result > 0) {

            redirect("webusers");

        } 
        else {
            
            $this->session->set_flashdata('delete_message_error', 'Failed!');
            $this->index();
        }

    }

}

?>