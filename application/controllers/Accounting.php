<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounting extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        if(!$this->session->userdata('loggedUser')){
            redirect('Mams');
        }

        $this->load->model('Accounting_Model');
        $this->load->model('Client_Model');
        $this->load->model('Order_Model');
        $this->load->model('Appraiser_Model');
        
    }

    public function index()
    {
        $data['acc_client_list'] = $this->Accounting_Model->getAccClient();   
        $this->load->view('accounting-client', $data);
    }
    public function client_detail($id){

        $data['cl_id'] = $this->Client_Model->getById($id);
        $data['cl_single'] = $data['cl_id'][0];
        $data['acc_cl'] = $this->Accounting_Model->getAccClientById($id);

        $data['voucher_list'] = $this->Accounting_Model->getVoucherById($id); 

        $this->load->view('accounting-detail-client', $data);
    }

    public function create_cl_voucher($id){

        $data['v_number'] = $this->input->post('modalcheckNo');
        $data['v_date'] = $this->input->post('modalpaymentDate'); 
        $data['v_total'] = $this->input->post('inputtotalAmount');
        $data['v_desc'] = $this->input->post('modalpaymentDesc');
        
        $data['v_cl_id'] = $id;
        
        $o = $this->input->post('inputorderNumbers');
        $o_arr = explode("<br>", $o);



        $result = $this->Accounting_Model->createAccClient($data); 

        if($result > 0) {

            foreach($o_arr as $a){
                $data2['order_v_client'] = $data['v_number'];
                $data2['order_number'] = $a;
                $result2 = $this->Accounting_Model->updateAcc($data2);
            }
            $this->session->set_flashdata('message_success', 'Entry Created Successfully!');
            redirect("accounting");


        } 
        else {                
            $this->session->set_flashdata('message_error', 'Failed!');
            redirect("accounting/client_detail/".$id);
        }
    }


    public function get_single_voucher($id,$cl_id){

            // $id = $this->uri->segment(3);
     // $cl_id = $this->uri->segment(4);
        $data['cl_id'] = $this->Client_Model->getById($cl_id);
        $data['cl_single'] = $data['cl_id'][0];
        

        $data['voucher_single'] = $this->Accounting_Model->getSingleVoucher($id); 

        $data['order_list'] = $this->Accounting_Model->getSingleVoucherDetail($id);
        $this->load->view('accounting-cl-voucher', $data);
    }

    public function unpayClient($v_number){
        $this->Accounting_Model->deleteVoucher($v_number);
        $result = $this->Accounting_Model->resetOrderClient($v_number);

        if($result > 0) {
            redirect("accounting");
        } 
        else {            
            $this->session->set_flashdata('update_message_error', 'Failed!');
            redirect("accounting");
        }
        

    }


    public function load_search_cl(){
        $data['client_list'] = $this->Client_Model->get();        
        $data['voucher_list'] = $this->Accounting_Model->getVoucher(); 
        $this->load->view('accounting-search-cl', $data);
    }

    public function search_cl(){


        $res['v_number'] = $this->input->post('v_number');
        $res['v_desc'] = $this->input->post('v_desc');
        $res['v_cl_id'] = $this->input->post('v_cl_id');
        $res['v_date'] = $this->input->post('v_date');

        $data['voucher_list'] = $this->Accounting_Model->getSearchVoucher($res);
        $data['client_list'] = $this->Client_Model->get();  
        $this->load->view('accounting-search-cl', $data);
    }

    public function payable(){
        $data['acc_app_list'] = $this->Accounting_Model->getAccAppraiser();   
        $this->load->view('accounting-app', $data);
    }
    public function app_detail($id){

        // $data['cl_id'] = $this->Client_Model->getById($id);
        // $data['cl_single'] = $data['cl_id'][0];
        $data['appraiser_single'] = $this->Appraiser_Model->getById($id);
        $data['acc_app'] = $this->Accounting_Model->getAccAppById($id);

        $data['voucher_list'] = $this->Accounting_Model->getVoucherAppById($id); 

        // echo "<pre>";
        // print_r($data['appraiser_single'] );

        // echo "<br><br><pre>";
        // print_r($data['acc_app'] );
        $this->load->view('accounting-detail-app', $data);
    }


    public function create_app_voucher($id){

        $data['v_number'] = $this->input->post('modalcheckNo');
        $data['v_date'] = $this->input->post('modalpaymentDate'); 
        $data['v_total'] = $this->input->post('inputtotalAmount');
        $data['v_desc'] = $this->input->post('modalpaymentDesc');
        
        $data['v_app_id'] = $id;
        
        $o = $this->input->post('inputorderNumbers');
        $o_arr = explode("<br>", $o);



        $result = $this->Accounting_Model->createAccApp($data); 

        if($result > 0) {

            foreach($o_arr as $a){
                $data2['order_v_appraiser'] = $data['v_number'];
                $data2['order_number'] = $a;
                $result2 = $this->Accounting_Model->updateAccApp($data2);
            }
            $this->session->set_flashdata('message_success', 'Entry Created Successfully!');
            redirect("accounting/payable");


        } 
        else {                
            $this->session->set_flashdata('message_error', 'Failed!');
            redirect("accounting/app_detail/".$id);
        }
    }


    public function get_single_voucher_app($id,$app_id){
        $data['appraiser_single'] = $this->Appraiser_Model->getById($app_id);
        $data['voucher_single'] = $this->Accounting_Model->getSingleVoucher($id);
        $data['order_list'] = $this->Accounting_Model->getSingleVoucherAppDetail($id);

        // echo "<pre>";
        // print_r($data['order_list'] );

        $this->load->view('accounting-app-voucher', $data);
    }
    public function unpayApp($v_number){
        $this->Accounting_Model->deleteVoucher($v_number);
        $result = $this->Accounting_Model->resetOrderApp($v_number);

        if($result > 0) {
            redirect("accounting/payable");
        } 
        else {            
            $this->session->set_flashdata('update_message_error', 'Failed!');
            redirect("accounting/payable");
        }
        

    }
    


    public function load_search_app(){
        $data['appraiser_list'] = $this->Appraiser_Model->get();        
        $data['voucher_list'] = $this->Accounting_Model->getVoucherApp(); 
        $this->load->view('accounting-search-app', $data);
    }

    public function search_app(){

        $res['v_number'] = $this->input->post('v_number');
        $res['v_desc'] = $this->input->post('v_desc');
        $res['v_app_id'] = $this->input->post('v_app_id');
        $res['v_date'] = $this->input->post('v_date');

        $data['voucher_list'] = $this->Accounting_Model->getSearchVoucherApp($res);
        $data['appraiser_list'] = $this->Appraiser_Model->get(); 
        $this->load->view('accounting-search-app', $data);
    }
    


}

?>