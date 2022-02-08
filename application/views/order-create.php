<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>New Order</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font/simple-line-icons/css/simple-line-icons.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/dropzone.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/bootstrap.rtl.only.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/select2.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/select2-bootstrap.min.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/component-custom-switch.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css" />
</head>

<body id="app-container" class="menu-default show-spinner">


    <!-- Header -->

    <?php include_once('header.php'); ?>

    <!-- Header End -->


    <!-- Sidebar -->

    <?php include_once('sidebar.php'); ?>

    <!-- Sidebar End -->



    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>New Order</h1>
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">

                <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4">Previous Order numbers used:</h5>

                            <div class="dropdown d-inline-block">
                                <button class="btn btn-outline-primary dropdown-toggle mb-1" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Order Number
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                <?php
                                $numItems = count($previous_order_numbers);
                                $i = 0; $lastOrder="";$lastOrder2="12";
                                        foreach($previous_order_numbers as $pon) { ?>

                                            <a class="dropdown-item" href="#"><?php echo $pon->order_number; ?></a>
                                            
                                            <?php

                                            if(++$i === $numItems) {
                                                $lastOrder = $pon->order_number;
                                            }

                                         } ?>
                                        


                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- File number Dropdown -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4">New Order</h5>

                            <?php
                                if( $this->session->flashdata('message_success') ) { ?>

                                    <div class="col-12 mt-4">
                                        <div class="alert alert-success" role="alert">
                                            <?php echo $this->session->flashdata('message_success'); ?>
                                        </div>
                                    </div>
                                    
                                <?php }
                                ?>

                                <?php
                                if( $this->session->flashdata('message_error') ) { ?>

                                    <div class="col-12 mt-4">
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $this->session->flashdata('message_error'); ?>
                                        </div>
                                    </div>
                                    
                                <?php }
                                ?>

                                
                            <form action="<?php echo base_url(); ?>order/create_order" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="req_field">Order Number*</label>
                                        <input type="text" class="form-control" name="order_number" placeholder="Enter Order Numbers"  value="<?php if(isset($order_number)) echo $order_number;?>" required> 
                                        <span class="helper-text"><?php echo form_error('order_number'); ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label>Loan Number</label>
                                        <input type="number" class="form-control" name="order_loan_number" placeholder="Enter Loan Number" value="<?php if(isset($order_loan_number)) echo $order_loan_number;?>">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>FHA/VA Case #</label>
                                        <input type="text" class="form-control" name="order_case_number" placeholder="Enter FHA VA Case" value="<?php if(isset($order_case_number)) echo $order_case_number;?>">
                                    </div>

                                    <div class="form-group">
                                        <label class="req_field">Lender Name*</label>
                                        <select class="form-control select2-single" onchange="lenderChange()" data-width="100%" name="order_client_id"  required>
                                            <option value=""></option>
                                            <?php
                                            foreach($client_list as $cl){
                                            ?>                                            
                                            <option 
                                            data-amc-id="<?php echo $cl->cl_amc_id ?>" 
                                            data-amc-name="<?php echo $cl->amc_name ?>" 
                                            data-folder-name="<?php echo $cl->cl_folder_name ?>"
                                            data-website="<?php echo $cl->cl_website ?>" 
                                            data-phone="<?php echo $cl->cl_phone ?>" 
                                            data-email="<?php echo $cl->cl_email ?>" 
                                            data-ins="<?php echo $cl->cl_ins ?>" 
                                            data-file="<?php echo $cl->cl_file ?>" 
                                            value="<?php echo $cl->cl_id ?>"
                                            <?php if(isset($order_client_id)) {echo ( intval($order_client_id)  == intval($cl->cl_id)) ?  'Selected' :  '';}?>
                                            ><?php echo $cl->cl_name ?></option>
                                            <?php } ?>
                                        </select>       
                                        <span class="helper-text"><?php echo form_error('order_client_id'); ?></span>                                   
                                    </div>
                                    
                                    <div class="form-group" style="display:none;">
                                        
                                        <input type="text" class="form-control" name="order_cl_ins" value="<?php if(isset($order_cl_ins)) echo $order_cl_ins;?>">
                                                                   
                                    </div>
                                    <div class="form-group" id="lenderInfo">

                                    <p><b>AMC Name</b>: -- </p>
                                    <p><b>Website</b>: -- </p>
                                    <p><b>Email</b>: --</p>
                                    <p><b>Special Ins</b>: -- </p>       
                                    <p><b>Files</b>: --</p><br>                             
                                    </div>
                                    <!-- <p><b>Files</b>: <span id="file"></span> --</p><br> -->
                                    <!-- <?php echo ( $app->app_name  == 'Unassigned') ?  'Selected' :  ''; ?> -->
                                    <div class="form-group">
                                        <label class="req_field">Appraiser Name* </label>
                                        <select class="form-control select2-single" data-width="100%" onchange="appraiserChange()" name="order_appraiser_id" required>
                                            <option value=""></option>
                                            <?php
                                            foreach($appraiser_list as $app){
                                            ?>                                            
                                            <option data-email="<?php echo $app->app_email ?>" value="<?php echo $app->app_id ?>"  <?php if(isset($order_appraiser_id)) {if ( intval($order_appraiser_id)  == intval($app->app_id)){  echo 'Selected' ;} else if( $app->app_name  == 'Unassigned') {  echo 'Selected';}}?> ><?php echo $app->app_name ?></option>
                                            <?php } ?>
                                            
                                        </select>        
                                        <span class="helper-text"><?php echo form_error('order_appraiser_id'); ?></span>                                
                                    </div>

                                    <div class="form-group" style="display:none;">
                                        <label>Appraiser Email</label>
                                        <input type="text" class="form-control" name="order_appraiser_email" placeholder="Enter Email" readonly >
                                    </div>

                                    <div class="form-group">
                                        <label>Expense</label>
                                        <input type="text" class="form-control" name="order_expense" placeholder="Enter Expense" value="<?php if(isset($order_expense)) echo $order_expense;?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Sub Appraiser Name</label>
                                        <select class="form-control select2-single" data-width="100%" name="order_appraiser_id2">
                                            <option value=""></option>
                                            <?php
                                            foreach($appraiser_list as $app){
                                            ?>                                            
                                            <option value="<?php echo $app->app_id ?>" <?php if(isset($order_appraiser_id2)) {echo ( intval($order_appraiser_id2)  == intval($app->app_id)) ?  'Selected' :  '';}?>><?php echo $app->app_name ?></option>
                                            <?php } ?>
                                        </select>                                    
                                    </div>

                                    <div class="form-group">
                                        <label>Sub Appraiser Expense</label>
                                        <input type="text" class="form-control" name="order_sub_app_expense" placeholder="Enter Expense" value="<?php if(isset($order_sub_app_expense)) echo $order_sub_app_expense;?>">
                                    </div>

                                    <div class="form-group">
                                        <label class="req_field">Revenue*</label>
                                        <input type="text" class="form-control" name="order_revenue" placeholder="Enter Revenue" value="<?php if(isset($order_revenue)) echo $order_revenue;?>" required>
                                        <span class="helper-text"><?php echo form_error('order_revenue'); ?></span>
                                    </div>

                                    
                                    
                              

                                                
                                    
                                </div>
                                <!-- 1st Column ...... col-sm-4 -->

                                <div class="col-sm-4">

                                    <div class="form-group">
                                        <label class="req_field">Property Address*</label>
                                        <input type="text" class="form-control" name="order_address" placeholder="Enter Property Address" value="<?php if(isset($order_address)) echo $order_address;?>" required >
                                        <span class="helper-text"><?php echo form_error('order_address'); ?></span> 
                                    </div>

                                    <div class="form-group">
                                        <label class="req_field">City, State*</label>
                                        <select class="form-control select2-single" data-width="100%" name="order_city" required>

                                        <option value=""></option>
                                        <?php
                                            foreach ($city_list as $city) { ?> 
                                            <option value="<?php echo $city->city_id; ?>" <?php if(isset($order_city)) {echo ( intval($order_city)  == intval($city->city_id)) ?  'Selected' :  '';}?>><?php echo $city->city_name; ?></option>
                                        <?php } ?>
                                        </select> 
                                        <span class="helper-text"><?php echo form_error('order_city'); ?></span>   
                                    </div>

                                    <div class="form-group">
                                        <label class="req_field">Zip Code*</label>
                                        <input type="number" class="form-control" name="order_zipcode" placeholder="Enter Zip Code" value="<?php if(isset($order_zipcode)) echo $order_zipcode;?>" required >
                                        <span class="helper-text"><?php echo form_error('order_zipcode'); ?></span>    
                                    </div>
                                
                                    <div class="form-group">
                                        <label class="req_field">Borrower*</label>
                                        <input type="text" class="form-control" name="order_borrower" placeholder="Enter Borrower" value="<?php if(isset($order_borrower)) echo $order_borrower;?>" required>
                                        <span class="helper-text"><?php echo form_error('order_borrower'); ?></span> 
                                    </div>
                                
                                    <div class="form-group">
                                        <label>Co Borrower</label>
                                        <input type="text" class="form-control" name="order_co_borrower" placeholder="Enter Co Borrower" value="<?php if(isset($order_co_borrower)) echo $order_co_borrower;?>">
                                    </div>

                                    <div class="form-group">
                                        <label class="req_field">Entry Contact*</label>
                                        <input type="text" class="form-control" name="order_entry" placeholder="Enter Entry Contact" value="<?php if(isset($order_entry)) echo $order_entry;?>" required>
                                        <span class="helper-text"><?php echo form_error('order_entry'); ?></span>
                                    </div>


                                    <div class="form-group">
                                        <label>Borrower Phone</label>
                                        <input type="text" class="form-control" name="order_borrower_phone1" placeholder="Enter Phone 1" value="<?php if(isset($order_borrower_phone1)) echo $order_borrower_phone1;?>">
                                    </div>
                             
                                    <div class="form-group">
                                        <label>Contact Phone 1</label>
                                        <input type="text" class="form-control" name="order_borrower_phone2" placeholder="Contact Phone 1" value="<?php if(isset($order_borrower_phone2)) echo $order_borrower_phone2;?>">
                                    </div>
                            
                                    <div class="form-group">
                                        <label>Contact Phone 2</label>
                                        <input type="text" class="form-control" name="order_borrower_phone3" placeholder="Contact Phone 2" value="<?php if(isset($order_borrower_phone3)) echo $order_borrower_phone3;?>">
                                    </div>


                                    <div class="form-group">
                                        <label>Contact Email</label>
                                        <input type="text" class="form-control" name="order_borrower_email" placeholder="Enter Email" value="<?php if(isset($order_borrower_email)) echo $order_borrower_email;?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Email 2</label>
                                        <input type="text" class="form-control" name="order_borrower_email2" placeholder="Enter Email 2" value="<?php if(isset($order_borrower_email2)) echo $order_borrower_email2;?>">
                                    </div>

                                    <div class="form-group">
                                    <label class="req_field">Payment Method*</label>
                                    <select class="form-control select2-single" data-width="100%" name="order_paymentmethod" required>
                                        <option value=""></option>
                                        <option value="Bill Client" <?php if(isset($order_paymentmethod)) {echo ( $order_paymentmethod  == "Bill Client") ?  'Selected' :  '';}?>>Bill Client</option>
                                        <option value="Credit Card" <?php if(isset($order_paymentmethod)) {echo ( $order_paymentmethod  == "Credit Card") ?  'Selected' :  '';}?>>Credit Card</option>
                                        <option value="COD" <?php if(isset($order_paymentmethod)) {echo ( $order_paymentmethod  == "COD") ?  'Selected' :  '';}?>>COD</option>
                                    </select>                       
                                    <span class="helper-text"><?php echo form_error('order_paymentmethod'); ?></span>       
                                </div>
                                <div class="form-group">
                                        <label>Purchase Price</label>
                                        <input type="text" class="form-control" name="order_purchase" placeholder="Enter Purchase Price" value="<?php if(isset($order_purchase)) echo $order_purchase;?>">
                                    </div>

                                    

                                    
                               

                                    
                                   
                                
                          




                                </div>
                                <!-- 2nd Column ...... col-sm-4 -->

                                <div class="col-sm-4">

                                    <div class="form-group">
                                        <label class="req_field">Order Type*</label>
                                        <select class="form-control select2-single" data-width="100%" name="order_type_id" required>
                                            <option value=""></option>
                                            <?php
                                            foreach($order_types_list as $ol){
                                            ?>                                            
                                            <option value="<?php echo $ol->order_id ?>" <?php if(isset($order_type_id)) {echo ( intval($order_type_id)  == intval($ol->order_id)) ?  'Selected' :  '';}?>><?php echo $ol->order_name ?></option>
                                            <?php } ?>
                                        </select>                 
                                        <span class="helper-text"><?php echo form_error('order_type_id'); ?></span>                   
                                    </div>


                                    <div class="form-group">
                                        <label class="req_field">Loan Type*</label>
                                        <select class="form-control select2-single" data-width="100%" name="order_loan_type" required>
                                            <option value=""></option>
                                            <?php
                                            foreach($loan_types_list as $lt){
                                            ?>                                            
                                            <option data-desc="<?php echo $lt->loan_desc ?>" value="<?php echo $lt->loan_id . "|" . $lt->loan_name . "|" . $lt->loan_desc ?> " <?php if(isset($order_loan_type)) {echo ( intval($order_loan_type)  == intval($lt->loan_id)) ?  'Selected' :  '';}?>><?php echo $lt->loan_name ?></option>
                                            <?php } ?>
                                        </select>                 
                                        <span class="helper-text"><?php echo form_error('order_loan_type'); ?></span>                   
                                    </div>
                                   
                                    <div class="form-group">
                                        <label class="req_field">Assignment Type*</label>
                                        <select class="form-control select2-single" data-width="100%" name="order_assignment_id" required>
                                            <option value=""></option>
                                            <?php
                                            foreach($assignment_types_list as $at){
                                            ?>                                            
                                            <option value="<?php echo $at->at_id ?>" <?php if(isset($order_assignment_id)) {echo ( intval($order_assignment_id)  == intval($at->at_id)) ?  'Selected' :  '';}?>><?php echo $at->at_name ?></option>
                                            <?php } ?>
                                            
                                        </select>       
                                        <span class="helper-text"><?php echo form_error('order_assignment_id'); ?></span>                             
                                    </div>

                                    <div class="form-group">
                                        <label>Assignment Add-Ons</label>
                                        <select class="form-control select2-single" data-width="100%" name="order_assignment_addon" >
                                            <option value=""></option>
                                            <?php
                                            $assAdd = ["Rent Comparable Schedule", "Operating Income Statement", "REO Addendum", "ADU"];
                                            foreach($assAdd as $aa){
                                            ?>                                            
                                            <option value="<?php echo $aa ?>" <?php if(isset($order_assignment_addon)) {echo ( intval($order_assignment_addon)  == intval($aa)) ?  'Selected' :  '';}?>><?php echo $aa ?></option>
                                            <?php } ?>
                                        </select>                 
                                        <span class="helper-text"><?php echo form_error('order_loan_type'); ?></span>                   
                                    </div>

                                    <div class="form-group action_input">
                                        <label>Action </label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="order_action"
                                                class="custom-control-input" value="No" checked>
                                            <label class="custom-control-label" for="customRadio1">No</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="order_action"
                                                class="custom-control-input" value="Yes" >
                                            <label class="custom-control-label" for="customRadio2">Yes</label>
                                        </div>                                        
                                    </div>
                                    <!-- <?php echo ( $status->st_name  == 'Assigned') ?  'selected' :  ''; ?> -->
                                    <div class="form-group">
                                        <label class="req_field">Order Status*</label>
                                        <select class="form-control select2-single" data-width="100%" name="order_status_id" required>
                                            <option value=""></option>
                                            <?php
                                            foreach($status_info_list as $status){
                                            ?>                                            
                                            <option value="<?php echo $status->st_id ?>" <?php if(isset($order_status_id)) {if ( intval($order_status_id)  == intval($status->st_id)){  echo 'Selected' ;} } else if( $status->st_name  == 'Assigned') {  echo 'Selected';}?>><?php echo $status->st_name ?></option>
                                            <?php } ?>
                                        </select>  
                                        <span class="helper-text"><?php echo form_error('order_status_id'); ?></span>                                  
                                    </div>
                                  
                                    <div class="form-group">
                                        <label class="req_field">Order Date*</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" name="order_date"  value="<?php if(isset($order_date)){ echo $order_date;} else {echo date( "m/d/Y"); }?>" required>
                                            <span class="input-group-text input-group-append input-group-addon">
                                                <i class="simple-icon-calendar"></i>
                                            </span>
                                            <span class="helper-text"><?php echo form_error('order_date'); ?></span>    
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="req_field">Due Date*</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" name="order_duedate" value="<?php if(isset($order_duedate)){ echo $order_duedate;}?>" required>
                                            <span class="input-group-text input-group-append input-group-addon">
                                                <i class="simple-icon-calendar"></i>
                                            </span>
                                            <span class="helper-text"><?php echo form_error('order_duedate'); ?></span>    
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Appointment Date</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" name="order_appointmentdate"  value="<?php if(isset($order_appointmentdate)){ echo $order_appointmentdate;}?>">
                                            <span class="input-group-text input-group-append input-group-addon">
                                                <i class="simple-icon-calendar"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                <label>Appointment Time</label>
                                    <div id="select-container">
                                        <select class="form-control select2-single"  id="select-test" data-width="100%" name="order_appointment_time">
                                        <option value="--">--</option>
                                        <optgroup label="9am-11pm">
                                            <option value="9:00am">9:00 am</option>
                                            <option value="9:15am">9:15 am</option>
                                            <option value="9:30am">9:30 am</option>
                                            <option value="9:45am">9:45 am</option>
                                            <option value="10:00am">10:00 am</option>
                                            <option value="10:15am">10:15 am</option>
                                            <option value="10:30am">10:30 am</option>
                                            <option value="10:45am">10:45 am</option>
                                        </optgroup>
                                        <optgroup label="11am-1pm">
                                            <option value="11:00am">11:00 am</option>
                                            <option value="11:15am">11:15 am</option>
                                            <option value="11:30am">11:30 am</option>
                                            <option value="11:45am">11:45 am</option>
                                            <option value="12:00am">12:00 am</option>
                                            <option value="12:15am">12:15 am</option>
                                            <option value="12:30am">12:30 am</option>
                                            <option value="12:45am">12:45 am</option>
                                        </optgroup>
                                        <optgroup label="1pm-3pm">
                                            <option value="1:00pm">1:00 pm</option>
                                            <option value="1:15pm">1:15 pm</option>
                                            <option value="1:30pm">1:30 pm</option>
                                            <option value="1:45pm">1:45 pm</option>
                                            <option value="2:00pm">2:00 pm</option>
                                            <option value="2:15pm">2:15 pm</option>
                                            <option value="2:30pm">2:30 pm</option>
                                            <option value="2:45pm">2:45 pm</option>
                                        </optgroup>
                                        <optgroup label="3pm-5pm">
                                            <option value="3:00pm">3:00 pm</option>
                                            <option value="3:15pm">3:15 pm</option>
                                            <option value="3:30pm">3:30 pm</option>
                                            <option value="3:45pm">3:45 pm</option>
                                            <option value="4:00pm">4:00 pm</option>
                                            <option value="4:15pm">4:15 pm</option>
                                            <option value="4:30pm">4:30 pm</option>
                                            <option value="4:45pm">4:45 pm</option>
                                        </optgroup>
                                        <optgroup label="5pm-7pm">
                                            <option value="5:00pm">5:00 pm</option>
                                            <option value="5:15pm">5:15 pm</option>
                                            <option value="5:30pm">5:30 pm</option>
                                            <option value="5:45pm">5:45 pm</option>
                                            <option value="6:00pm">6:00 pm</option>
                                            <option value="6:15pm">6:15 pm</option>
                                            <option value="6:30pm">6:30 pm</option>
                                            <option value="6:45pm">6:45 pm</option>
                                            <option value="7:00pm">7:00 pm</option>
                                        </optgroup>
                                       
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Complete Date</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" name="order_completedate" value="<?php if(isset($order_completedate)){ echo $order_completedate;}?>">
                                        <span class="input-group-text input-group-append input-group-addon">
                                            <i class="simple-icon-calendar"></i>
                                        </span>
                                    </div>
                                </div>

                                

                                    



                                </div>
                                <!-- 3rd Column ...... col-sm-4 -->

                    
                                


                                   
                                
                               

                           


                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Special instructions</label>
                                        <textarea  class="form-control" name="order_instruction" placeholder="Enter Special Instruction" rows="2" cols="50"><?php if(isset($order_instruction)){ echo $order_instruction;}?></textarea>                                    
                                    </div>
                                </div>

                                <div class="col-sm-12 mb-4">
                                    
                                <h5 class="mb-4">Attach File</h5>


