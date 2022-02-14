
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
        $notes_location ="";
        $notes_location = $this->input->post('notes_location'); 
        if ($this->form_validation->run() == TRUE) {

            $data['order_id'] = $this->uri->segment(3);
            $data['user_id'] = $loggedUser['user_id'];        
            $data['subject'] = $this->input->post('notes_subject');
            $email = $this->input->post('notes_email');
            $data['notes'] = $this->input->post('notes_txt');
            date_default_timezone_set("America/Rio_Branco");

            $data['date'] = date("m/d/Y") . " ".date("h:i:sa");
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

            if($data['hide_appraiser'] != "on"){
                $this->email_notes($data,$email);
            }
            

            if($result > 0) {

                $this->session->set_flashdata('message_success', 'Entry Created Successfully!');
                // redirect("order/update/".$order_number);
                redirect($notes_location);

            } 
            else {
                
                $this->session->set_flashdata('message_error', 'Failed!');
                // redirect("order/update/".$order_number);
                redirect($notes_location);
            }
            
        } 
        else {
            // redirect("order/update/".$order_number);
            redirect($notes_location);
        }

    }


    public function update($id)
    {
        $loggedUser = $this->session->userdata('loggedUser');
        $this->form_validation->set_rules('upd_notes_txt','upd_notes_txt','required');
        $this->form_validation->set_rules('upd_notes_subject','upd_notes_subject','required');

        $notes_location = $this->input->post('upd_notes_location'); 
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
                redirect($notes_location);
                // redirect("order/update/".$this->input->post('upd_notes_order'));

            } 
            else {
                redirect($notes_location);
                // redirect("order/update/".$this->input->post('upd_notes_order'));
            }
            
            
        }else {
            redirect($notes_location);
            // redirect("order");
        } 

    }



    public function delete()
    {
        
        $data['notes_id'] = $this->uri->segment(3);
        $notes_location = $this->input->post('del_notes_location'); 
        $result = $this->Notes_Model->delete($data);

        if($result > 0) {

            redirect($notes_location);
            // redirect("order");

        } 
        else {
            
            $this->session->set_flashdata('delete_message_error', 'Failed!');
            redirect($notes_location);
            // redirect("order");
        }

    }


    public function email_notes($data, $email){


		$this->load->library("Phpmailer_library");
        $mail = $this->phpmailer_library->load();
		try {
            //Recipients

            // $app = $this->Appraiser_Model->getById($data['order_appraiser_id']);


            $to =  $this->config->item('from_email');
            // echo "<br><br> =========== ". $to;
			$mail->setFrom($to, 'Mams');
			$mail->addAddress($email, 'Mams');     //Add a recipient
		
			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'New Note is added in Order ' . $data['order_id'] . '';
			$mail->Body    = 'This is to inform you that a new note is added in Order ' . $data['order_id'] ;
		
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