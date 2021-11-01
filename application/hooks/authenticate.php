<?php
defined('BASEPATH') OR exit('No direct script access allowed');  
class ss extends CI_Controller
{
    function check_user_login()
    {

        $this->load->library('session');
        // $ci =& get_instance();

        $loggedUser = $this->session->userdata('loggedUser');
        if(!$loggedUser){
            redirect('Mams');
        //    echo "If1111";// redirect('pag/index');    
        }else{
            // echo "else2222";
            //redirect('signin');
        }
    }
}
?>