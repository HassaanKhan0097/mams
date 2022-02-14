<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();


        
        if(!$this->session->userdata('loggedUser')){
            redirect('Mams');
        }

        $this->load->model('Order_Model');
        $this->load->model('CitiesCountries_Model');
        $this->load->model('Appraiser_Model');
        $this->load->model('Client_Model');
        $this->load->model('OrderTypes_Model');
        $this->load->model('StatusInfo_Model');
        $this->load->model('AssTypes_Model');
        $this->load->model('AssAddon_Model');
        $this->load->model('LoanTypes_Model');
        $this->load->model('Notes_Model');
        

        

    }

    public function index()
    {
         
        $data['order_list'] = $this->Order_Model->get(); 
        $data['client_list'] = $this->Client_Model->get(); 
        $data['city_list'] = $this->CitiesCountries_Model->getCity(); 
        $data['appraiser_list'] = $this->Appraiser_Model->get(); 



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
        $data['assignment_addon_list'] = $this->AssAddon_Model->get();
        $data['previous_order_numbers'] = $this->Order_Model->getOrderNumbers();
        $data['loan_types_list'] = $this->LoanTypes_Model->get();
    

        $this->load->view('order-create', $data);
    }

    public function create_orders()
    {
        $orderid = $this->input->post('order_number');

        $Order_exist = $this->Order_Model->checkId($id);

            if($Order_exist > 0) {

               
            } 
            else {                
                echo "No";
            }

    }
    public function create_order()
    {
        // echo "Reached";

        $orderid = $this->input->post('order_number');

        $Order_exist = $this->Order_Model->checkId($orderid);

            if($Order_exist > 0) {

                $data['city_list'] = $this->CitiesCountries_Model->getCity(); 
        $data['country_list'] = $this->CitiesCountries_Model->getCountry(); 
        $data['appraiser_list'] = $this->Appraiser_Model->get(); 
        $data['client_list'] = $this->Client_Model->get(); 
        $data['order_types_list'] = $this->OrderTypes_Model->get(); 
        $data['status_info_list'] = $this->StatusInfo_Model->get(); 
        $data['assignment_types_list'] = $this->AssTypes_Model->get();
        $data['assignment_addon_list'] = $this->AssAddon_Model->get();
        $data['previous_order_numbers'] = $this->Order_Model->getOrderNumbers();
        $data['loan_types_list'] = $this->LoanTypes_Model->get();


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

            $cl_ins = $this->input->post('order_cl_ins');

            $data['order_client_id2'] = $this->input->post('order_client_id2');
            $data['order_amc'] = $this->input->post('order_amc');
            $data['order_website'] = $this->input->post('order_website');
            $data['order_zipcode'] = $this->input->post('order_zipcode');
            $data['order_action'] = $this->input->post('order_action');
            $data['order_date'] = date( "Y/m/d", strtotime($this->input->post('order_date')) );

            $data['order_borrower'] = $this->input->post('order_borrower');
            $data['order_co_borrower'] = $this->input->post('order_co_borrower');
            $data['order_duedate'] = date( "m/d/Y", strtotime($this->input->post('order_duedate')) );
            $data['order_entry'] = $this->input->post('order_entry');
            
            $apt_date = $this->input->post('order_appointmentdate');
            if($apt_date != ""){
                $data['order_appointmentdate'] = date( "m/d/Y", strtotime($apt_date) );
            }

            $com_date = $this->input->post('order_completedate');
            if($com_date != ""){
                $data['order_completedate'] = date( "m/d/Y", strtotime($com_date) );
            }
            
            $data['order_appraiser_id'] = $this->input->post('order_appraiser_id');
            $data['order_appraiser_id2'] = $this->input->post('order_appraiser_id2');
            $data['order_appraiser_email'] = $this->input->post('order_appraiser_email');
            $data['order_appraiser_email2'] = $this->input->post('order_appraiser_email2');
            $data['order_phone'] = $this->input->post('order_phone');
            $data['order_phone2'] = $this->input->post('order_phone2');
            $data['order_phone3'] = $this->input->post('order_phone3');
            $data['order_appointment_time'] = $this->input->post('order_appointment_time');
            
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
            $data['order_borrower_email2'] = $this->input->post('order_borrower_email2');
            
            $data['order_sub_app_expense'] = $this->input->post('order_sub_app_expense');
            $data['order_instruction'] = $this->input->post('order_instruction');
            //    redirect("order/create");
               $this->session->set_flashdata('message_error', 'Order Number Already Exist!');
            //     redirect("order/create");

                $this->load->view('order-create',$data);
            } 
            else {                
    
        $this->form_validation->set_rules('order_number','order_number','required');
        // $this->form_validation->set_rules('order_client_id','order_client_id','required');
        // $this->form_validation->set_rules('order_appraiser_id','order_appraiser_id','required');
        // $this->form_validation->set_rules('order_paymentmethod','order_paymentmethod','required');
        // $this->form_validation->set_rules('order_address','order_address','required');
        // $this->form_validation->set_rules('order_city','order_city','required');
        // $this->form_validation->set_rules('order_zipcode','order_zipcode','required');
        // $this->form_validation->set_rules('order_borrower','order_borrower','required');
        // $this->form_validation->set_rules('order_entry','order_entry','required');
        // $this->form_validation->set_rules('order_revenue','order_revenue','required');
        // $this->form_validation->set_rules('order_type_id','order_type_id','required');
        // $this->form_validation->set_rules('order_loan_type','order_loan_type','required');
        // $this->form_validation->set_rules('order_assignment_id','order_assignment_id','required');
        // $this->form_validation->set_rules('order_status_id','order_status_id','required');
        // $this->form_validation->set_rules('order_date','order_date','required');
        // $this->form_validation->set_rules('order_duedate','order_duedate','required');
        
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

            $cl_ins = $this->input->post('order_cl_ins');

            $data['order_client_id2'] = $this->input->post('order_client_id2');
            $data['order_amc'] = $this->input->post('order_amc');
            $data['order_website'] = $this->input->post('order_website');
            $data['order_zipcode'] = $this->input->post('order_zipcode');
            $data['order_action'] = $this->input->post('order_action');
            $data['order_date'] = date( "Y/m/d", strtotime($this->input->post('order_date')) );

            $data['order_borrower'] = $this->input->post('order_borrower');
            $data['order_co_borrower'] = $this->input->post('order_co_borrower');
            $data['order_duedate'] = date( "m/d/Y", strtotime($this->input->post('order_duedate')) );
            $data['order_entry'] = $this->input->post('order_entry');
            
            $apt_date = $this->input->post('order_appointmentdate');
            if($apt_date != ""){
                $data['order_appointmentdate'] = date( "m/d/Y", strtotime($apt_date) );
            }

            $com_date = $this->input->post('order_completedate');
            if($com_date != ""){
                $data['order_completedate'] = date( "m/d/Y", strtotime($com_date) );
            }
            
            $data['order_appraiser_id'] = $this->input->post('order_appraiser_id');
            $data['order_appraiser_id2'] = $this->input->post('order_appraiser_id2');
            $data['order_appraiser_email'] = $this->input->post('order_appraiser_email');
            $data['order_appraiser_email2'] = $this->input->post('order_appraiser_email2');
            $data['order_phone'] = $this->input->post('order_phone');
            $data['order_phone2'] = $this->input->post('order_phone2');
            $data['order_phone3'] = $this->input->post('order_phone3');
            $data['order_appointment_time'] = $this->input->post('order_appointment_time');
            
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
            $data['order_borrower_email2'] = $this->input->post('order_borrower_email2');
            
            $data['order_sub_app_expense'] = $this->input->post('order_sub_app_expense');
            $data['order_instruction'] = $this->input->post('order_instruction');



        //     echo "<pre>";
        // echo "Create Controller";
        // print_r($data);

            $filenames = [];
            $fn = array ();
            $arr = [ "Contract","Option Sheets","Comparable Info","Plat","Plans/Specs","Condo Questionnaire","ADU Letter","Photo","Client Instructions" ];
            $orderfile_input = ["of_contract","of_option","of_comparable","of_plat","of_plan","of_condo","of_adu","of_photo","of_client"];
  
             // ForEach Start
            foreach($orderfile_input as $of_input)
            {        
                // Count total files
                $countfiles = count(array_filter($_FILES[$of_input]['name']));
                // Looping all files 
                for($i=0;$i<$countfiles;$i++) {
                    $path = 'uploads/orders/' . $data['order_number'];
                    if(!is_dir($path)){
                        mkdir($path);
                    }
                    // Define new $_FILES array - $_FILES['file']
                    $_FILES['file']['name'] = $_FILES[$of_input]['name'][$i];
                    $_FILES['file']['type'] = $_FILES[$of_input]['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES[$of_input]['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES[$of_input]['error'][$i];
                    $_FILES['file']['size'] = $_FILES[$of_input]['size'][$i];

                    $config['upload_path']          = './uploads/orders/' . $data['order_number'] . '/';
                    $config['allowed_types']        = '*';
                    $config['max_size']             = 10024; // 10mb you can set the value you want
                    $config['max_width']            = 6000; // 6000px you can set the value you want
                    $config['max_height']           = 6000; // 6000px                
                    $new_name = $_FILES[$of_input]['name'][$i] ;

                    $config['file_name'] = $new_name;
                    array_push($fn,array($of_input , $_FILES[$of_input]['name'][$i]  ) );

                    $this->load->library('upload', $config);

                    if ( ! $this->upload->do_upload('file'))
                    {
                            $error = array('error' => $this->upload->display_errors());                            
                    }
                    else
                    {
                            $uploadedData = array('upload_data' => $this->upload->data());                           
                    }
                    unset($this->upload);
                }
                
            }
            // ForEach End

            $tmpArr = array();
   
            foreach ($fn as $sub) {
            $tmpArr[] = implode(',',$sub);
            }
            $result = implode('|',$tmpArr);


           
            $data['order_file']  = $result;

            // Create Notes Added

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
            $dataNote['date'] = date("m/d/Y") . " ".date("h:i:sa");
            $dataNote['hide_client'] ="off";
            $dataNote['hide_appraiser'] = "off";


            
            
            // $this->Notes_Model->loanCreate($dataNote);
            // Loan Type Added in Notes Model

            $dataNote2['order_id'] = $dataNote['order_id'];
            $dataNote2['user_id'] = $dataNote['user_id']; 
            $dataNote2['subject'] = "Client Special Instruction";
            $dataNote2['notes'] = $cl_ins;
            $dataNote2['date'] = $dataNote['date'];
            $dataNote2['hide_client'] ="off";
            $dataNote2['hide_appraiser'] = "off";

            $this->Notes_Model->loanCreate($dataNote2);
            // Client Instruction Added


            $result = $this->Order_Model->create($data);
            // Order Added


            $this->email_create_order($data);

            if($result > 0) {

                $this->session->set_flashdata('message_success', 'Entry Created Successfully!');
                // redirect("order/create");
                redirect("home");
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
    }

    public function update($id)
    {
        $data['order_types_list'] = $this->OrderTypes_Model->get();
        $data['assignment_types_list'] = $this->AssTypes_Model->get();
        $data['assignment_addon_list'] = $this->AssAddon_Model->get();
        $data['status_info_list'] = $this->StatusInfo_Model->get();
        $data['client_list'] = $this->Client_Model->get();
        $data['appraiser_list'] = $this->Appraiser_Model->get();
        $data['loan_types_list'] = $this->LoanTypes_Model->get();
        $data['city_list'] = $this->CitiesCountries_Model->getCity(); 


        $data['ord_single'] = $this->Order_Model->getById($id);

        
        $data['order_single'] = $data['ord_single'][0];




        // echo $data['order_single']->order_v_client;
        // echo $data['order_single']->order_v_appraiser;

        $data['app_voucher'] = $this->Order_Model->getAppraiserVoucher($data['order_single']->order_v_appraiser);        
        $data['cl_voucher'] = $this->Order_Model->getClientVoucher($data['order_single']->order_v_client);
    

        // echo "<pre>";
        // print_r( $data['order_single']);
        // echo $data['order_single']->order_status_id;
 

        $this->session->set_userdata('status_id', $data['order_single']->order_status_id);

        $data['previous_order_numbers'] = $this->Order_Model->getOrderNumbers();
        $data['notes'] = $this->Notes_Model->getById($id);
        $data['loggedUser'] = $this->session->userdata('loggedUser');

        $this->load->view('order-edit', $data);
    }
    


    public function update_order($id) 
    {

        // echo "Reached";
        $this->form_validation->set_rules('upd_order_number','order_number','required');
        // $this->form_validation->set_rules('upd_order_client_id','order_client_id','required');
        // $this->form_validation->set_rules('upd_order_appraiser_id','order_appraiser_id','required');
        // $this->form_validation->set_rules('upd_order_paymentmethod','order_paymentmethod','required');
        // $this->form_validation->set_rules('upd_order_address','order_address','required');
        // $this->form_validation->set_rules('upd_order_city','order_city','required');
        // $this->form_validation->set_rules('upd_order_zipcode','order_zipcode','required');
        // $this->form_validation->set_rules('upd_order_borrower','order_borrower','required');
        // $this->form_validation->set_rules('upd_order_entry','order_entry','required');
        // $this->form_validation->set_rules('upd_order_revenue','order_revenue','required');
        // $this->form_validation->set_rules('upd_order_type_id','order_type_id','required');
        // $this->form_validation->set_rules('upd_order_loan_type','order_loan_type','required');
        // $this->form_validation->set_rules('upd_order_assignment_id','order_assignment_id','required');
        // $this->form_validation->set_rules('upd_order_status_id','order_status_id','required');
        // $this->form_validation->set_rules('upd_order_date','order_date','required');
        // $this->form_validation->set_rules('upd_order_duedate','order_duedate','required');


      

        if ($this->form_validation->run() == TRUE) {
            // echo "Reached inner<br>";
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
            $data['order_duedate'] = date( "m/d/Y", strtotime($this->input->post('upd_order_duedate')) );
            $data['order_entry'] = $this->input->post('upd_order_entry');

            $apt_date = $this->input->post('upd_order_appointmentdate');
            if(strlen($apt_date) > 1){
                $data['order_appointmentdate'] = date( "m/d/Y", strtotime($apt_date) );
            }

            $com_date = $this->input->post('upd_order_completedate');
            if($com_date != ""){
                $data['order_completedate'] = date( "m/d/Y", strtotime($com_date) );
            }

            // $data['order_completedate'] = date( "m/d/Y", strtotime($this->input->post('upd_order_completedate')) );

            // $data['order_appointmentdate'] = date( "m/d/Y", strtotime($this->input->post('upd_order_appointmentdate')) );
            $data['order_appraiser_id'] = $this->input->post('upd_order_appraiser_id');
            $data['order_appraiser_id2'] = $this->input->post('upd_order_appraiser_id2');
            $data['order_appraiser_email'] = $this->input->post('upd_order_appraiser_email');
            $data['order_appraiser_email2'] = $this->input->post('upd_order_appraiser_email2');
            $data['order_phone'] = $this->input->post('upd_order_phone');
            $data['order_phone2'] = $this->input->post('upd_order_phone2');
            $data['order_phone3'] = $this->input->post('upd_order_phone3');
            $data['order_appointment_time'] = $this->input->post('upd_order_appointment_time');
            $data['order_paymentmethod'] = $this->input->post('upd_order_paymentmethod');
            $data['order_purchase'] = $this->input->post('upd_order_purchase');
            $data['order_revenue'] = $this->input->post('upd_order_revenue');
            $data['order_expense'] = $this->input->post('upd_order_expense');
            $data['order_instruction'] = $this->input->post('upd_order_instruction');

            $lt = $this->input->post('upd_order_loan_type');
            
            $data['order_loan_type'] =substr($lt,0,strpos($lt,"|"));

            // newly added
            $data['order_assignment_addon'] = $this->input->post('upd_order_assignment_addon');
            $data['order_borrower_phone1'] = $this->input->post('upd_order_borrower_phone1');
            $data['order_borrower_phone2'] = $this->input->post('upd_order_borrower_phone2');
            $data['order_borrower_phone3'] = $this->input->post('upd_order_borrower_phone3');
            $data['order_borrower_email'] = $this->input->post('upd_order_borrower_email');
            $data['order_borrower_email2'] = $this->input->post('upd_order_borrower_email2');

            $data['order_sub_app_expense'] = $this->input->post('upd_order_sub_app_expense');


            $filenames = [];
            $fn = array ();
            $arr = [ "Contract","Option Sheets","Comparable Info","Plat","Plans/Specs","Condo Questionnaire","ADU Letter","Photo","Client Instructions" ];
            $orderfile_input = ["of_contract","of_option","of_comparable","of_plat","of_plan","of_condo","of_adu","of_photo","of_client"];
            $fileStr = [11,9,13,7,7,8,5,8,9];
            $fCount = 0;
            $old = $this->input->post('upd_old_file');
            $new_file_status = "false";
             // ForEach Start
            foreach($orderfile_input as $of_input)
            {        
              
                // Count total files
                $countfiles = count(array_filter($_FILES[$of_input]['name']));
                // Looping all files 

                while($of_input == substr($old,0,$fileStr[$fCount]) ){
                    $old = substr($old, $fileStr[$fCount]+1);

                    if(substr($old , 0 , strpos($old,'|') != ""))
                    {
                        $tmpFile = substr($old , 0 , strpos($old,'|'));
                    }else
                    {
                        $tmpFile = substr($old , 0 );
                    }
                    
                    array_push($fn,array($of_input , $tmpFile  ) );
                    $old = substr($old,  strpos($old,'|')+1);

                }
                $fCount++;

                for($i=0;$i<$countfiles;$i++) {
                    $path = 'uploads/orders/' . $data['order_number'];
                    if(!is_dir($path)){
                        mkdir($path);
                    }
                    // Define new $_FILES array - $_FILES['file']
                    $_FILES['file']['name'] = $_FILES[$of_input]['name'][$i];
                    $_FILES['file']['type'] = $_FILES[$of_input]['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES[$of_input]['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES[$of_input]['error'][$i];
                    $_FILES['file']['size'] = $_FILES[$of_input]['size'][$i];

                    $config['upload_path']          = './uploads/orders/' . $data['order_number'] . '/';
                    $config['allowed_types']        = '*';
                    $config['max_size']             = 10024; // 10mb you can set the value you want
                    $config['max_width']            = 6000; // 6000px you can set the value you want
                    $config['max_height']           = 6000; // 6000px                
                    $new_name = $_FILES[$of_input]['name'][$i] ;

                    $config['file_name'] = $new_name;
                    array_push($fn,array($of_input , $_FILES[$of_input]['name'][$i]  ) );
                    
                    
                    $this->load->library('upload', $config);

                    if ( ! $this->upload->do_upload('file'))
                    {
                            $error = array('error' => $this->upload->display_errors());                            
                    }
                    else
                    {
                            $uploadedData = array('upload_data' => $this->upload->data()); 
                            $new_file_status = "true" ;                          
                    }
                    unset($this->upload);
                }//for loop

               
                
            }
            // ForEach End

            $tmpArr = array();
   
            foreach ($fn as $sub) {
            $tmpArr[] = implode(',',$sub);
            }
            $result = implode('|',$tmpArr);
           
            $data['order_file']  =    $result;

            // echo "<br><pre>old ===========<br>";
            // echo "<pre>";
            // print_r($old);

            // echo "<br><pre>old ===========<br>";
            // echo "<pre>";
            // print_r($result);




            $od = $this->input->post('upd_old_delete_file');
            // echo "Reached od<br>";
            // print_r($od);

            if($od != ""){

                define('EXT', '.'.pathinfo(__FILE__, PATHINFO_EXTENSION));
                define('PUBPATH',str_replace(SELF,'',FCPATH)); // added

                $path3= "uploads/orders/" . $this->uri->segment(3);
                
                if(strpos($od,",")){
                    $tmparr[] = explode(",", $od);

                    // echo "<br><pre>tmparr ===========<br>" ;
                    // echo "<pre>";
                    // print_r($tmparr);
                    // echo "<br><br>";

                    foreach($tmparr[0] as $t){                      
                        $str = $t;

                        $str= str_replace(" ","_",$str);
                        $filestring = PUBPATH.$path3 . "/".  $str;


                        // echo "<br><pre>if ===========<br>" ;
                        // print_r($filestring);

                        unlink($filestring);                        
                    }
                }else{
                    $od = str_replace(" ","_",$od);
                    $filestring = PUBPATH.$path3 . "/".  $od;
                    // echo "<br><pre>else ===========<br>";
                    //     print_r($filestring);
                    unlink($filestring);    
                }                
            }

            // if($this->session->userdata('status_id') != $data['order_status_id']){
            if($data['order_status_id'] == '10' || $data['order_status_id'] == '16' ){
                $this->email_status($data);
            }

            
            if($new_file_status == "true"){
                $this->email_attach($data);
            }
            // echo "<br>data ===========<br>";
            // echo "<pre>";
            //             print_r($data);

            $result = $this->Order_Model->update($data);

            if($result > 0) { 
                
                redirect('home');


                // if($data['order_status_id'] == '15'){
                //     redirect('home');
                // } else{
                //     redirect("order/update/". $this->uri->segment(3));
                // }             
            } 
            else {                
                $this->session->set_flashdata('update_message_error', 'Failed!');                
                redirect("order/update/". $this->uri->segment(3));
            }
            
        }else{
            $this->update($this->uri->segment(3));
        } 
    }


    public function delete()
    {
        
        $data['order_number'] = $this->uri->segment(3);

        $result = $this->Order_Model->delete($data);

        if($result > 0) {

             redirect("order");
            // $this->index();
        } 
        else {
            
            $this->session->set_flashdata('delete_message_error', 'Failed!');
            // $this->index();
            redirect("order");
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
        $filter['value'] =  date("m/d/Y", $value);

        // echo $filter['value'];

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

    public function advanceFilter(){
        // echo "reached";


        $res['order_number'] = $this->input->post('file_number');
        $res['order_address'] = $this->input->post('file_prop');
        $res['order_client_id'] = $this->input->post('order_client');
        $res['order_city'] = $this->input->post('order_city');
        $res['order_borrower'] = $this->input->post('order_borrower');
        $res['order_appraiser_id'] = $this->input->post('order_appraiser');
        $res['order_zipcode'] = $this->input->post('order_zipcode');
        $res['order_appointmentdate'] = $this->input->post('order_appointmentdate');
        // $data['order_number'] = $this->input->post('order_number');

        $data['order_list'] = $this->Order_Model->advanceSearch($res);
        $data['client_list'] = $this->Client_Model->get(); 
        $data['city_list'] = $this->CitiesCountries_Model->getCity(); 
        $data['appraiser_list'] = $this->Appraiser_Model->get(); 

        // echo "<pre>";
        // print_r($res['order_appointmentdate']);



        $this->load->view('order-list', $data);

    }

    public function search(){

        // echo "Test";
        $data['order_list'] = $this->Order_Model->get(); 
        $data['client_list'] = $this->Client_Model->get(); 
        $data['city_list'] = $this->CitiesCountries_Model->getCity(); 
        $data['appraiser_list'] = $this->Appraiser_Model->get(); 
        $this->load->view('search', $data);


        // $this->load->view('search');
    }


    public function email_status($data){


		$this->load->library("Phpmailer_library");
        $mail = $this->phpmailer_library->load();
		try {
            //Recipients

            $st = $this->StatusInfo_Model->getById($data['order_status_id']);
            $app = $this->Appraiser_Model->getById($data['order_appraiser_id']);



            $to =  $this->config->item('from_email');
            // echo "<br><br> =========== ". $to;
			$mail->setFrom($to, 'Mams');
			$mail->addAddress($data['order_appraiser_email'], 'Mams');     //Add a recipient
		
			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Order ' . $data['order_number'] . ' status is updated';
			$mail->Body    = 'Hello ' . $app->app_name . '.<br>This is to inform you that the status of Order ' . $data['order_number'] . ' is updated to ' . $st->st_name;
		
			if(!$mail->send()){
				echo 'Mail could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			}else{
				echo 'Mail has been sent';
			}
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
    }

    public function email_attach($data){


		$this->load->library("Phpmailer_library");
        $mail = $this->phpmailer_library->load();
		try {
            //Recipients
            $app = $this->Appraiser_Model->getById($data['order_appraiser_id']);



            $to =  $this->config->item('from_email');
            // echo "<br><br> =========== ". $to;
			$mail->setFrom($to, 'Mams');
			$mail->addAddress($data['order_appraiser_email'], 'Mams');     //Add a recipient
		
			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'New Attachment is added in Order ' . $data['order_number'] ;
            $mail->Body    = 'Hello ' . $app->app_name . '.<br>This is to inform you that a new attachment is added in ' . $data['order_number'];
            		
			if(!$mail->send()){
				echo 'Mail could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			}else{
				echo 'Mail has been sent';
			}
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
    }
    
    public function email_create_order($data){


		$this->load->library("Phpmailer_library");
        $mail = $this->phpmailer_library->load();
		try {
            //Recipients

                $app = $this->Appraiser_Model->getById($data['order_appraiser_id']);


            $to =  $this->config->item('from_email');
            // echo "<br><br> =========== ". $to;
			$mail->setFrom($to, 'Mams');
			$mail->addAddress($data['order_appraiser_email'], 'Mams');     //Add a recipient
		
			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Order ' . $data['order_number'] . ' has been assigned to you';
			$mail->Body    = 'Hello ' . $app->app_name . '.<br>This is to inform you that the Order ' . $data['order_number'] . ' is assigned to you <br>Please acknowledge the order ASAP by changing the status to "Setting Appt". Please provide a status update within the next 24 hours.';
		
			if(!$mail->send()){
				echo 'Mail could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			}else{
				echo 'Mail has been sent';
			}
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}


}

?>