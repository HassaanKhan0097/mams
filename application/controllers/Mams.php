<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mams extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Users_Model');

    }
	
	public function index()
	{
//  $this->session->unset_userdata('loggedUser');
		$loggedUser = $this->session->userdata('loggedUser');

		//var_dump($loggedUser);
        
		if(!$loggedUser) {
			$this->signin();
		} 
		else {
            $role = $loggedUser['user_role'];
            date_default_timezone_set("America/Rio_Branco");
            $loggedUser['user_lastlogin'] = $_SERVER['REMOTE_ADDR'];
            // $loggedUser['user_logintime'] = $_SERVER['REMOTE_HOST'];

            // $loggedUser['user_lastlogin'] = '10.20.30.40';
            $loggedUser['user_logintime'] = date("m/d/Y") . " ".date("h:i:sa");
            
            
            $result = $this->Users_Model->updateLogin($loggedUser);
    
    		if($role == 'manager') {
    			redirect("home");
    		} 
    		else if($role == 'appraiser') {
    			redirect("appraiserpages");
    		}
    		else if($role == 'owner') {
                redirect("home");
    			// redirect("ownerpages");
    		}
		}


	}


	public function signin()
	{
		$this->load->view('signin');
	}


	public function signin_submit()
    {
        $this->form_validation->set_rules('user_username','Username','required');
        $this->form_validation->set_rules('user_pass','Password', 'required');

        if ($this->form_validation->run() == TRUE) {

            $data['user_username'] = $this->input->post('user_username');
            $data['user_pass'] = $this->input->post('user_pass');

            $result = $this->Users_Model->login($data);

			//var_dump($result);

            if(!is_array($result)){
                $this->session->set_flashdata('message_error', $result);
                redirect('signin');
            } else {
                //assign returned data from model to session
                $this->session->set_userdata('loggedUser', $result);
                $this->index();
            }
            
        } 
        else {
            $this->index();
        }

    }

	public function signout(){
        $this->session->unset_userdata('loggedUser');
        redirect('');
    }
}
