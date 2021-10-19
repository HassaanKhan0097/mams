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
        $this->load->model('LoanTypes_Model');
        $this->load->model('Notes_Model');
        

        

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
        $data['loan_types_list'] = $this->LoanTypes_Model->get();
        
        // echo "Start";
        // echo "<pre>";
        
        // print_r($data['client_list']);

        $this->load->view('order-create', $data);
    }
    public function create_order()
    {
        // echo "Reached";




    
        $this->form_validation->set_rules('order_number','order_number','required');
        $this->form_validation->set_rules('order_client_id','order_client_id','required');
        $this->form_validation->set_rules('order_appraiser_id','order_appraiser_id','required');
        $this->form_validation->set_rules('order_paymentmethod','order_paymentmethod','required');
        $this->form_validation->set_rules('order_address','order_address','required');
        $this->form_validation->set_rules('order_city','order_city','required');
        $this->form_validation->set_rules('order_zipcode','order_zipcode','required');
        $this->form_validation->set_rules('order_borrower','order_borrower','required');
        $this->form_validation->set_rules('order_entry','order_entry','required');
        $this->form_validation->set_rules('order_revenue','order_revenue','required');
        $this->form_validation->set_rules('order_type_id','order_type_id','required');
        $this->form_validation->set_rules('order_loan_type','order_loan_type','required');
        $this->form_validation->set_rules('order_assignment_id','order_assignment_id','required');
        $this->form_validation->set_rules('order_status_id','order_status_id','required');
        $this->form_validation->set_rules('order_date','order_date','required');
        $this->form_validation->set_rules('order_duedate','order_duedate','required');
        
       

        if ($this->form_validation->run() == TRUE) {
            // $order_number = substr($this->input->post('order_number'),4);
            $data['order_number'] = $this->input->post('order_number');
            $data['order_address'] = $this->input->post('order_address');
            $data['order_type_id'] = $this->input->post('order_type_id');
            $data['order_loan_number'] = $this->input->post('order_loan_number');
            $data['order_city'] = $this->input->post('order_city');
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
            $data['order_date'] = date( "Y/m/d", strtotime($this->input->post('order_date')) );

            $data['order_borrower'] = $this->input->post('order_borrower');
            $data['order_co_borrower'] = $this->input->post('order_co_borrower');
            $data['order_duedate'] = date( "Y/m/d", strtotime($this->input->post('order_duedate')) );
            $data['order_entry'] = $this->input->post('order_entry');
            $data['order_appointmentdate'] = date( "Y/m/d", strtotime($this->input->post('order_appointmentdate')) );
            $data['order_appraiser_id'] = $this->input->post('order_appraiser_id');
            $data['order_appraiser_id2'] = $this->input->post('order_appraiser_id2');
            $data['order_appraiser_email'] = $this->input->post('order_appraiser_email');
            $data['order_appraiser_email2'] = $this->input->post('order_appraiser_email2');
            $data['order_phone'] = $this->input->post('order_phone');
            $data['order_phone2'] = $this->input->post('order_phone2');
            $data['order_phone3'] = $this->input->post('order_phone3');
            $data['order_appointment_time'] = $this->input->post('order_appointment_time');
            $data['order_completedate'] = date( "Y/m/d", strtotime($this->input->post('order_completedate')) );
            $data['order_paymentmethod'] = $this->input->post('order_paymentmethod');
            $data['order_purchase'] = $this->input->post('order_purchase');
            $data['order_revenue'] = $this->input->post('order_revenue');
            $data['order_expense'] = $this->input->post('order_expense');
            $lt = $this->input->post('order_loan_type');
            
            $data['order_loan_type'] =substr($lt,0,strpos($lt,"|"));
            $data['order_assignment_addon'] = $this->input->post('order_assignment_addon');
            $data['order_borrower_phone1'] = $this->input->post('order_borrower_phone1');
            $data['order_borrower_phone2'] = $this->input->post('order_borrower_phone2');
            $data['order_borrower_phone3'] = $this->input->post('order_borrower_phone3');
            $data['order_borrower_email'] = $this->input->post('order_borrower_email');
            $data['order_sub_app_expense'] = $this->input->post('order_sub_app_expense');
            $data['order_instruction'] = $this->input->post('order_instruction');



        //     echo "<pre>";
        // echo "Create Controller";
        // print_r($data);

            $filenames = [];

            // Count total files
            $countfiles = count($_FILES['order_file']['name']);
 
            // Looping all files
            for($i=0;$i<$countfiles;$i++) {

                // Define new $_FILES array - $_FILES['file']
                $_FILES['file']['name'] = $_FILES['order_file']['name'][$i];
                $_FILES['file']['type'] = $_FILES['order_file']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['order_file']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['order_file']['error'][$i];
                $_FILES['file']['size'] = $_FILES['order_file']['size'][$i];


                $config['upload_path']          = './uploads/orders/';
                $config['allowed_types']        = '*';
                $config['max_size']             = 10024; // 10mb you can set the value you want
                $config['max_width']            = 6000; // 6000px you can set the value you want
                $config['max_height']           = 6000; // 6000px
                $new_name = $data['order_number'].$i;
                $config['file_name'] = $new_name;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        echo "<pre>";
                        print_r($error);

                        // $this->session->set_flashdata('message_error', 'Attachment Upload Failed!');
                        // redirect("clients/create");
                }
                else
                {
                        $uploadedData = array('upload_data' => $this->upload->data());

                        // Initialize array and save every entry to attachment db
                        $filenames[] = $uploadedData['upload_data']['file_name'];

                        echo "<pre>";
                        print_r($filenames);

                }

                unset($this->upload);

            }


        //     echo "<pre>";
        // echo "Create Controller after for";
        // print_r($data);
            

            $data['order_file']  = serialize($filenames);
            

            $loggedUser = $this->session->userdata('loggedUser');

            $dataNote['order_id'] = $this->input->post('order_number');
            $dataNote['user_id'] = $loggedUser['user_id'];        
            

            $start = strpos($lt, "|");
            $end = strrpos($lt, "|");
    
            $lenSubject = $end - $start;
            $subject = substr($lt, $start+1, $lenSubject-1);
    
            $desc = substr($lt, $end+1);

            $dataNote['subject'] = $subject;
            $dataNote['notes'] = $desc;
            $dataNote['date'] = date("Y/m/d") . " ".date("h:i:sa");
            $dataNote['hide_client'] ="off";
            $dataNote['hide_appraiser'] = "off";


            
            
            $this->Notes_Model->loanCreate($dataNote);
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
        else {
            redirect("order/create");
            // echo "Else Form Validation";
           // $this->create();
        }       
    }

    public function update($id)
    {
        $data['order_types_list'] = $this->OrderTypes_Model->get();
        $data['assignment_types_list'] = $this->AssTypes_Model->get();
        $data['status_info_list'] = $this->StatusInfo_Model->get();
        $data['client_list'] = $this->Client_Model->get();
        $data['appraiser_list'] = $this->Appraiser_Model->get();
        $data['loan_types_list'] = $this->LoanTypes_Model->get();


        $data['ord_single'] = $this->Order_Model->getById($id);
        $data['order_single'] = $data['ord_single'][0];



        // $data['city_list'] = $this->CitiesCountries_Model->getCity(); 
        // $data['country_list'] = $this->CitiesCountries_Model->getCountry(); 
 
        $data['previous_order_numbers'] = $this->Order_Model->getOrderNumbers();
        $data['notes'] = $this->Notes_Model->getById($id);
        $data['loggedUser'] = $this->session->userdata('loggedUser');


        // echo "<pre>";
        // print_r( $data['order_single'] );

        $this->load->view('order-edit', $data);
    }
    
    public function update_order() 
    {
        $this->form_validation->set_rules('upd_order_address','Property Address','required');
        $this->form_validation->set_rules('upd_order_type_id','Order Type','required');
        $this->form_validation->set_rules('upd_order_assignment_id','Assignment Type','required');
        $this->form_validation->set_rules('upd_order_state','State','required');
        $this->form_validation->set_rules('upd_order_status_id','Status','required');
        $this->form_validation->set_rules('upd_order_client_id','Client Name','required');
        $this->form_validation->set_rules('upd_order_zipcode','Zip Code','required');
        $this->form_validation->set_rules('upd_order_date','Order Date','required');
        $this->form_validation->set_rules('upd_order_borrower','Borrower','required');
        $this->form_validation->set_rules('upd_order_appraiser_id','Appraiser Name','required');
        $this->form_validation->set_rules('upd_order_appraiser_id2','Sub Appraiser Name','required');
        $this->form_validation->set_rules('upd_order_paymentmethod','Payment Method','required');

        if ($this->form_validation->run() == TRUE) {
            $data['order_number'] = $this->uri->segment(3);

            $data['order_address'] = $this->input->post('upd_order_address');
            $data['order_type_id'] = $this->input->post('upd_order_type_id');
            $data['order_loan_number'] = $this->input->post('upd_order_loan_number');
            $data['order_city'] = $this->input->post('upd_order_city');
            $data['order_assignment_id'] = $this->input->post('upd_order_assignment_id');
            $data['order_assignment_id2'] = $this->input->post('upd_order_assignment_id2');
            $data['order_assignment_id3'] = $this->input->post('upd_order_assignment_id3');
            $data['order_case_number'] = $this->input->post('upd_order_case_number');
            $data['order_state'] = $this->input->post('upd_order_state');
            $data['order_status_id'] = $this->input->post('upd_order_status_id');
            $data['order_client_id'] = $this->input->post('upd_order_client_id');
            $data['order_client_id2'] = $this->input->post('upd_order_client_id2');
            $data['order_amc'] = $this->input->post('upd_order_amc');
            $data['order_website'] = $this->input->post('upd_order_website');
            $data['order_zipcode'] = $this->input->post('upd_order_zipcode');
            $data['order_action'] = $this->input->post('upd_order_action');
            $data['order_date'] = date( "Y/m/d", strtotime($this->input->post('upd_order_date')) );

            $data['order_borrower'] = $this->input->post('upd_order_borrower');
            $data['order_co_borrower'] = $this->input->post('upd_order_co_borrower');
            $data['order_duedate'] = date( "Y/m/d", strtotime($this->input->post('upd_order_duedate')) );
            $data['order_entry'] = $this->input->post('upd_order_entry');
            $data['order_appointmentdate'] = date( "Y/m/d", strtotime($this->input->post('upd_order_appointmentdate')) );
            $data['order_appraiser_id'] = $this->input->post('upd_order_appraiser_id');
            $data['order_appraiser_id2'] = $this->input->post('upd_order_appraiser_id2');
            $data['order_appraiser_email'] = $this->input->post('upd_order_appraiser_email');
            $data['order_appraiser_email2'] = $this->input->post('upd_order_appraiser_email2');
            $data['order_phone'] = $this->input->post('upd_order_phone');
            $data['order_phone2'] = $this->input->post('upd_order_phone2');
            $data['order_phone3'] = $this->input->post('upd_order_phone3');
            $data['order_appointment_time'] = $this->input->post('upd_order_appointment_time');
            $data['order_completedate'] = date( "Y/m/d", strtotime($this->input->post('upd_order_completedate')) );
            $data['order_paymentmethod'] = $this->input->post('upd_order_paymentmethod');
            $data['order_purchase'] = $this->input->post('upd_order_purchase');
            $data['order_revenue'] = $this->input->post('upd_order_revenue');
            $data['order_expense'] = $this->input->post('upd_order_expense');
            $data['order_instruction'] = $this->input->post('upd_order_instruction');


            $result = $this->Order_Model->update($data);

            if($result > 0) {
                // $this->index();
                redirect("order");

            } 
            else {
                
                $this->session->set_flashdata('update_message_error', 'Failed!');
                // $this->index();
                redirect("order");
            }
            
        }else{
            $this->update($this->uri->segment(3));
        } 
    }



    public function byappraiser($value)
    {
        $filter['key'] = 'order_appraiser_id';
        $filter['value'] = $value;

        $data['order_list'] = $this->Order_Model->getByFilter($filter);
        // echo "<pre>";
        // var_dump($data['order_list']);

         $this->load->view('order-list', $data);
    }

    public function byclient($value)
    {
        $filter['key'] = 'order_client_id';
        $filter['value'] = $value;

        $data['order_list'] = $this->Order_Model->getByFilter($filter);
        // echo "<pre>";
        // var_dump($data['order_list']);

         $this->load->view('order-list', $data);
    }

    public function bystatus($value)
    {
        $filter['key'] = 'order_status_id';
        $filter['value'] = $value;

        $data['order_list'] = $this->Order_Model->getByFilter($filter);
        // echo "<pre>";
        // var_dump($data['order_list']);

         $this->load->view('order-list', $data);
    }

    public function byduedate($value)
    {
        $filter['key'] = 'order_duedate';
        $filter['value'] =  $date = date("Y/m/d", $value);

        $data['order_list'] = $this->Order_Model->getByFilter($filter);
        // echo "<pre>";
        // var_dump($data['order_list']);

         $this->load->view('order-list', $data);
    }

    public function byactionrequired($value)
    {
        $filter['key'] = 'order_number';
        $filter['value'] = $value;

        $data['order_list'] = $this->Order_Model->getByFilter($filter);
        // echo "<pre>";
        // var_dump($data['order_list']);

         $this->load->view('order-list', $data);
    }

}

?>