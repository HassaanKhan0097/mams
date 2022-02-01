<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('appraiser/Work_Model');
    }
	
	public function index()
	{
        // $this->load->view('appraiser/index');
        $loggedUser = $this->session->userdata('loggedUser');
        
        $data['order_list'] = $this->Work_Model->getWork($loggedUser['user_app']);
        
       $this->load->view('appraiser/workinprogress', $data);
    }
    
    public function logout(){
        $this->session->unset_userdata('loggedUser');
        redirect('');
    }
}
