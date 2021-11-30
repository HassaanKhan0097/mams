
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderTypes extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('OrderTypes_Model');

        if(!$this->session->userdata('loggedUser')){
            redirect('Mams');
        }

    }

    public function index()
    {
        $data['order_types_list'] = $this->OrderTypes_Model->get(); 
        $this->load->view('ordertypes', $data);
    }



    public function create()
    {
        $this->form_validation->set_rules('order_name','order_name','required');

        if ($this->form_validation->run() == TRUE) {

            $data['order_name'] = $this->input->post('order_name');

            $result = $this->OrderTypes_Model->create($data);

            if($result > 0) {

                $this->session->set_flashdata('message_success', 'Entry Created Successfully!');
                redirect("ordertypes");

            } 
            else {
                
                $this->session->set_flashdata('message_error', 'Failed!');
                redirect("ordertypes");
            }
            
        } 
        else {
            $this->index();
        }

    }


    public function update()
    {
        $this->form_validation->set_rules('update_order_name','order_types','required');

        if ($this->form_validation->run() == TRUE) {

            $data['order_id'] = $this->uri->segment(3);
            $data['order_name'] = $this->input->post('update_order_name');

            $result = $this->OrderTypes_Model->update($data);

            if($result > 0) {

                redirect("ordertypes");

            } 
            else {
                
                $this->session->set_flashdata('update_message_error', 'Failed!');
                $this->index();
            }
            
        } 

    }



    public function delete()
    {


        $data['order_id'] = $this->uri->segment(3);
        $countOrder = $this->OrderTypes_Model->countOrder($data['order_id']);
              
        // echo $countOrder;
       if($countOrder == 0){
            $result = $this->OrderTypes_Model->delete($data);
            if($result > 0) {
                redirect("ordertypes");
            } 
            else {            
                $this->session->set_flashdata('message_error', 'Failed to delete!');
                redirect("ordertypes");
            }
       }else{
            $this->session->set_flashdata('message_error', 'This Order Type is Used in Order, Kindly delete that First!');        
            redirect("ordertypes");
       }
        


        // $data['order_id'] = $this->uri->segment(3);

        // $result = $this->OrderTypes_Model->delete($data);

        // if($result > 0) {

        //     redirect("ordertypes");

        // } 
        // else {
            
        //     $this->session->set_flashdata('delete_message_error', 'Failed!');
        //     $this->index();
        // }

    }

}

?>