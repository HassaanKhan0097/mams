<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('Overview_Model');
    }
	
	public function index()
	{
        //retrieve overview data here
        $data['by_appraiser'] = $this->Overview_Model->getByAppraiser(); //only appraiserid1
        $data['by_client'] = $this->Overview_Model->getByClient(); //only clientid1
        $data['by_status'] = $this->Overview_Model->getByStatus();
        $data['by_due_date'] = $this->Overview_Model->getByDueDate();
        $data['by_action_required'] = $this->Overview_Model->getByActionRequired();
        // var_dump($data['by_action_required']);
        
        $this->load->view('index', $data);
	}
}
