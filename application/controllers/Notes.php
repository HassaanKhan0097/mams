
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notes extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Notes_Model');

        if(!$this->session->userdata('loggedUser')){
            redirect('Mams');
        }

    }

    public function index()
    {
        // echo "Reached3";
        // $data['order_types_list'] = $this->OrderTypes_Model->get(); 
        // $this->load->view('ordertypes', $data);
        // $this->Order->index();
        // $this->load->view('order');
        // redirect('order');
    }



    public function create($order_number)
    {
        $loggedUser = $this->session->userdata('loggedUser');
        $this->form_validation->set_rules('notes_txt','notes_txt','required');
        $this->form_validation->set_rules('notes_subject','notes_subject','required');

        if ($this->form_validation->run() == TRUE) {

            $data['order_id'] = $this->uri->segment(3);
            $data['user_id'] = $loggedUser['user_id'];        
            $data['subject'] = $this->input->post('notes_subject');
            $data['notes'] = $this->input->post('notes_txt');
            $data['date'] = date("Y/m/d") . " ".date("h:i:sa");
            $data['hide_client'] ="off";
            $data['hide_appraiser'] = "off";
            // if($this->input->post('notes_hide_cl') == "on"){
            //     $data['hide_client'] = "on";
            // }
            if($this->input->post('notes_hide_app') == "on"){
                $data['hide_appraiser'] = "on";
            }
            
            // echo "<pre>";
            // print_r($data);
            $result = $this->Notes_Model->create($data);

            if($result > 0) {

                $this->session->set_flashdata('message_success', 'Entry Created Successfully!');
                redirect("order/update/".$order_number);

            } 
            else {
                
                $this->session->set_flashdata('message_error', 'Failed!');
                redirect("order/update/".$order_number);
            }
            
        } 
        else {
            redirect("order/update/".$order_number);
        }

    }


    public function update($id)
    {
        $loggedUser = $this->session->userdata('loggedUser');
        $this->form_validation->set_rules('upd_notes_txt','upd_notes_txt','required');
        $this->form_validation->set_rules('upd_notes_subject','upd_notes_subject','required');

        if ($this->form_validation->run() == TRUE) {

            $data['notes_id'] = $this->uri->segment(3);
            // $data['order_id'] = $this->uri->segment(3);
            $data['user_id'] = $loggedUser['user_id'];        
            $data['subject'] = $this->input->post('upd_notes_subject');
            $data['notes'] = $this->input->post('upd_notes_txt');
            $data['date'] = date("Y/m/d") . " ".date("h:i:sa");
            $data['hide_client'] ="off";
            $data['hide_appraiser'] = "off";
            // if($this->input->post('upd_notes_hide_cl') == "on"){
            //     $data['hide_client'] = "on";
            // }
            if($this->input->post('upd_notes_hide_app') == "on"){
                $data['hide_appraiser'] = "on";
            }
            
            // echo "<pre>";
            // print_r($data);
            $result = $this->Notes_Model->update($data);

            if($result > 0) {

                $this->session->set_flashdata('message_success', 'Entry Updated Successfully!');
                redirect("order/update/".$this->input->post('upd_notes_order'));

            } 
            else {
                
                redirect("order/update/".$this->input->post('upd_notes_order'));
            }
            
            
        }else {
                
            redirect("order");
        } 

    }



    public function delete()
    {
        
        $data['notes_id'] = $this->uri->segment(3);

        $result = $this->Notes_Model->delete($data);

        if($result > 0) {

            redirect("order");

        } 
        else {
            
            $this->session->set_flashdata('delete_message_error', 'Failed!');
            redirect("order");
        }

    }

}

?>