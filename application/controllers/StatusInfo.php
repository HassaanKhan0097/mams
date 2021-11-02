<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StatusInfo extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('StatusInfo_Model');

        if(!$this->session->userdata('loggedUser')){
            redirect('Mams');
        }
        

    }

    public function index()
    {
        $data['status_info_list'] = $this->StatusInfo_Model->get(); 
        $this->load->view('statusinfo', $data);
    }



    public function create()
    {
        $this->form_validation->set_rules('st_name','Status Name','required');

        if ($this->form_validation->run() == TRUE) {

            $data['st_name'] = $this->input->post('st_name');

            $result = $this->StatusInfo_Model->create($data);

            if($result > 0) {

                $this->session->set_flashdata('message_success', 'Entry Created Successfully!');
                redirect("statusinfo");

            } 
            else {
                
                $this->session->set_flashdata('message_error', 'Failed!');
                redirect("statusinfo");
            }
            
        } 
        else {
            $this->index();
        }

    }


    public function update()
    {
        $this->form_validation->set_rules('update_status_name','Status Name','required');

        if ($this->form_validation->run() == TRUE) {

            $data['st_id'] = $this->uri->segment(3);
            $data['st_name'] = $this->input->post('update_status_name');

            $result = $this->StatusInfo_Model->update($data);

            if($result > 0) {

                redirect("statusinfo");

            } 
            else {
                
                $this->session->set_flashdata('update_message_error', 'Failed!');
                $this->index();
            }
            
        } 

    }



    public function delete()
    {
        
        $data['st_id'] = $this->uri->segment(3);

        $result = $this->StatusInfo_Model->delete($data);

        if($result > 0) {

            redirect("statusinfo");

        } 
        else {
            
            $this->session->set_flashdata('delete_message_error', 'Failed!');
            $this->index();
        }

    }

}

?>