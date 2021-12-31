<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Report_Model');
        $this->load->model('Appraiser_Model');
        $this->load->model('Client_Model');
        

        if(!$this->session->userdata('loggedUser')){
            redirect('Mams');
        }
        

    }

    public function index()
    {
        $data['status_info_list'] = $this->StatusInfo_Model->get(); 
        $this->load->view('statusinfo', $data);
    }



    public function pipeline()
    {


        
        $data['payment'] = $this->Report_Model->pipelineByPaymentMethod(); 
        $data['status'] = $this->Report_Model->pipelineByStatus(); 
        $data['cod_status'] = $this->Report_Model->pipelineByCODStatus();         
        $data['app'] = $this->Report_Model->pipelineByAppraiser(); 
        $data['cl'] = $this->Report_Model->pipelineByClient(); 

        // echo "<pre>";
        // print_r($data['cl']);

        // $data['st_name'] = $this->input->post('st_name');
        // $result = $this->StatusInfo_Model->create($data);

        // if($result > 0) {
        //     $this->session->set_flashdata('message_success', 'Entry Created Successfully!');
        //     redirect("statusinfo");
        // } 
        // else {
        //     $this->session->set_flashdata('message_error', 'Failed!');
        //     redirect("statusinfo");
        // }
        $this->load->view('rep_pipeline.php', $data);

    }

    public function legacy(){
        $data['legacy'] = $this->Report_Model->legacyByOffice();
        $data['range'] = "Day";

        $data['leg'] = "Office";

        
        // echo "<pre>";
        // print_r($data['range']);

        $this->load->view('rep_legacy.php', $data);
    }

    public function legacy_change(){

        $l = $this->input->post('legacy');
        $d = $this->input->post('range');
        $data['range'] = $d;
        $data['leg'] = $l;

        if($l == 'Office' && $d == 'Day'){
            $data['legacy'] = $this->Report_Model->legacyByOffice();
        }else if($l == 'Office' && $d == 'Week'){
            $data['legacy'] = $this->Report_Model->legacyByOfficeByWeek();
        }else if($l == 'Office' && $d == 'Month'){
            $data['legacy'] = $this->Report_Model->legacyByOfficeByMonth();
        }else if($l == 'Office' && $d == 'Quarter'){
            $data['legacy'] = $this->Report_Model->legacyByOfficeByQuarter();
        }else if($l == 'Office' && $d == 'Year'){
            $data['legacy'] = $this->Report_Model->legacyByOfficeByYear();
        }

        if($l == "Appraiser"){
            $data['app_list'] = $this->Appraiser_Model->get(); 
            $data['app_id'] = $this->input->post('appraiser');
            
            if($d == "Day"){
                $data['legacy'] = $this->Report_Model->legacyByApp($data['app_id']);
            }else if($d == "Week"){
                $data['legacy'] = $this->Report_Model->legacyByAppByWeek($data['app_id']);
            }else if($d == "Month"){
                $data['legacy'] = $this->Report_Model->legacyByAppByMonth($data['app_id']);
            }else if($d == "Quarter"){
                $data['legacy'] = $this->Report_Model->legacyByAppByQuarter($data['app_id']);
            }else if($d == "Year"){
                $data['legacy'] = $this->Report_Model->legacyByAppByYear($data['app_id']);
            }
        }

        if($l == "Client"){
            $data['cl_list'] = $this->Client_Model->get(); 
            $data['cl_id'] = $this->input->post('client');
            
            if($d == "Day"){
                $data['legacy'] = $this->Report_Model->legacyByClient($data['cl_id']);
            }else if($d == "Week"){
                $data['legacy'] = $this->Report_Model->legacyByClientByWeek($data['cl_id']);
            }else if($d == "Month"){
                $data['legacy'] = $this->Report_Model->legacyByClientByMonth($data['cl_id']);
            }else if($d == "Quarter"){
                $data['legacy'] = $this->Report_Model->legacyByClientByQuarter($data['cl_id']);
            }else if($d == "Year"){
                $data['legacy'] = $this->Report_Model->legacyByClientByYear($data['cl_id']);
            }
        }




        
        // echo "<pre>";
        // print_r($data['legacy'] );
        $this->load->view('rep_legacy.php', $data);

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
        $countOrder = $this->StatusInfo_Model->countOrder($data['st_id']);
              
        // echo $countOrder;
       if($countOrder == 0){
            $result = $this->StatusInfo_Model->delete($data);
            if($result > 0) {
                redirect("statusinfo");
            } 
            else {            
                $this->session->set_flashdata('message_error', 'Failed to delete!');
                redirect("statusinfo");
            }
       }else{
            $this->session->set_flashdata('message_error', 'This Status Info is Used in Order, Kindly delete that First!');        
            redirect("statusinfo");
       }

        
        // $data['st_id'] = $this->uri->segment(3);

        // $result = $this->StatusInfo_Model->delete($data);

        // if($result > 0) {

        //     redirect("statusinfo");

        // } 
        // else {
            
        //     $this->session->set_flashdata('delete_message_error', 'Failed!');
        //     $this->index();
        // }

    }

}

?>