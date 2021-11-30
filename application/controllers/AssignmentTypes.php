<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AssignmentTypes extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('AssTypes_Model');

    }

    public function index()
    {
        $data['ass_types_list'] = $this->AssTypes_Model->get(); 
        $this->load->view('assignmenttypes', $data);
    }



    public function create()
    {
        $this->form_validation->set_rules('at_name','ass_types','required');

        if ($this->form_validation->run() == TRUE) {

            $data['at_name'] = $this->input->post('at_name');

            $result = $this->AssTypes_Model->create($data);

            if($result > 0) {

                $this->session->set_flashdata('message_success', 'Entry Created Successfully!');
                redirect("assignmenttypes");

            } 
            else {
                
                $this->session->set_flashdata('message_error', 'Failed!');
                redirect("assignmenttypes");
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

            $data['at_id'] = $this->uri->segment(3);
            $data['at_name'] = $this->input->post('update_assignment_name');

            $result = $this->AssTypes_Model->update($data);

            if($result > 0) {

                redirect("assignmenttypes");

            } 
            else {
                
                $this->session->set_flashdata('update_message_error', 'Failed!');
                $this->index();
            }
            
        } 

    }



    public function delete()
    {
        $data['at_id'] = $this->uri->segment(3);
        $countOrder = $this->AssTypes_Model->countOrder($data['at_id']);
              
        // echo $countOrder;
       if($countOrder == 0){
            $result = $this->AssTypes_Model->delete($data);
            if($result > 0) {
                redirect("assignmenttypes");
            } 
            else {            
                $this->session->set_flashdata('message_error', 'Failed to delete!');
                redirect("assignmenttypes");
            }
       }else{
            $this->session->set_flashdata('message_error', 'This Assignment Type is Used in Order, Kindly delete that First!');        
            redirect("assignmenttypes");
       }


        // $data['at_id'] = $this->uri->segment(3);

        // $result = $this->AssTypes_Model->delete($data);

        // if($result > 0) {

        //     redirect("assignmenttypes");

        // } 
        // else {
            
        //     $this->session->set_flashdata('delete_message_error', 'Failed!');
        //     $this->index();
        // }

    }

}

?>