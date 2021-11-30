<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        if(!$this->session->userdata('loggedUser')){
            redirect('Mams');
        }

        $this->load->model('Client_Model');
        $this->load->model('CitiesCountries_Model');
        $this->load->model('Amc_Model');

    }

    public function index()
    {
        $data['client_list'] = $this->Client_Model->get();
        $this->load->view('client-list', $data);
    }

    public function create()
    {

        $data['city_list'] = $this->CitiesCountries_Model->getCity(); 
        // $data['country_list'] = $this->CitiesCountries_Model->getCountry(); 
        $data['amc_list'] = $this->Amc_Model->get(); 
        $this->load->view('client-create', $data);
    }

    public function create_client()
    {
        $this->form_validation->set_rules('cl_name','cl_name','required');
        // $this->form_validation->set_rules('cl_contact','cl_contact','required');
        $this->form_validation->set_rules('cl_address','cl_address','required');
        // $this->form_validation->set_rules('cl_phone','cl_phone','required');
   

        if ($this->form_validation->run() == TRUE) {

            $data['cl_name'] = $this->input->post('cl_name');
            $data['cl_folder_name'] = $this->input->post('cl_name');
            
            $data['cl_contact'] = $this->input->post('cl_contact');
            $data['cl_address'] = $this->input->post('cl_address');
            $data['cl_address2'] = $this->input->post('cl_address2');
            // $data['cl_country_id'] = $this->input->post('cl_country');
            $data['cl_city'] = $this->input->post('cl_city');
            // $data['cl_state'] = $this->input->post('cl_state');
            $data['cl_zipcode'] = $this->input->post('cl_zipcode');
            $data['cl_phone'] = $this->input->post('cl_phone');
            // $data['cl_amc'] = $this->input->post('cl_amc');
            $data['cl_amc_id'] = $this->input->post('cl_amc_id');
            // $data['cl_amc_website'] = $this->input->post('cl_amc_website');   
            $data['cl_fax'] = $this->input->post('cl_fax');
            $data['cl_type'] = $this->input->post('cl_type');
            $data['cl_email'] = $this->input->post('cl_email');
            $data['cl_email2'] = $this->input->post('cl_email2');
            $data['cl_website'] = $this->input->post('cl_website');
            $data['cl_ins'] = $this->input->post('cl_ins');
            $data['cl_active'] = $this->input->post('cl_active');
            if( $data['cl_active'] == 'on'){
                $data['cl_active'] = 'checked';
            }else{
                $data['cl_active'] = '';
            }

            $filenames = [];
            $fn = array ();

            // Count total files
            $countfiles = count($_FILES['cl_file']['name']);
            
            $path = './uploads/clients/' . $data['cl_name'];
            if(!is_dir($path)){
                mkdir($path);
            }
            // Looping all files
            for($i=0;$i<$countfiles;$i++) {

                // Define new $_FILES array - $_FILES['file']
                $_FILES['file']['name'] = $_FILES['cl_file']['name'][$i];
                $_FILES['file']['type'] = $_FILES['cl_file']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['cl_file']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['cl_file']['error'][$i];
                $_FILES['file']['size'] = $_FILES['cl_file']['size'][$i];


                $config['upload_path']          = $path ;
                $config['allowed_types']        = '*';
                $config['max_size']             = 10024; // 10mb you can set the value you want
                $config['max_width']            = 6000; // 6000px you can set the value you want
                $config['max_height']           = 6000; // 6000px
                // $new_name = $data['cl_name'].$i;
                
                $new_name = $_FILES['cl_file']['name'][$i];
                $new_name = str_replace(" ","_",$new_name);
                // str_replace("world","Peter","Hello world!");
                $config['file_name'] = $new_name;

                array_push($fn,$new_name);

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
                        // $filenames[] = $uploadedData['upload_data']['file_name'];

                        // echo "<pre>";
                        // print_r($filenames);

                }

                unset($this->upload);

            }


            // $data['cl_file']  = serialize($filenames);
            $data['cl_file'] =  implode(',',$fn);
            // echo "<pre>-------------";
            // print_r($data['cl_file']);




            $result = $this->Client_Model->create($data);

            if($result > 0) {

                $this->session->set_flashdata('message_success', 'Entry Created Successfully!');
                redirect("clients/create");
            } 
            else {                
                $this->session->set_flashdata('message_error', 'Failed!');
                redirect("clients/create");
            }
            
                        
        } 
        else {
            $this->create();
        }       
    }


    function fileUploadAsync(){ 
        // redirect("functioncalled");
        if ( ! empty($_FILES)) 
        {
            $config["upload_path"]   = "./uploads/clients/";
            $config["allowed_types"] = "*";

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload("file") ) {
                echo "failed to upload file(s)";
                // redirect("file upload failed");
            }
            // redirect("uploaded");
        }
    }

    public function update($id)
    {
        $data['cl_single'] = $this->Client_Model->getById($id);
        $data['city_list'] = $this->CitiesCountries_Model->getCity(); 
        // $data['country_list'] = $this->CitiesCountries_Model->getCountry(); 

        $data['client_single'] = $data['cl_single'][0];    
        $data['amc_list'] = $this->Amc_Model->get();
        // echo "<pre>";
        // print_r( $data['client_single']);

        // echo "<aaaaaaaaaaaaaaaaaaaaaaaaaa<pre>";
        // print_r( $data['amc_list']);

       $this->load->view('client-edit', $data);
    }

    public function update_client(){
        $this->form_validation->set_rules('upd_cl_name','upd_cl_name','required');
        // $this->form_validation->set_rules('upd_cl_contact','upd_cl_contact','required');
        // $this->form_validation->set_rules('upd_cl_address','upd_cl_address','required');
        // $this->form_validation->set_rules('upd_cl_phone','upd_cl_phone','required');
// echo "Reached";
        if ($this->form_validation->run() == TRUE) {
            $data['cl_id'] = $this->uri->segment(3);
            // echo "Reached 2";
            $data['cl_name'] = $this->input->post('upd_cl_name');
            $data['cl_contact'] = $this->input->post('upd_cl_contact');
            $data['cl_address'] = $this->input->post('upd_cl_address');
            $data['cl_address2'] = $this->input->post('upd_cl_address2');
            // $data['cl_country_id'] = $this->input->post('upd_cl_country');
            $data['cl_city'] = $this->input->post('upd_cl_city');
            // $data['cl_state'] = $this->input->post('upd_cl_state');
            $data['cl_zipcode'] = $this->input->post('upd_cl_zipcode');
            $data['cl_phone'] = $this->input->post('upd_cl_phone');
            // $data['cl_amc'] = $this->input->post('upd_cl_amc');
            $data['cl_amc_id'] = $this->input->post('upd_cl_amc_id');
            // $data['cl_amc_website'] = $this->input->post('upd_cl_amc_website');
            $data['cl_fax'] = $this->input->post('upd_cl_fax');
            $data['cl_type'] = $this->input->post('upd_cl_type');
            $data['cl_email'] = $this->input->post('upd_cl_email');
            $data['cl_email2'] = $this->input->post('upd_cl_email2');
            $data['cl_website'] = $this->input->post('upd_cl_website');
            $data['cl_ins'] = $this->input->post('upd_cl_ins');
            $data['cl_active'] = $this->input->post('upd_cl_active');
            if( $data['cl_active'] == 'on'){
                $data['cl_active'] = 'checked';
            }else{
                $data['cl_active'] = '';
            }

            $old_file = $this->input->post('upd_old_file');

            $filenames = [];
            $fn = array ();

            // Count total files 
            $countfiles = count($_FILES['cl_file']['name']);
            // $this->config->item()$this->config->item('foo');
            $path2 = $this->config->item('base_url') . 'uploads/clients/' . $this->input->post('upd_fl_name');
            $path =  './uploads/clients/' . $this->input->post('upd_fl_name');
            echo "<br><br>";
            echo $path;
            // if(!is_dir($path)){
            //     mkdir($path);
            // }
            // Looping all files
            for($i=0;$i<$countfiles;$i++) {

                // Define new $_FILES array - $_FILES['file']
                $_FILES['file']['name'] = $_FILES['cl_file']['name'][$i];
                $_FILES['file']['type'] = $_FILES['cl_file']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['cl_file']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['cl_file']['error'][$i];
                $_FILES['file']['size'] = $_FILES['cl_file']['size'][$i];


                $config['upload_path']          = $path ;
                $config['allowed_types']        = '*';
                $config['max_size']             = 10024; // 10mb you can set the value you want
                $config['max_width']            = 6000; // 6000px you can set the value you want
                $config['max_height']           = 6000; // 6000px
                // $new_name = $data['cl_name'].$i;
                
                $new_name = $_FILES['cl_file']['name'][$i];
                $config['file_name'] = $new_name;

                array_push($fn,$_FILES['cl_file']['name'][$i]);

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        echo "<pre>error";
                        print_r($error);
                }
                else
                {
                        $uploadedData = array('upload_data' => $this->upload->data());
                        // echo "<pre>else";
                        // print_r($uploadedData);
                }

                unset($this->upload);

            }


            // $data['cl_file']  = serialize($filenames);
            // $tmp = "";
            
                $tmp = implode(',',$fn);
            
            
            if($old_file != ""){
                if($tmp != ""){
                    $tmp = $old_file . "," . $tmp;
                }else{
                    $tmp = $old_file;
                }
               
            }
            
            $data['cl_file'] =  $tmp;
            echo "tmp ===<br>"; 
            echo "<pre>";
            print_r($tmp);
            echo "<br><br>"; 
            echo "<br><br>"; 
            $od = $this->input->post('upd_old_delete_file');
            echo "<br>od=== $od <br>";
            if($od != ""){

                define('EXT', '.'.pathinfo(__FILE__, PATHINFO_EXTENSION));
                define('PUBPATH',str_replace(SELF,'',FCPATH)); // added

                $path3= "uploads/clients/" . $this->input->post('upd_fl_name');
                if(strpos($od,",")){
                    $tmparr[] = explode(",", $od);
                    echo "<br><br>"; 
                    echo "<pre>";
                    print_r($tmparr);
                    echo "<br><br>"; 
                    foreach($tmparr[0] as $t){                      
                        $str = $t;

 echo "<br>str=== $str <br>"; 
                        $str= str_replace(" ","_",$str);
                        $filestring = PUBPATH.$path3 . "/".  $str;

                        unlink($filestring);   
                        echo "<br>if=== $filestring <br>";                     
                    }
                }else{
                    $od = str_replace(" ","_",$od);
                    $filestring = PUBPATH.$path3 . "/".  $od;
                    unlink($filestring);    


                    echo "<br>else=== $filestring <br>";
                }                
            }

            $result = $this->Client_Model->update($data);

            if($result > 0) {
                // $this->index();
                redirect("clients");

            } 
            else {
                
                $this->session->set_flashdata('update_message_error', 'Failed!');
                // $this->index();
                redirect("clients");
            }
            
        }else{

        } 
    }

    public function delete()
    {
        
        $data['cl_id'] = $this->uri->segment(3);
        $countOrder = $this->Client_Model->countOrder($data['cl_id']);
              
        // echo $countOrder;
       if($countOrder == 0){
            $result = $this->Client_Model->delete($data);
            if($result > 0) {
                redirect("clients");
            } 
            else {            
                $this->session->set_flashdata('update_message_error', 'Failed to delete!');
                redirect("clients/update/".$data['cl_id']);
            }
       }else{
            $this->session->set_flashdata('update_message_error', 'This Client is Used in Order, Kindly delete that First!');        
            redirect("clients/update/".$data['cl_id']);
       }



        // $data['cl_id'] = $this->uri->segment(3);
        // $result = $this->Client_Model->delete($data);




        // if($result > 0) {
        //      redirect("clients");            
        // } 
        // else {            
        //     $this->session->set_flashdata('delete_message_error', 'Failed!');            
        //     redirect("clients");
        // }

    }


    // public function edit($id)
    // {
    //     $this->load->view('client-edit');
    // }

}

?>