<div class="col-sm-4">
    <div class="form-group">
    Select Category                                                     
        <select class="form-control select2-single" data-width="100%" name="file_cat" onchange="file_change()" >
            <option value=""></option>
            <?php

            $arr = [ "Contract","Option Sheets","Comparable Info","Plat","Plans/Specs","Condo Questionnaire","ADU Letter","Photo","Client Instructions" ];
       
            foreach($arr as $a){
            ?>                                            
            <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
            <?php } ?>
        </select>                                             </div>
</div>
               
          <div id="f_contract" style="display:none;"> Contract:  <input type="file" name="of_contract[]"  multiple ></div>
          <div id="f_option" style="display:none;">  Option Sheets: <input type="file" name="of_option[]"  multiple  ></div>
          <div id="f_comparable" style="display:none;">  Comparable Info: <input type="file" name="of_comparable[]" multiple ></div>
          <div  id="f_plat" style="display:none;">  Plat: <input type="file" name="of_plat[]" multiple ></div>
          <div id="f_plan" style="display:none;">  Plans/Specs: <input type="file" name="of_plan[]" multiple ></div>
          <div id="f_condo" style="display:none;">  Condo Questionnaire: <input type="file" name="of_condo[]"  multiple ></div>
          <div id="f_adu" style="display:none;"> ADU  Letter: <input type="file" name="of_adu[]" multiple ></div>
          <div id="f_photo" style="display:none;">  Photo: <input type="file" name="of_photo[]"  multiple ></div>
          <div id="f_client" style="display:none;">  Client Instructions: <input type="file" name="of_client[]"  multiple ></div>

                                            
                                    
                                </div>


                                <!-- Col 12 end 11		-->



                               

                                <!-- Col 12 end 12		-->




                    



                            </div><!-- Row end-->
                                <button type="submit" class="btn btn-primary mb-0">Submit</button>

                                

                            </form>
                        </div>
                    </div><!-- card mb-4 End -->





                    <!-- card mb-4 End -->


                    <div id="loantypeModal" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-body text-center">
                                                   <div id="loanTypeDesc"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                </div>
            </div>
            <!--Row end-->
        </div>
    </main>



  

    <!-- Footer -->

    <?php include_once('footer.php'); ?>

    <!-- Footer End -->


    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-3.3.1.min.js"></script>
   

    <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/perfect-scrollbar.min.js"></script>
    
    <script src="<?php echo base_url(); ?>assets/js/vendor/select2.full.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap-datepicker.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/vendor/mousetrap.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/js/vendor/dropzone.min.js"></script> -->


    <!-- <script src="<?php echo base_url(); ?>assets/js/dore-plugins/select.from.library.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/js/dore.script.js"></script>   
    <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
    
    <script>
    // lenOrder = $(".dropdown-menu .dropdown-item").length-1;
    
    lastOrder = $(".dropdown-menu .dropdown-item")[1].text;
    currentOrder = parseInt(lastOrder.substr(4)) + 1 ;
    $("input[name=order_number]").val("MRQ-"+ currentOrder);
    // $("#select-test").select2();
    // setTimeout(() => {
    //     $("#select-test").select2();
    //     console.log("test");
    // }, 1000);
    // setTimeout(() => {
    //     $("#select-test").select2();
    //     console.log("test2");
    // }, 2000);


