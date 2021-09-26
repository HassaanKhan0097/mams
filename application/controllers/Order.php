<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Order_Model');
        $this->load->model('CitiesCountries_Model');
        $this->load->model('Appraiser_Model');
        $this->load->model('Client_Model');
        $this->load->model('OrderTypes_Model');
        $this->load->model('StatusInfo_Model');
        $this->load->model('AssTypes_Model');
        

        

    }

    public function index()
    {
         
        $data['order_list'] = $this->Order_Model->get(); 

        // echo "<pre>";
        // print_r($data['order_list']);


        $this->load->view('order-list', $data);
    }

    public function create()
    {
        $data['city_list'] = $this->CitiesCountries_Model->getCity(); 
        $data['country_list'] = $this->CitiesCountries_Model->getCountry(); 
        $data['appraiser_list'] = $this->Appraiser_Model->get(); 
        $data['client_list'] = $this->Client_Model->get(); 
        $data['order_types_list'] = $this->OrderTypes_Model->get(); 
        $data['status_info_list'] = $this->StatusInfo_Model->get(); 
        $data['assignment_types_list'] = $this->AssTypes_Model->get();
        $data['previous_order_numbers'] = $this->Order_Model->getOrderNumbers();

        
        $this->load->view('order-create', $data);
    }
    public function create_order()
    {
        echo "Reached";
        $this->form_validation->set_rules('order_number','order_number','required');
        $this->form_validation->set_rules('order_address','order_address','required');
        $this->form_validation->set_rules('order_type_id','order_type_id','required');
        $this->form_validation->set_rules('order_assignment_id','order_assignment_id','required');
        $this->form_validation->set_rules('order_state','order_state','required');
        $this->form_validation->set_rules('order_status_id','order_status_id','required');
        $this->form_validation->set_rules('order_client_id','order_client_id','required');
        $this->form_validation->set_rules('order_zipcode','order_zipcode','required');
        $this->form_validation->set_rules('order_date','order_date','required');
        $this->form_validation->set_rules('order_appraiser_id','order_appraiser_id','required');
        $this->form_validation->set_rules('order_paymentmethod','order_paymentmethod','required');
   

        if ($this->form_validation->run() == TRUE) {

            $data['order_number'] = $this->input->post('order_number');
            $data['order_address'] = $this->input->post('order_address');
            $data['order_type_id'] = $this->input->post('order_type_id');
            $data['order_loan_number'] = $this->input->post('order_loan_number');
            $data['order_city_id'] = $this->input->post('order_city_id');
            $data['order_assignment_id'] = $this->input->post('order_assignment_id');
            $data['order_assignment_id2'] = $this->input->post('order_assignment_id2');
            $data['order_assignment_id3'] = $this->input->post('order_assignment_id3');
            $data['order_case_number'] = $this->input->post('order_case_number');
            $data['order_state'] = $this->input->post('order_state');
            $data['order_status_id'] = $this->input->post('order_status_id');
            $data['order_client_id'] = $this->input->post('order_client_id');
            $data['order_client_id2'] = $this->input->post('order_client_id2');
            $data['order_amc'] = $this->input->post('order_amc');
            $data['order_website'] = $this->input->post('order_website');
            $data['order_zipcode'] = $this->input->post('order_zipcode');
            $data['order_action'] = $this->input->post('order_action');
            $data['order_date'] = $this->input->post('order_date');

            $data['order_borrower'] = $this->input->post('order_borrower');
            $data['order_co_borrower'] = $this->input->post('order_co_borrower');
            $data['order_duedate'] = $this->input->post('order_duedate');
            $data['order_entry'] = $this->input->post('order_entry');
            $data['order_appointmentdate'] = $this->input->post('order_appointmentdate');
            $data['order_appraiser_id'] = $this->input->post('order_appraiser_id');
            $data['order_appraiser_id2'] = $this->input->post('order_appraiser_id2');
            $data['order_appraiser_email'] = $this->input->post('order_appraiser_email');
            $data['order_appraiser_email2'] = $this->input->post('order_appraiser_email2');
            $data['order_phone'] = $this->input->post('order_phone');
            $data['order_phone2'] = $this->input->post('order_phone2');
            $data['order_phone3'] = $this->input->post('order_phone3');
            $data['order_appointment_time'] = $this->input->post('order_appointment_time');
            $data['order_completedate'] = $this->input->post('order_completedate');
            $data['order_paymentmethod'] = $this->input->post('order_paymentmethod');
            $data['order_purchase'] = $this->input->post('order_purchase');
            $data['order_revenue'] = $this->input->post('order_revenue');
            $data['order_expense'] = $this->input->post('order_expense');
            $data['order_instruction'] = $this->input->post('order_instruction');


            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = '*';
            $config['max_size']             = 10024; // 10mb you can set the value you want
            $config['max_width']            = 6000; // 6000px you can set the value you want
            $config['max_height']           = 6000; // 6000px

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('order_file'))
            {
                    $error = array('error' => $this->upload->display_errors());

                    $this->session->set_flashdata('message_error', 'Attachment Upload Failed!');
                    redirect("order/create");
            }
            else
            {
                    $uploadedData = array('upload_data' => $this->upload->data());
                    $data['order_file'] = $uploadedData['upload_data']['file_name'];
                    // echo "<pre>";
                    // print_r($uploadedData['upload_data']['file_name']);

                    $result = $this->Order_Model->create($data);

                    if($result > 0) {

                        $this->session->set_flashdata('message_success', 'Entry Created Successfully!');
                        redirect("order/create");
                    } 
                    else {                
                        $this->session->set_flashdata('message_error', 'Failed!');
                        redirect("order/create");
                    }

            }
            
                
        } 
        else {
            $this->create();
        }       
    }

    public function update($id)
    {
        // echo "Reached";
        // $data['order_single'] = $this->Order_Model->getById($id);
        // echo "<pre>";
        // print_r($data['appraiser_single']);
        $this->load->view('order-edit');
    } 

    public function edit($id)
    {
        $this->load->view('file-edit');
    }

}

?>