<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AssignmentAddon extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('AssAddon_Model');
    }

    public function index()
    {
        $data['ass_addon_list'] = $this->AssAddon_Model->get(); 
        $this->load->view('assignmentaddon', $data);
    }



    public function create()
    {
        $this->form_validation->set_rules('ao_name','ass_types','required');

        if ($this->form_validation->run() == TRUE) {

            $data['ao_name'] = $this->input->post('ao_name');

            $result = $this->AssAddon_Model->create($data);

            if($result > 0) {

                $this->session->set_flashdata('message_success', 'Entry Created Successfully!');
                redirect("assignmentaddon");

            } 
            else {
                
                $this->session->set_flashdata('message_error', 'Failed!');
                redirect("assignmentaddon");
            }
            
        } 
        else {
            $this->index();
        }

    }


    public function update()
    {
        $this->form_validation->set_rules('update_assignment_name','ass_types','required');

        if ($this->form_validation->run() == TRUE) {

            $data['ao_id'] = $this->uri->segment(3);
            $data['ao_name'] = $this->input->post('update_assignment_name');

            $result = $this->AssAddon_Model->update($data);

            if($result > 0) {

                redirect("assignmentaddon");

            } 
            else {
                
                $this->session->set_flashdata('update_message_error', 'Failed!');
                $this->index();
            }
            
        } 

    }



    public function delete()
    {
        $data['ao_id'] = $this->uri->segment(3);
        $countOrder = $this->AssAddon_Model->countOrder($data['ao_id']);
              
        // echo $countOrder;
       if($countOrder == 0){
            $result = $this->AssAddon_Model->delete($data);
            if($result > 0) {
                redirect("assignmentaddon");
            } 
            else {            
                $this->session->set_flashdata('message_error', 'Failed to delete!');
                redirect("assignmentaddon");
            }
       }else{
            $this->session->set_flashdata('message_error', 'This Assignment Type is Used in Order, Kindly delete that First!');        
            redirect("assignmentaddon");
       }



    }

}

?>