function file_change(){

    $("#f_contract").hide();
    $("#f_option").hide();
    $("#f_comparable").hide();
    $("#f_plat").hide();
    $("#f_plan").hide();
    $("#f_condo").hide();
    $("#f_adu").hide();
    $("#f_photo").hide();
    $("#f_client").hide();

    f = $("select[name=file_cat]").find(':selected').val();

    if( f == "Contract"){$("#f_contract").show();}
    else if(f == "Option Sheets"){$("#f_option").show();}
    else if(f == "Comparable Info"){$("#f_comparable").show();}
    else if(f == "Plat"){$("#f_plat").show();}
    else if(f == "Plans/Specs"){$("#f_plan").show();}
    else if(f == "Condo Questionnaire"){$("#f_condo").show();}
    else if(f == "ADU Letter"){$("#f_adu").show();}
    else if(f == "Photo"){$("#f_photo").show();}
    else if(f == "Client Instructions"){$("#f_client").show();}

}

function lenderChange(){
    amc_id = $("select[name=order_client_id]").find(':selected').data('amc-id');
    amc_name = $("select[name=order_client_id]").find(':selected').data('amc-name');
    folder_name = $("select[name=order_client_id]").find(':selected').data('folder-name');
    website = $("select[name=order_client_id]").find(':selected').data('website');
    phone = $("select[name=order_client_id]").find(':selected').data('phone');
    email = $("select[name=order_client_id]").find(':selected').data('email');
    ins = $("select[name=order_client_id]").find(':selected').data('ins');
    file = $("select[name=order_client_id]").find(':selected').data('file');


    
    $("input[name=order_cl_ins]").val(ins);

    var fileHtml = "";
    if(file != '') {
        str = file;
        tmpArr = str.split(",");
        attachCount = 0; 
        a = window.location.href
        a =a.substr(0,a.lastIndexOf("/"))
        a =a.substr(0,a.lastIndexOf("/"))
        a= a + "/uploads/clients/" + folder_name + "/";
            for(i=0; i < tmpArr.length; i++){
                tmp = tmpArr[i].replaceAll(" ", "_");
                fileHtml += `<span><u> <i class="simple-icon-paper-clip"></i> <a href="`+a+tmp+`" >`+tmp+`</a></u>  <br/></span> `;
            }
        }

    $("#lenderInfo").html(`
    <p><b>AMC Name</b>: `+amc_name+`</p>
    <p><b>Website</b>: <a href="`+website+`" target="_blank"> `+website+` </a> </p>
    <p><b>Email</b>: `+email+`</p>
    <p><b>Special Ins</b>: `+ins+`</p>

    <p><b>Files</b>: `+fileHtml+`</p><br>
    `);
    



}

