<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CompanyInfo extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->model('CompanyInfo_Model');

    }

    public function index()
    {
        $data['company_list'] = $this->CompanyInfo_Model->getById('1'); 
        $this->load->view('companyinfo', $data);
    }
    
    public function update()
    {
        $this->form_validation->set_rules('company_name','company_name','required');
        $this->form_validation->set_rules('company_address','company_address','required');
        $this->form_validation->set_rules('company_email','company_email','required');
    
        if ($this->form_validation->run() == TRUE) {

            $data['company_id'] = '1';
            $data['company_name'] = $this->input->post('company_name');
            $data['company_address'] = $this->input->post('company_address');
            $data['company_city'] = $this->input->post('company_city');
            $data['company_state'] = $this->input->post('company_state');
            $data['company_zip'] = $this->input->post('company_zip');
            $data['company_phone'] = $this->input->post('company_phone');
            $data['company_fax'] = $this->input->post('company_fax');
            $data['company_email'] = $this->input->post('company_email');
            $data['company_web'] = $this->input->post('company_web');
            $data['company_statement'] = $this->input->post('company_statement');



            $result = $this->CompanyInfo_Model->update($data);

            if($result > 0) {

                $this->session->set_flashdata('message_success', 'Entry Updated Successfully!');
                

                redirect("companyinfo");

            } 
            else {
                
                $this->session->set_flashdata('update_message_error', 'Failed!');
                $this->index();
            }
            
        } 
        else {
            $this->index();
        }

    }

}

?>