
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Amc extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Amc_Model');

        if(!$this->session->userdata('loggedUser')){
            redirect('Mams');
        }

    }

    public function index()
    {
        $data['amc_list'] = $this->Amc_Model->get(); 
        $this->load->view('amc', $data);
    }



    public function create()
    {
        $this->form_validation->set_rules('amc_name','amc_name','required');

        if ($this->form_validation->run() == TRUE) {

            $data['amc_name'] = $this->input->post('amc_name');
            $data['amc_website'] = $this->input->post('amc_website');

            $result = $this->Amc_Model->create($data);

            if($result > 0) {

                $this->session->set_flashdata('message_success', 'Entry Created Successfully!');
                redirect("amc");

            } 
            else {
                
                $this->session->set_flashdata('message_error', 'Failed!');
                redirect("amc");
            }
            
        } 
        else {
            $this->index();
        }

    }


    public function update($id)
    {
        $this->form_validation->set_rules('update_amc_name','update_amc_name','required');

        if ($this->form_validation->run() == TRUE) {

            $data['amc_id'] = $this->uri->segment(3);
            $data['amc_name'] = $this->input->post('update_amc_name');
            $data['amc_website'] = $this->input->post('update_amc_website');

            $result = $this->Amc_Model->update($data);

            if($result > 0) {

                redirect("amc");

            } 
            else {
                
                $this->session->set_flashdata('update_message_error', 'Failed!');
                $this->index();
            }
            
        } 

    }



    public function delete($id)
    {
        
        $data['amc_id'] = $this->uri->segment(3);

        $result = $this->Amc_Model->delete($data);

        if($result > 0) {

            redirect("amc");

        } 
        else {
            
            $this->session->set_flashdata('delete_message_error', 'Failed!');
            $this->index();
        }

    }

}

?>