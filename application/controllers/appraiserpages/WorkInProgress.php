<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WorkInProgress extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('appraiser/Work_Model');
        $this->load->model('appraiser/Log_Model');
        $this->load->model('Client_Model');
       $this->load->model('StatusInfo_Model');
       $this->load->model('Notes_Model');
       

    }

    public function index()
    {

        $loggedUser = $this->session->userdata('loggedUser');
        
        $data['order_list'] = $this->Work_Model->getWork($loggedUser['user_app']);
        
        
        // echo "<pre>";
        // print_r($data['order_list']);
       $this->load->view('appraiser/workinprogress', $data);
    }
    public function view($order_number){

        //  echo "<pre>";
        // print_r($order_number);

        $data['o_single'] = $this->Log_Model->getByOrderNumber($order_number);
        $data['order_single'] = $data['o_single'][0];    

        // $data['city_list'] = $this->CitiesCountries_Model->getCity(); 
        // $data['country_list'] = $this->CitiesCountries_Model->getCountry(); 
        // $data['appraiser_list'] = $this->Appraiser_Model->get(); 
        // $data['client_list'] = $this->Client_Model->get(); 
        // $data['order_types_list'] = $this->OrderTypes_Model->get(); 
        $data['status_info_list'] = $this->StatusInfo_Model->get(); 
        $data['client_list'] = $this->Client_Model->get();
        // $data['assignment_types_list'] = $this->AssTypes_Model->get();
        // $data['previous_order_numbers'] = $this->Order_Model->getOrderNumbers();
        
        // echo "<pre>";
        // print_r($data['order_single']);
        // print_r($data['cl_single']);
        // print_r($data['city_list']);
        // print_r($data['country_list']);
        $data['loggedUser'] = $this->session->userdata('loggedUser');
        $data['notes'] = $this->Notes_Model->getById($order_number);
        // echo "Start<br>";
        
        //         echo $data['loggedUser'];
                

        $this->load->view('appraiser/workinprogress-view', $data);

    }

    public function update($order_number){
        // echo "Reached";
        //  echo "<pre>";
        // print_r($order_number);
        $data['order_number'] =  $order_number;
        $data['order_status_id'] = $this->input->post('order_status_id');
        $data['order_action'] = $this->input->post('order_action');
        $data['order_date'] = date( "Y/m/d", strtotime($this->input->post('order_date')) );
        $data['order_duedate'] = date( "Y/m/d", strtotime($this->input->post('order_duedate')) );
        $data['order_appointmentdate'] = date( "Y/m/d", strtotime($this->input->post('order_appointmentdate')) );
        $data['order_appointment_time'] = $this->input->post('order_appointment_time');
        $data['order_purchase'] = $this->input->post('order_purchase');
        $data['order_expense'] = $this->input->post('order_expense');
        $data['order_instruction'] = $this->input->post('order_instruction');



        $filenames = [];
            $fn = array ();
            $arr = [ "Contract","Option Sheets","Comparable Info","Plat","Plans/Specs","Condo Questionnaire","ADU Letter","Photo","Client Instructions" ];
            $orderfile_input = ["of_contract","of_option","of_comparable","of_plat","of_plan","of_condo","of_adu","of_photo","of_client"];
            $fileStr = [11,9,13,7,7,8,5,8,9];
            $fCount = 0;
            $old = $this->input->post('upd_old_file');
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
                    }
                    unset($this->upload);
                }//for loop

               
                
            }
            // ForEach End

            // echo "Reached Foreach end<br>";



            $tmpArr = array();
   
            foreach ($fn as $sub) {
            $tmpArr[] = implode(',',$sub);
            }
            $result = implode('|',$tmpArr);
           
            $data['order_file']  =    $result;

            $od = $this->input->post('upd_old_delete_file');

            if($od != ""){

                define('EXT', '.'.pathinfo(__FILE__, PATHINFO_EXTENSION));
                define('PUBPATH',str_replace(SELF,'',FCPATH)); // added

                $path3= "uploads/orders/" . $order_number;
                
                if(strpos($od,",")){
                    $tmparr[] = explode(",", $od);

                    foreach($tmparr[0] as $t){                      
                        $str = $t;

                        $str= str_replace(" ","_",$str);
                        $filestring = PUBPATH.$path3 . "/".  $str;
                        unlink($filestring);                        
                    }
                }else{
                    $od = str_replace(" ","_",$od);
                    $filestring = PUBPATH.$path3 . "/".  $od;
                    unlink($filestring);    
                }                
            }


        $result = $this->Work_Model->update($data);

            if($result > 0) {
                // $this->index();
                redirect("appraiser/workinprogress");

            } 
            else {
                
                $this->session->set_flashdata('update_message_error', 'Failed!');
                // $this->index();
                redirect("appraiser/workinprogress");
            }

    }

    



    public function createCountry()
    {
        $this->form_validation->set_rules('country_name','country_name','required');

        if ($this->form_validation->run() == TRUE) {

            $data['country_name'] = $this->input->post('country_name');

            $result = $this->CitiesCountries_Model->createCountry($data);

            if($result > 0) {

                $this->session->set_flashdata('message_success_country', 'Entry Created Successfully!');
                redirect("citiescountries");

            } 
            else {
                
                $this->session->set_flashdata('message_error_country', 'Failed!');
                redirect("citiescountries");
            }
            
        } 
        else {
            $this->index();
        }

    }


    public function updateCountry()
    {
        $this->form_validation->set_rules('upd_country_name','upd_country_name','required');

        if ($this->form_validation->run() == TRUE) {

            $data['country_id'] = $this->uri->segment(3);
            $data['country_name'] = $this->input->post('upd_country_name');

            $result = $this->CitiesCountries_Model->updateCountry($data);

            if($result > 0) {

                redirect("citiescountries");

            } 
            else {
                
                $this->session->set_flashdata('update_message_error', 'Failed!');
                $this->index();
            }
            
        } 

    }



    public function deleteCountry()
    {
        
        $data['country_id'] = $this->uri->segment(3);

        $result = $this->CitiesCountries_Model->deleteCountry($data);

        if($result > 0) {

            redirect("citiescountries");

        } 
        else {
            
            $this->session->set_flashdata('delete_message_error', 'Failed!');
            $this->index();
        }

    }



    public function createCity()
    {
        $this->form_validation->set_rules('city_name','city_name','required');

        if ($this->form_validation->run() == TRUE) {

            $data['city_name'] = $this->input->post('city_name');
            $data['city_country_id'] = $this->input->post('city_country_id');

            $result = $this->CitiesCountries_Model->createCity($data);

            if($result > 0) {

                $this->session->set_flashdata('message_success_city', 'Entry Created Successfully!');
                redirect("citiescountries");

            } 
            else {
                
                $this->session->set_flashdata('message_error_city', 'Failed!');
                redirect("citiescountries");
            }
            
        } 
        else {
            $this->index();
        }

    }


    public function updateCity()
    {
        $this->form_validation->set_rules('upd_city_name','upd_city_name','required');

        if ($this->form_validation->run() == TRUE) {

            $data['city_id'] = $this->uri->segment(3);
            $data['city_country_id'] = $this->input->post('upd_city_country_id');
            $data['city_name'] = $this->input->post('upd_city_name');

            $result = $this->CitiesCountries_Model->updateCity($data);

            if($result > 0) {

                redirect("citiescountries");

            } 
            else {
                
                $this->session->set_flashdata('update_message_error', 'Failed!');
                $this->index();
            }
            
        } else{
            $this->session->set_flashdata('update_message_error', 'Failed!');
                $this->index();
        }

    }



    public function deleteCity()
    {
        
        $data['city_id'] = $this->uri->segment(3);

        $result = $this->CitiesCountries_Model->deleteCity($data);

        if($result > 0) {

            redirect("citiescountries");

        } 
        else {
            
            $this->session->set_flashdata('delete_message_error', 'Failed!');
            $this->index();
        }

    }

}

?>