function loantypeChange(){
    desc = $("select[name=order_loan_type]").find(':selected').data('desc');
    console.log(desc);
    $("#loantypeModal").modal();
    $("#loanTypeDesc").html(desc);
    
    // $("input[name=order_appraiser_email]").val(email);
}


function appraiserChange(){
    email = $("select[name=order_appraiser_id]").find(':selected').data('email');
    $("input[name=order_appraiser_email]").val(email);
}

let optgroupState = {};

$("body").on('click', '.select2-container--open .select2-results__group', function() {
  $(this).siblings().toggle();
  let id = $(this).closest('.select2-results__options').attr('id');
  let index = $('.select2-results__group').index(this);
  optgroupState[id][index] = !optgroupState[id][index];
})

$('#select-test').on('select2:open', function() {
  $('.select2-dropdown--below').css('opacity', 0);
  setTimeout(() => {
    let groups = $('.select2-container--open .select2-results__group');
    let id = $('.select2-results__options').attr('id');
    if (!optgroupState[id]) {
      optgroupState[id] = {};
    }
    $.each(groups, (index, v) => {
      optgroupState[id][index] = optgroupState[id][index] || false;
      optgroupState[id][index] ? $(v).siblings().show() : $(v).siblings().hide();
    })
    $('.select2-dropdown--below').css('opacity', 1);
  }, 0);
})
       
    </script>
</body>

</html>