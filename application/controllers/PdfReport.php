<?php 
      class PdfReport extends CI_Controller{
            function __construct() 
            { 
                  parent::__construct();
                  $this->load->library('Pdf');
            } 
            function index()
            {            
                  
            }

            function appraiserReport($id)
            {
                  $this->load->model('Appraiser_Model');
                  $data = $this->Appraiser_Model->getById($id);

                  $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
                  $pdf->SetPrintHeader(false);
                  $pdf->SetPrintFooter(false);

                  $pdf->SetTitle('Appraiser Report');
                  $pdf->SetHeaderMargin(30);
                  $pdf->SetTopMargin(20);
                  $pdf->setFooterMargin(20);
                  $pdf->SetAutoPageBreak(true);
                  $pdf->SetAuthor('Mams');
                  $pdf->SetSubject('Appraiser View');                 
                  $pdf->SetDisplayMode('real', 'default');

                  $pdf->AddPage();
                  // $subtable = '<table border="1" cellspacing="3" cellpadding="2     "><tr><td>a</td><td>b</td></tr><tr><td>c</td><td>d</td></tr></table>';
                  
                  $header = '
                  <span style="font-size: 20px; font-weight:bold; text-decoration: underline;">Marquee Properties</span> <br>
                  <span style="font-weight:bold; ">Real Estate Appraisers</span> <br>
                  <span style="font-size:10px; line-height:9px;">
                  5501 Merchants View Square,Suite 264 <br>
                  Haymarket, Virginia 20169 <br>
                  703-754-7945 <br>
                  703-753-4911 <br>
                  mrq@marqueeappraisal.com <br>
                  www.marqueerealestate.com<br>
                  </span>
                  ';

                  $leftCol = '
                        <table border="0" style="font-size:10px;">
                              <tr>
                                    <td width="60px">Name: </td>
                                    <td>'.$data->app_name.'</td>
                              </tr>
                              <tr>
                                    <td width="60px">Title: </td>
                                    <td>'.$data->app_title.'</td>
                              </tr>
                              <tr>
                                    <td width="60px">Phone: </td>
                                    <td>'.$data->app_phone.'</td>
                              </tr>
                              <tr>
                                    <td width="60px">Fax Number: </td>
                                    <td>'.$data->app_fax.'</td>
                              </tr>
                        </table>
                  ';

                  $rightCol = '
                        <table border="0" style="font-size:10px;">
                              <tr>
                                    <td width="80px">Email: </td>
                                    <td>'.$data->app_email.'</td>
                              </tr>
                              <tr>
                                    <td width="80px">License Number: </td>
                                    <td>'.$data->app_license.'</td>
                              </tr>
                              <tr>
                                    <td width="80px">Home Number: </td>
                                    <td>'.$data->app_home.'</td>
                              </tr>
                              <tr>
                                    <td width="80px">Pager: </td>
                                    <td>'.$data->app_pager.'</td>
                              </tr>
                        </table>
                  ';


                  $footer = '
                  <span style="font-size: 13px; font-weight:bold; ">Notes</span> <br>
                        <table>
                              <tr>
                                    <th>Dates</th>
                                    <th>Author</th>
                                    <th>Subject</th>
                              </tr>
                              <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                              </tr>
                        </table>

                  ';
                  
                  $html = '<table border="1" cellspacing="1.5">
                        <tr>
                        <td colspan="2" style="text-align: center;">
                        '.$header.'
                        </td>
                        </tr>

                        <tr>
                        <td colspan="2" style="text-align: center; height: 22px;"> <span style=" font-size: 15px; font-weight:bold;">
                        Appraiser Page 
                        </span></td>
                        </tr>

                        <tr>
                        <td>
                        '.$leftCol.'
                        </td>
                        <td>
                        '.$rightCol.'
                        </td>
                        </tr>


                        

                  </table>                 
                 ';


                  $pdf->writeHTML($html, true, false, true, false, '');
                  $pdf->Output('appraiser_'.$data->app_name.'.pdf', 'I');



            }

            
            function clientReport($id)
            {
                  $this->load->model('Client_Model');
                  $d = $this->Client_Model->getById($id);
                  $data = $d['0'];

                  $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
                  $pdf->SetPrintHeader(false);
                  $pdf->SetPrintFooter(false);

                  $pdf->SetTitle('Client Report');
                  $pdf->SetHeaderMargin(30);
                  $pdf->SetTopMargin(20);
                  $pdf->setFooterMargin(20);
                  $pdf->SetAutoPageBreak(true);
                  $pdf->SetAuthor('Mams');
                  $pdf->SetSubject('Client View');                 
                  $pdf->SetDisplayMode('real', 'default');

                  $pdf->AddPage();

                  
                  $header = '
                  <span style="font-size: 20px; font-weight:bold; text-decoration: underline;">Marquee Properties</span> <br>
                  <span style="font-weight:bold; ">Real Estate Appraisers</span> <br>
                  <span style="font-size:10px; line-height:9px;">
                  5501 Merchants View Square,Suite 264 <br>
                  Haymarket, Virginia 20169 <br>
                  703-754-7945 <br>
                  703-753-4911 <br>
                  mrq@marqueeappraisal.com <br>
                  www.marqueerealestate.com<br>
                  </span>
                  ';

                  $leftCol = '
                        <table border="0" style="font-size:10px;">
                              <tr>
                                    <td width="80px">Name: </td>
                                    <td>'.$data->cl_name.'</td>
                              </tr>
                              <tr>
                                    <td width="80px">City: </td>
                                    <td>'.$data->cl_city.'</td>
                              </tr>
                              <tr>
                                    <td width="80px">State: </td>
                                    <td>'.$data->cl_state.'</td>
                              </tr>
                              <tr>
                                    <td width="80px">Zip Code: </td>
                                    <td>'.$data->cl_zipcode.'</td>
                              </tr>
                              <tr>
                                    <td width="80px">Fax Number: </td>
                                    <td>'.$data->cl_fax.'</td>
                              </tr>
                              <tr>
                                    <td width="80px">AMC Name: </td>
                                    <td>'.$data->cl_amc_name.'</td>
                              </tr>
                              <tr>
                                    <td width="80px">AMC Website: </td>
                                    <td>'.$data->cl_amc_website.'</td>
                              </tr>
                              <tr>
                                    <td width="30%">Special Ins: </td>
                                    <td width="65%">'.$data->cl_ins.'</td>
                              </tr>
                        </table>
                  ';

                  $rightCol = '
                        <table border="0" style="font-size:10px;">
                              <tr>
                                    <td width="80px">Contact: </td>
                                    <td width="65%" >'.$data->cl_contact.'</td>
                              </tr>
                              <tr>
                                    <td width="80px">Address: </td>
                                    <td>'.$data->cl_address.'</td>
                              </tr>
                              <tr>
                                    <td width="80px">Address 2: </td>
                                    <td>'.$data->cl_address2.'</td>
                              </tr>
                              <tr>
                                    <td width="80px">Phone Number: </td>
                                    <td>'.$data->cl_phone.'</td>
                              </tr>
                               <tr>
                                    <td width="80px">Website: </td>
                                    <td width="65%">'.$data->cl_website.'</td>
                              </tr>
                               <tr>
                                    <td width="80px">Email: </td>
                                    <td width="65%">'.$data->cl_email.'</td>
                              </tr>
                               <tr>
                                    <td width="80px">Email 2: </td>
                                    <td width="65%">'.$data->cl_email2.'</td>
                              </tr>
                        </table>
                  ';


                  $footer = '
                  <span style="font-size: 13px; font-weight:bold; ">Notes</span> <br>
                        <table>
                              <tr>
                                    <th>Dates</th>
                                    <th>Author</th>
                                    <th>Subject</th>
                              </tr>
                              <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                              </tr>
                        </table>

                  ';
                  
                  $html = '<table border="1" cellspacing="1.5">
                        <tr>
                        <td colspan="2" style="text-align: center;">
                        '.$header.'
                        </td>
                        </tr>

                        <tr>
                        <td colspan="2" style="text-align: center; height: 22px;"> <span style=" font-size: 15px; font-weight:bold;">
                        Client Page 
                        </span></td>
                        </tr>

                        <tr>
                        <td>
                        '.$leftCol.'
                        </td>
                        <td>
                        '.$rightCol.'
                        </td>
                        </tr>
                  </table>                 
                 ';


                  $pdf->writeHTML($html, true, false, true, false, '');
                  $pdf->Output('appraiser_'.$data->cl_name.'.pdf', 'I');



            }

           
            function orderReport($id)
            {

                  $this->load->model('Order_Model');
                  // $this->load->model('Notes_Model');

        
                  $d = $this->Order_Model->getById($id);
                  $data = $d['0'];  
                  $notes = $this->Order_Model->getNotesById($id);


                  $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
                  $pdf->SetPrintHeader(false);
                  $pdf->SetPrintFooter(false);

                  $pdf->SetTitle('Order Report');
                  $pdf->SetHeaderMargin(30);
                  $pdf->SetTopMargin(20);
                  $pdf->setFooterMargin(20);
                  $pdf->SetAutoPageBreak(true);
                  $pdf->SetAuthor('Mams');
                  $pdf->SetSubject('Order View');                 
                  $pdf->SetDisplayMode('real', 'default');

                  $pdf->AddPage();

                  
                  $header = '
                  <span style="font-size: 20px; font-weight:bold; text-decoration: underline;">Marquee Properties</span> <br>
                  <span style="font-weight:bold; ">Real Estate Appraisers</span> <br>
                  <span style="font-size:10px; line-height:9px;">
                  5501 Merchants View Square,Suite 264 <br>
                  Haymarket, Virginia 20169 <br>
                  703-754-7945 <br>
                  703-753-4911 <br>
                  mrq@marqueeappraisal.com <br>
                  www.marqueerealestate.com<br>
                  </span>
                  ';

                  $appraiser = '
                        <table border="0" style="font-size:9px;">
                              <tr>
                                    <td width="50px">Appraiser:</td>
                                    <td width="100px">'.$data->app_name.'</td>
                              </tr>
                        </table>
                  ';
                  $leftCol = '
                        <style>
                              .leftTd { width: 30%; }
                              .rightTd { width: 65%; }
                        </style>
                        <table border="0" style="font-size:9px;">
                              <tr>
                                    <td class="leftTd">File Number: </td>
                                    <td class="rightTd">'.$data->order_number.'</td>
                              </tr>
                              <tr>
                                    <td class="leftTd">Property Address: </td>
                                    <td class="rightTd">'.$data->order_address.'</td>
                              </tr>
                               <tr>
                                    <td class="leftTd">Entry Contact: </td>
                                    <td class="rightTd">'.$data->order_entry.'</td>
                              </tr>
                              <tr>
                                    <td class="leftTd">Borrower: </td>
                                    <td class="rightTd">'.$data->order_borrower.'</td>
                              </tr>
                               <tr>
                                    <td class="leftTd">Co Borrower: </td>
                                    <td class="rightTd">'.$data->order_co_borrower.'</td>
                              </tr>
                               <tr>
                                    <td class="leftTd">Client: </td>
                                    <td class="rightTd">'.$data->cl_name.'</td>
                              </tr>
                               <tr>
                                    <td class="leftTd">Client Email: </td>
                                    <td class="rightTd">'.$data->cl_email.'</td>
                              </tr>
                              <tr>
                                    <td class="leftTd">Client Email 2: </td>
                                    <td class="rightTd">'.$data->cl_email2.'</td>
                              </tr>
                               <tr>
                                    <td class="leftTd">Client Address: </td>
                                    <td class="rightTd">'.$data->cl_address.'</td>
                              </tr>
                               <tr>
                                    <td class="leftTd">AMC Name: </td>
                                    <td class="rightTd">'.$data->cl_amc_name.'</td>
                              </tr>
                               <tr>
                                    <td class="leftTd">Purchase Price: </td>
                                    <td class="rightTd">'.$data->order_purchase.'</td>
                              </tr>
                               <tr>
                                    <td class="leftTd">Special Instruction: </td>
                                    <td class="rightTd">'.$data->order_instruction.'</td>
                              </tr>
                               
                        </table>
                  ';

                  

                  $rightCol = '
                        <table border="0" style="font-size:9px;">
                             
                               <tr>
                                    <td class="leftTd">FHA/VA Case No: </td>
                                    <td class="rightTd">'.$data->order_case_number.'</td>
                              </tr>
                               <tr>
                                    <td class="leftTd">Assignment Type: </td>
                                    <td class="rightTd">'.$data->at_name.'</td>
                              </tr>
                               <tr>
                                    <td class="leftTd">Order Type: </td>
                                    <td class="rightTd">'.$data->order_name.'</td>
                              </tr>
                              <tr>
                                    <td class="leftTd">Order Status: </td>
                                    <td class="rightTd">'.$data->st_name.'</td>
                              </tr>                              
                               <tr>
                                    <td class="leftTd">Payment Method: </td>
                                    <td class="rightTd">'.$data->order_paymentmethod.'</td>
                              </tr>
                              <tr>
                                    <td class="leftTd">Payment Amount: </td>
                                    <td class="rightTd">'.$data->order_revenue.'</td>
                              </tr>
                              <tr>
                                    <td class="leftTd">Appointment Date: </td>
                                    <td class="rightTd">'.$data->order_appointmentdate.'</td>
                              </tr>
                              <tr>
                                    <td class="leftTd">Appointment Time: </td>
                                    <td class="rightTd">'.$data->order_appointment_time.'</td>
                              </tr>
                              <tr>
                                    <td class="leftTd">Orde Date: </td>
                                    <td class="rightTd">'.$data->order_date.'</td>
                              </tr>
                               <tr>
                                    <td class="leftTd">Due Date: </td>
                                    <td class="rightTd">'.$data->order_duedate.'</td>
                              </tr>
                              <tr>
                                    <td class="leftTd">Complete Date: </td>
                                    <td class="rightTd">'.$data->order_completedate.'</td>
                              </tr>

                              
                              
                        </table>
                  ';
                  $notes_loop = "";
                  foreach($notes as $n){
                        $notes_loop .= '<tr>
                                    <td>'.$n->date.'</td>
                                    <td>'.$n->user_username.'</td>
                                    <td>'.$n->subject.'</td>
                                    <td>'.$n->notes.'</td>
                              </tr>
                              ';
                  }
                  

                  $notes = '
                  <span style="font-size: 11px; font-weight:bold; ">Notes</span> <br>
                        <table border="1" style="font-size:9px;">
                              <tr>
                                    <th width="20%">Date Time</th>
                                    <th width="10%">Author</th>
                                    <th width="15%">Subject</th>
                                    <th width="50%">Notes</th>
                              </tr>
                              '.$notes_loop.'
                        </table>
                        <br>

                  ';
                  
                  $html = '<table border="1" cellspacing="1.5">
                        <tr>
                        <td colspan="2" style="text-align: center;">
                        '.$header.'
                        </td>
                        </tr>

                        <tr>
                        <td colspan="2" style="text-align: center; height: 22px;"> <span style=" font-size: 15px; font-weight:bold;">
                        Appraisal Order
                        </span></td>
                        </tr>

                        <tr>
                        <td colspan="2" style="text-align: center; height: 22px;"> 
                        '.$appraiser.'
                        </td>
                        </tr>

                        <tr>
                        <td>
                        '.$leftCol.'
                        </td>
                        <td>
                        '.$rightCol.'
                        </td>
                        </tr>

                        <tr>
                        <td colspan="2">
                        '.$notes.'
                        </td>
                        </tr>
                  </table>                 
                 ';


                  $pdf->writeHTML($html, true, false, true, false, '');
                  $pdf->Output('order_'.$id.'.pdf', 'I');


            }
      }
?>