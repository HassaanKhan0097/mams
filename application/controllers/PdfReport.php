<?php 
      class PdfReport extends CI_Controller{
            function __construct() 
            { 
                  parent::__construct();
                  $this->load->library('Pdf');
                  $this->load->model('Report_Model');
                  $this->load->model('Client_Model');
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
                  www.marqueeappraisal.com<br>
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
                  www.marqueeappraisal.com<br>
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
                                    <td>'.$data->city_name.'</td>
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
                                    <td>'.$data->amc_name.'</td>
                              </tr>
                              <tr>
                                    <td width="80px">AMC Website: </td>
                                    <td>'.$data->amc_website.'</td>
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
                  www.marqueeappraisal.com<br>
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

                  // <tr>
                  //                   <td class="leftTd">Client Email: </td>
                  //                   <td class="rightTd">'.$data->cl_email.'</td>
                  //             </tr>
                  //             <tr>
                  //                   <td class="leftTd">Client Email 2: </td>
                  //                   <td class="rightTd">'.$data->cl_email2.'</td>
                  //             </tr>
                  // <tr>
                  //                   <td class="leftTd">Complete Date: </td>
                  //                   <td class="rightTd">'.$data->order_completedate.'</td>
                  //             </tr>
                  //             <tr>
                  //                   <td class="leftTd">Appointment Date: </td>
                  //                   <td class="rightTd">'.$data->order_appointmentdate.'</td>
                  //             </tr>
                  //             <tr>
                  //                   <td class="leftTd">Appointment Time: </td>
                  //                   <td class="rightTd">'.$data->order_appointment_time.'</td>
                  //             </tr>
                              //       <tr>
                              //       <td class="leftTd">Client Zip Code: </td>
                              //       <td class="rightTd">'.$data->cl_zipcode.'</td>
                              // </tr>  , '.$data->cl_state.'
                              
                        //       <tr>
                        //       <td class="leftTd">Order Status: </td>
                        //       <td class="rightTd">'.$data->st_name.'</td>
                        // </tr> 
                        // <tr>
                        //                               <td class="leftTd">Entry Contact: </td>
                        //                               <td class="rightTd">'.$data->order_entry.'</td>
                        //                         </tr>   

                  $leftCol = '
                        <style>
                              .leftTd { width: 35%; }
                              .rightTd { width: 62%; }
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
                                    <td class="leftTd">Property City, State: </td>
                                    <td class="rightTd">'.$data->cl_order_city. ' , '.$data->order_zipcode.'</td>
                              </tr>
                                                          
                               <tr>
                                    <td class="leftTd">Client: </td>
                                    <td class="rightTd">'.$data->cl_name.'</td>
                              </tr>                               
                               <tr>
                                    <td class="leftTd">Client Address: </td>
                                    <td class="rightTd">'.$data->cl_address.'</td>
                              </tr>
                               <tr>
                                    <td class="leftTd">Client City, State: </td>
                                    <td class="rightTd">'.$data->cl_city. ' , '.$data->cl_zipcode.'</td>
                              </tr>                              
                               <tr>
                                    <td class="leftTd">AMC Name: </td>
                                    <td class="rightTd">'.$data->amc_name.'</td>
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
                                    <td class="leftTd">Borrower: </td>
                                    <td class="rightTd">'.$data->order_borrower.'</td>
                              </tr>
                               <tr>
                                    <td class="leftTd">Co Borrower: </td>
                                    <td class="rightTd">'.$data->order_co_borrower.'</td>
                              </tr>
                               <tr>
                                    <td class="leftTd">Assignment Type: </td>
                                    <td class="rightTd">'.$data->at_name.'</td>
                              </tr>
                               <tr>
                                    <td class="leftTd">Assignment Add-on: </td>
                                    <td class="rightTd">'.$data->ao_name .'</td>
                              </tr> 
                               <tr>
                                    <td class="leftTd">Order Type: </td>
                                    <td class="rightTd">'.$data->order_name.'</td>
                              </tr>
                               <tr>
                                    <td class="leftTd">Loan Type: </td>
                                    <td class="rightTd">'.$data->loan_name .'</td>
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
                                    <td class="leftTd">Orde Date: </td>
                                    <td class="rightTd">'.date("m/d/Y",strtotime($data->order_date)).'</td>
                              </tr>
                               <tr>
                                    <td class="leftTd">Due Date: </td>
                                    <td class="rightTd">'.$data->order_duedate.'</td>
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
                        <table border="1" style="font-size:9px;" cellpadding="3px">
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

                 ob_end_clean();
                  $pdf->writeHTML($html, true, false, true, false, '');
                  $pdf->Output('order_'.$id.'.pdf', 'I');


            }

            function accountingStatement2($id){



                  $data = $this->Report_Model->accountingStatement($id);
                  $client = $this->Client_Model->getById($id);

                  echo "<pre>";
                  print_r($client);
                  echo $id;
                  $totalR = $t0 = $t30 = $t60 = $t90 = 0;
                  foreach($data as $d){

                        $totalR += $d->order_revenue;
                        $date1 = $d->order_duedate;
                        $date2 = date('Y/m/d');
                        $diff = strtotime($date2) - strtotime($date1);
                        $days= abs(round($diff / 86400));

                        $totalOwed =  $count0 = $count30 = $count60 = $count90 = 0;
                        $countTotal = 1;
                        if($days >= 0 && $days <= 29){$count0=1; $t0 += $d->order_revenue; } 
                        else if($days >= 30 && $days <= 59){$count30=1; $t30 += $d->order_revenue; } 
                        else if($days >= 60 && $days <= 89){$count60=1; $t60 += $d->order_revenue; } 
                        else if($days >= 90 ){$count90=1; $t90 += $d->order_revenue;}


                        echo "Order_number: " . $d->order_number . "<br>";
                        echo "Order Date: " . date('m/d/Y',strtotime($d->order_date))  . "<br>";
                        echo "Billed Date: " . $d->order_duedate . "<br>";
                        echo "Property address: " . $d->order_address . "<br>";
                        echo "City: " . $d->city_name . "<br>";
                        echo "zipcode: " . $d->order_zipcode . "<br>";
                        echo "Borrower: " . $d->order_borrower . "<br>";
                        echo "Cost: " . $d->order_revenue . "<br>";
                        echo "Age: " . $days . "<br>";
                        echo "=======<br>";
                  }

                  echo "<br>===========<br>";
                  echo "totalR: " . $totalR . "<br>";
                  echo "t0: " . $t0 . "<br>";
                  echo "t30: " . $t30 . "<br>";
                  echo "t60: " . $t60 . "<br>";
                  echo "t90: " . $t90 . "<br>";

            }

            function accountingStatement($id){

                  $data = $this->Report_Model->accountingStatement($id); 
                  
                  $cl = $this->Client_Model->getById($id);
                  $client = $cl[0];
                  // $data = $d['0'];
                  
                  $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
                  $pdf->SetPrintHeader(false);
                  $pdf->SetPrintFooter(false);

                  $pdf->SetTitle('Accounting Statement');
                  $pdf->SetHeaderMargin(30);
                  $pdf->SetTopMargin(20);
                  $pdf->setFooterMargin(20);
                  $pdf->SetAutoPageBreak(true);
                  $pdf->SetAuthor('Mams');
                  $pdf->SetSubject('Accounting Statement');                 
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
                  www.marqueeappraisal.com<br>
                  </span>
                  ';

                  // <style>

                        // #tableMain tr th, #tableMain tr td{
                        //       padding: 5px;
                        // }
                        // </style>
                  $tableMain = '
                        
                        
                        <table border="1" style="font-size:9px;" cellpadding="3" width="98%">
                        <tr style="font-weight: bold !important;">
                              <th style="width: 13%">Order Number</th>
                              <th style="width: 10%">Order Date</th>
                              <th style="width: 10%">Bill Date</th>
                              <th style="width: 10%">Address</th>
                              <th style="width: 10%">City</th>
                              <th style="width: 10%">Zip Code</th>
                              <th style="width: 10%">Borrower</th>
                              <th style="width: 10%">Revenue</th>
                              <th style="width: 10%">Appraiser</th>
                              <th style="width: 7%">Days</th>
                        </tr>';
                        $totalR = $t0 = $t30 = $t60 = $t90 = 0;

                        foreach($data as $d){
                              $totalR += $d->order_revenue;
                              $date1 = $d->order_duedate;
                              $date2 = date('Y/m/d');
                              $diff = strtotime($date2) - strtotime($date1);
                              $days= abs(round($diff / 86400));
      
                              $totalOwed =  $count0 = $count30 = $count60 = $count90 = 0;
                              $countTotal = 1;
                              if($days >= 0 && $days <= 29){$count0=1; $t0 += $d->order_revenue; } 
                              else if($days >= 30 && $days <= 59){$count30=1; $t30 += $d->order_revenue; } 
                              else if($days >= 60 && $days <= 89){$count60=1; $t60 += $d->order_revenue; } 
                              else if($days >= 90 ){$count90=1; $t90 += $d->order_revenue;}

                              $tableMain .= '<tr>
                                    <td>'. $d->order_number .'</td>
                                    <td>'. date('m/d/Y',strtotime($d->order_date)) .'</td>
                                    <td>'. $d->order_duedate .'</td>
                                    <td>'. $d->order_address .'</td>
                                    <td>'. $d->city_name .'</td>
                                    <td>'. $d->order_zipcode .'</td>
                                    <td>'. $d->order_borrower .'</td>
                                    <td>'. $d->order_revenue .'</td>
                                    <td>'. $d->app_name .'</td>
                                    <td>'. $days .'</td>

                              </tr>';

                        }

                        
                  $tableMain .= '</table>';



                  $tableFooter = '

                        <table border="1" style="font-size:9px;" cellpadding="3" width="98%">
                              <tr style="font-weight: bold !important;">
                                    <th width="25%">Statment Total</th>
                                    <th width="12.5%">0-30 Days</th>
                                    <th width="12.5%">30-60 Days</th>
                                    <th width="12.5%">60-90 Days</th>
                                    <th width="12.5%">90+ Days</th>
                                    <th width="25%">Time of Print</th>
                              </tr>

                              <tr>
                                    <td>$'.$totalR.'</td>
                                    <td>$'.$t0.'</td>
                                    <td>$'.$t30.'</td>
                                    <td>$'.$t60.'</td>
                                    <td>$'.$t90.'</td>
                                    <td>'.date("Y/m/d, g:i a")  .'</td>
                                    

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
                        Statement
                        </span></td>
                        </tr>

                        <tr>
                        <td colspan="2" style="font-size:11px; height: 22px;"> 
                              <table>
                                    <tr>
                                    <td><b>'.$client->cl_name.'</b></td>                                    
                                    </tr>
                                    <tr>
                                    <td>'.$client->cl_address.'</td>                                    
                                    </tr>
                                    <tr>
                                    <td>'.$client->city_name.', '.$client->cl_zipcode.'</td>                                    
                                    </tr>
                              
                              </table>
                        </td>
                        </tr>

                        <tr>
                        <td colspan="2"><br><br>
                        '.$tableMain.'                       
                        <br> </td>
                        </tr>

                        <tr>
                        <td colspan="2"><br><br>
                              '.$tableFooter.'

                        <br></td>
                        </tr>
                  </table>                 
                 ';

                 ob_end_clean();
                  $pdf->writeHTML($html, true, false, true, false, '');
                  $pdf->Output('acc_statement_'.$id.'.pdf', 'I');

            }

            function singleInvoice2($id){
                  $data = $this->Report_Model->singleInvoice($id);
                  echo "<pre>";
                  print_r($data);
                  echo $id;
            }
            function singleInvoice($id){

                  

                  $d = $this->Report_Model->singleInvoice($id);

                  $data = $d[0];

                  // echo "<pre>";
                  // print_r($d);
                  // echo $id;

                  // $data = $this->Report_Model->accountingStatement($id); 
                  $cl = $this->Client_Model->getById($id);
                  $client = $cl[0];
                  // $data = $d['0'];
                  
                  $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
                  $pdf->SetPrintHeader(false);
                  $pdf->SetPrintFooter(false);

                  $pdf->SetTitle('Accounting Statement');
                  $pdf->SetHeaderMargin(30);
                  $pdf->SetTopMargin(20);
                  $pdf->setFooterMargin(20);
                  $pdf->SetAutoPageBreak(true);
                  $pdf->SetAuthor('Mams');
                  $pdf->SetSubject('Accounting Statement');                 
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
                  www.marqueeappraisal.com<br>
                  </span>
                  ';

                  //  <tr>
                  //                   <td class="leftTd">Property City, State: </td>
                  //                   <td class="rightTd">'.$data->city_name. ' , '.$data->order_zipcode.'</td>
                  //             </tr>


                  $leftCol = '
                        <style>
                              .leftTd { width: 35%; }
                              .rightTd { width: 62%; }
                        </style>
                        <table border="0" style="font-size:9px;">
                             
                              <tr>
                                    <td class="leftTd">Address: </td>
                                    <td class="rightTd">'.$data->order_address.'</td>
                              </tr>
                             
                            

                               <tr>
                                    <td class="leftTd">Borrower:  </td>
                                    <td class="rightTd">'.$data->order_borrower.'</td>
                              </tr>
                                                          
                               <tr>
                                    <td class="leftTd">File Number: </td>
                                    <td class="rightTd">'.$data->order_number.'</td>
                              </tr>                               
                               
                               
                        </table>
                  ';

                  $paid = "Unpaid";
                  if(strlen($data->order_v_client)>0) {
                        $paid =  "Paid";
                  }
                  $rightCol = '
                        <table border="0" style="font-size:9px;">
                             
                               <tr>
                                    <td class="leftTd">Assignment Type: </td>
                                    <td class="rightTd">'.$data->at_name.'</td>
                              </tr>
                              <tr>
                                    <td class="leftTd">Order Type: </td>
                                    <td class="rightTd">'.$data->order_name.'</td>
                              </tr>
                               <tr>
                                    <td class="leftTd">Payment Method: </td>
                                    <td class="rightTd">'.$data->order_paymentmethod.'</td>
                              </tr>
                               <tr>
                                    <td class="leftTd">Appointment Date: </td>
                                    <td class="rightTd">'.$data->order_appointmentdate.'</td>
                              </tr>
                               <tr>
                                    <td class="leftTd">Appointment Time: </td>
                                    <td class="rightTd">'.$data->order_appointment_time .'</td>
                              </tr> 
                               <tr>
                                    <td class="leftTd">Complete Date: </td>
                                    <td class="rightTd">'.$data->order_completedate.'</td>
                              </tr>
                               <tr>
                                    <td class="leftTd">Order Status: </td>
                                    <td class="rightTd">'.$data->st_name .'</td>
                              </tr>                               
                               <tr>
                                    <td class="leftTd">Payment Status: </td>
                                    <td class="rightTd">'.$paid .'</td>
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
                        INVOICE
                        </span></td>
                        </tr>

                        <tr>
                        <td colspan="2" style="font-size:11px; height: 22px;"> 
                              <table>
                                    <tr>
                                    <td><b>'.$data->cl_name.'</b></td>                                    
                                    </tr>
                                    <tr>
                                    <td>'.$data->cl_address.'</td>                                    
                                    </tr>
                                    <tr>
                                    <td>'.$data->cl_city.', '.$data->cl_zipcode.'</td>                                    
                                    </tr>
                              
                              </table>
                        </td>
                        </tr>

                        <tr>
                        <td><br><br>
                        '.$leftCol.'
                        </td>
                        <td>
                        '.$rightCol.'
                        </td>
                        </tr>

                        <tr>
                        <td colspan="2"><br><br>
                              Amount Owned: $'.$data->order_revenue.'

                        <br></td>
                        </tr>
                  </table>                 
                 ';

                 ob_end_clean();
                  $pdf->writeHTML($html, true, false, true, false, '');
                  $pdf->Output('acc_statement_'.$id.'.pdf', 'I');

            }


            
      }
?>