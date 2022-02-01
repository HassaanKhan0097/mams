<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once dirname(__FILE__) . '/phpmailer/src/PHPMailer.php';
class PhpMailer
{
    function __construct()
    {
        //parent::__construct();
    }
    public function load(){
        $objMail = new PHPMailer;
        return $objMail;
    } 
}
/*Author:Tutsway.com */  
/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */

?>