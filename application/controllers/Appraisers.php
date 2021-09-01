<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appraisers extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->model('Appraiser_Model');

    }

    public function index()
    {
        $data['appraiser_list'] = $this->Appraiser_Model->get(); 
        $this->load->view('appraisers-list', $data);
    }

    public function create(){
        $this->load->view('appraisers-create');
    }
    public function create_appraiser()
    {
        $this->form_validation->set_rules('app_name','app_name','required');
        $this->form_validation->set_rules('app_email','app_email','required');
        $this->form_validation->set_rules('app_title','app_title','required');
        $this->form_validation->set_rules('app_license','app_license','required');
        $this->form_validation->set_rules('app_phone','app_phone','required');
   

        if ($this->form_validation->run() == TRUE) {

            $data['app_name'] = $this->input->post('app_name');
            $data['app_email'] = $this->input->post('app_email');
            $data['app_title'] = $this->input->post('app_title');
            $data['app_license'] = $this->input->post('app_license');
            $data['app_phone'] = $this->input->post('app_phone');
            $data['app_home'] = $this->input->post('app_home');
            $data['app_fax'] = $this->input->post('app_fax');
            $data['app_pager'] = $this->input->post('app_pager');
            $data['app_number'] = '';
            $data['app_active'] = $this->input->post('app_active');
            
            if( $data['app_active'] == 'on'){
                $data['app_active'] = 'checked';
            }else{
                $data['app_active'] = '';
            }

            $result = $this->Appraiser_Model->create($data);

            if($result > 0) {

                $this->session->set_flashdata('message_success', 'Entry Created Successfully!');
                redirect("appraisers/create");
            } 
            else {                
                $this->session->set_flashdata('message_error', 'Failed!');
                redirect("appraisers/create");
            }            
        } 
        else {
            $this->create();
        }       
    }

    public function update($id)
    {
        $data['appraiser_single'] = $this->Appraiser_Model->getById($id);
        $this->load->view('appraisers-edit', $data);
    }
    public function update_appraiser()
    {
        // echo "reached";
        // echo $id;
        $this->form_validation->set_rules('upd_app_name','upd_app_name','required');
        $this->form_validation->set_rules('upd_app_email','upd_app_email','required');
        $this->form_validation->set_rules('upd_app_title','upd_app_title','required');
        $this->form_validation->set_rules('upd_app_license','upd_app_license','required');
        $this->form_validation->set_rules('upd_app_phone','upd_app_phone','required');

        if ($this->form_validation->run() == TRUE) {
            $data['app_id'] = $this->uri->segment(3);
            $data['app_name'] = $this->input->post('upd_app_name');
            $data['app_email'] = $this->input->post('upd_app_email');
            $data['app_title'] = $this->input->post('upd_app_title');
            $data['app_license'] = $this->input->post('upd_app_license');
            $data['app_phone'] = $this->input->post('upd_app_phone');
            $data['app_home'] = $this->input->post('upd_app_home');
            $data['app_fax'] = $this->input->post('upd_app_fax');
            $data['app_pager'] = $this->input->post('upd_app_pager');
            // $data['app_number'] = '';
            $data['app_active'] = $this->input->post('upd_app_active');


            $result = $this->Appraiser_Model->update($data);

            if($result > 0) {
                // $this->index();
                redirect("appraisers");

            } 
            else {
                
                $this->session->set_flashdata('update_message_error', 'Failed!');
                // $this->index();
                redirect("appraisers");
            }
            
        } 
    }

    public function delete()
    {
        
        $data['app_id'] = $this->uri->segment(3);

        $result = $this->Appraiser_Model->delete($data);

        if($result > 0) {

             redirect("appraisers");
            // $this->index();
        } 
        else {
            
            $this->session->set_flashdata('delete_message_error', 'Failed!');
            // $this->index();
            redirect("appraisers");
        }

    }

}

?>