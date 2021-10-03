<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->model('Client_Model');
        $this->load->model('CitiesCountries_Model');

    }

    public function index()
    {
        $data['client_list'] = $this->Client_Model->get(); 
        $this->load->view('client-list', $data);
    }

    public function create()
    {

        $data['city_list'] = $this->CitiesCountries_Model->getCity(); 
        $data['country_list'] = $this->CitiesCountries_Model->getCountry(); 
       
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
            $data['cl_contact'] = $this->input->post('cl_contact');
            $data['cl_address'] = $this->input->post('cl_address');
            $data['cl_address2'] = $this->input->post('cl_address2');
            // $data['cl_country_id'] = $this->input->post('cl_country');
            $data['cl_city'] = $this->input->post('cl_city');
            $data['cl_state'] = $this->input->post('cl_state');
            $data['cl_zipcode'] = $this->input->post('cl_zipcode');
            $data['cl_phone'] = $this->input->post('cl_phone');
            $data['cl_amc'] = $this->input->post('cl_amc');
            $data['cl_amc_name'] = $this->input->post('cl_amc_name');
            $data['cl_amc_website'] = $this->input->post('cl_amc_website');   
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

            // Count total files
            $countfiles = count($_FILES['cl_file']['name']);
 
            // Looping all files
            for($i=0;$i<$countfiles;$i++) {

                // Define new $_FILES array - $_FILES['file']
                $_FILES['file']['name'] = $_FILES['cl_file']['name'][$i];
                $_FILES['file']['type'] = $_FILES['cl_file']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['cl_file']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['cl_file']['error'][$i];
                $_FILES['file']['size'] = $_FILES['cl_file']['size'][$i];


                $config['upload_path']          = './uploads/clients/';
                $config['allowed_types']        = '*';
                $config['max_size']             = 10024; // 10mb you can set the value you want
                $config['max_width']            = 6000; // 6000px you can set the value you want
                $config['max_height']           = 6000; // 6000px
                $new_name = $data['cl_name'].$i;
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


            $data['cl_file']  = serialize($filenames);

            // echo "<pre>";
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
        // $data['city_list'] = $this->CitiesCountries_Model->getCity(); 
        // $data['country_list'] = $this->CitiesCountries_Model->getCountry(); 

        $data['client_single'] = $data['cl_single'][0];    
        
        // echo "<pre>";
        // print_r( unserialize($data['client_single']->cl_file));

        $this->load->view('client-edit', $data);
    }

    public function update_client(){
        $this->form_validation->set_rules('upd_cl_name','upd_cl_name','required');
        $this->form_validation->set_rules('upd_cl_contact','upd_cl_contact','required');
        $this->form_validation->set_rules('upd_cl_address','upd_cl_address','required');
        $this->form_validation->set_rules('upd_cl_phone','upd_cl_phone','required');

        if ($this->form_validation->run() == TRUE) {
            $data['cl_id'] = $this->uri->segment(3);

            $data['cl_name'] = $this->input->post('upd_cl_name');
            $data['cl_contact'] = $this->input->post('upd_cl_contact');
            $data['cl_address'] = $this->input->post('upd_cl_address');
            $data['cl_address2'] = $this->input->post('upd_cl_address2');
            // $data['cl_country_id'] = $this->input->post('upd_cl_country');
            $data['cl_city'] = $this->input->post('upd_cl_city');
            $data['cl_state'] = $this->input->post('upd_cl_state');
            $data['cl_zipcode'] = $this->input->post('upd_cl_zipcode');
            $data['cl_phone'] = $this->input->post('upd_cl_phone');
            $data['cl_amc'] = $this->input->post('upd_cl_amc');
            $data['cl_amc_name'] = $this->input->post('upd_cl_amc_name');
            $data['cl_amc_website'] = $this->input->post('upd_cl_amc_website');
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

        $result = $this->Client_Model->delete($data);

        if($result > 0) {

             redirect("clients");
            // $this->index();
        } 
        else {
            
            $this->session->set_flashdata('delete_message_error', 'Failed!');
            // $this->index();
            redirect("clients");
        }

    }


    // public function edit($id)
    // {
    //     $this->load->view('client-edit');
    // }

}

?>