
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoanType extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('LoanTypes_Model');

    }

    public function index()
    {
        $data['loan_types_list'] = $this->LoanTypes_Model->get(); 
        $this->load->view('loantypes', $data);
    }



    public function create()
    {
        $this->form_validation->set_rules('loan_name','loan_name','required');
        $this->form_validation->set_rules('loan_desc','loan_desc','required');

        if ($this->form_validation->run() == TRUE) {

            $data['loan_name'] = $this->input->post('loan_name');
            $data['loan_desc'] = $this->input->post('loan_desc');

            $result = $this->LoanTypes_Model->create($data);

            if($result > 0) {

                $this->session->set_flashdata('message_success', 'Entry Created Successfully!');
                redirect("loantype");

            } 
            else {
                
                $this->session->set_flashdata('message_error', 'Failed!');
                redirect("loantype");
            }
            
        } 
        else {
            $this->index();
        }

    }


    public function update()
    {
        $this->form_validation->set_rules('update_loan_name','update_loan_name','required');
        $this->form_validation->set_rules('update_loan_desc','update_loan_desc','required');
        if ($this->form_validation->run() == TRUE) {

            $data['loan_id'] = $this->uri->segment(3);
            $data['loan_name'] = $this->input->post('update_loan_name');
            $data['loan_desc'] = $this->input->post('update_loan_desc');

            $result = $this->LoanTypes_Model->update($data);

            if($result > 0) {

                redirect("loantype");

            } 
            else {
                
                $this->session->set_flashdata('update_message_error', 'Failed!');
                $this->index();
            }
            
        } 

    }



    public function delete()
    {

        $data['loan_id'] = $this->uri->segment(3);
        $countOrder = $this->LoanTypes_Model->countOrder($data['loan_id']);
              
        // echo $countOrder;
       if($countOrder == 0){
            $result = $this->LoanTypes_Model->delete($data);
            if($result > 0) {
                redirect("loantype");
            } 
            else {            
                $this->session->set_flashdata('message_error', 'Failed to delete!');
                redirect("loantype");
            }
       }else{
            $this->session->set_flashdata('message_error', 'This Loan Type is Used in Order, Kindly delete that First!');        
            redirect("loantype");
       }


        
        // $data['loan_id'] = $this->uri->segment(3);

        // $result = $this->LoanTypes_Model->delete($data);

        // if($result > 0) {

        //     redirect("loantype");

        // } 
        // else {
            
        //     $this->session->set_flashdata('delete_message_error', 'Failed!');
        //     $this->index();
        // }

    }

}

?>