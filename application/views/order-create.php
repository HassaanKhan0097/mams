<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>New Order</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font/simple-line-icons/css/simple-line-icons.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/select2.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/dropzone.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/bootstrap.rtl.only.min.css" />
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
                                        <label>Order Number*</label>
                                        <input type="text" class="form-control" name="order_number" placeholder="Enter Order Numbers"  required> 
                                        <span class="helper-text"><?php echo form_error('order_number'); ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label>Loan Number</label>
                                        <input type="number" class="form-control" name="order_loan_number" placeholder="Enter Loan Number" >
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>FHA/VA Case #</label>
                                        <input type="text" class="form-control" name="order_case_number" placeholder="Enter FHA VA Case" >
                                    </div>

                                    <div class="form-group">
                                        <label>Lender Name*</label>
                                        <select class="form-control select2-single" onchange="lenderChange()" data-width="100%" name="order_client_id" required>
                                            <option value=""></option>
                                            <?php
                                            foreach($client_list as $cl){
                                            ?>                                            
                                            <option data-amc="<?php echo $cl->cl_amc_name ?>" data-website="<?php echo $cl->cl_website ?>" data-phone="<?php echo $cl->cl_phone ?>" data-email="<?php echo $cl->cl_email ?>" value="<?php echo $cl->cl_id ?>"><?php echo $cl->cl_name ?></option>
                                            <?php } ?>
                                        </select>       
                                        <span class="helper-text"><?php echo form_error('order_client_id'); ?></span>                                   
                                    </div>

                                    <div class="form-group">
                                        <label>AMC</label>
                                        <input type="text" class="form-control" name="order_amc" placeholder="Enter AMC" readonly >
                                                                   
                                    </div>
                                    
                                    <!-- <div class="form-group">
                                        <label>Web Portal</label>
                                        <input type="text" class="form-control" name="order_website" placeholder="Enter Website" readonly >
                                    </div> 
                  
                                    <div class="form-group">
                                        <label>Lender Phone 1</label>
                                        <input type="text" class="form-control" name="order_phone" placeholder="Enter Phone 1" readonly>
                                    </div>
                             
                                    <div class="form-group">
                                        <label>Lender Phone 2</label>
                                        <input type="text" class="form-control" name="order_phone2" placeholder="Enter Phone" >
                                    </div>
                            
                                    <div class="form-group">
                                        <label>Lender Phone 3</label>
                                        <input type="text" class="form-control" name="order_phone3" placeholder="Enter Phone" >
                                    </div> -->


                                    <div class="form-group">
                                        <label>Lender Email</label>
                                        <input type="text" class="form-control" name="order_cl_email" placeholder="Enter Email" readonly >
                                    </div>
                               
                                    <div class="form-group">
                                        <label>Appraiser Name* </label>
                                        <select class="form-control select2-single" data-width="100%" onchange="appraiserChange()" name="order_appraiser_id" required>
                                            <option value=""></option>
                                            <?php
                                            foreach($appraiser_list as $app){
                                            ?>                                            
                                            <option data-email="<?php echo $app->app_email ?>" value="<?php echo $app->app_id ?>"><?php echo $app->app_name ?></option>
                                            <?php } ?>
                                            
                                        </select>        
                                        <span class="helper-text"><?php echo form_error('order_appraiser_id'); ?></span>                                
                                    </div>

                                    <!-- <div class="form-group">
                                        <label>Appraiser Email</label>
                                        <input type="text" class="form-control" name="order_appraiser_email" placeholder="Enter Email" readonly >
                                    </div> -->

                                    <div class="form-group">
                                        <label>Expense</label>
                                        <input type="text" class="form-control" name="order_expense" placeholder="Enter Expense" >
                                    </div>

                                    <div class="form-group">
                                        <label>Sub Appraiser Name</label>
                                        <select class="form-control select2-single" data-width="100%" name="order_appraiser_id2">
                                            <option value=""></option>
                                            <?php
                                            foreach($appraiser_list as $app){
                                            ?>                                            
                                            <option value="<?php echo $app->app_id ?>"><?php echo $app->app_name ?></option>
                                            <?php } ?>
                                        </select>                                    
                                    </div>

                                    <div class="form-group">
                                        <label>Sub Appraiser Expense</label>
                                        <input type="text" class="form-control" name="order_sub_app_expense" placeholder="Enter Expense" >
                                    </div>

                                    <div class="form-group">
                                        <label>Revenue*</label>
                                        <input type="text" class="form-control" name="order_revenue" placeholder="Enter Revenue" required>
                                        <span class="helper-text"><?php echo form_error('order_revenue'); ?></span>
                                    </div>

                                                
                                    
                                </div>
                                <!-- 1st Column ...... col-sm-4 -->

                                <div class="col-sm-4">

                                    <div class="form-group">
                                        <label>Property Address*</label>
                                        <input type="text" class="form-control" name="order_address" placeholder="Enter Property Address" required >
                                        <span class="helper-text"><?php echo form_error('order_address'); ?></span> 
                                    </div>

                                    <div class="form-group">
                                        <label>City, State*</label>
                                        <select class="form-control select2-single" data-width="100%" name="order_city" required>
                                                <option value=""></option>
                                                <?php
                                                $cityNames = ["New York City, NY", "Los Angeles, CA", "Chicago, IL"];
                                                foreach($cityNames as $cl){
                                                ?>                                            
                                                <option value="<?php echo $cl ?>"><?php echo $cl ?></option>
                                                <?php } ?>
                                        </select> 
                                        <span class="helper-text"><?php echo form_error('order_city'); ?></span>   
                                    </div>

                                    <div class="form-group">
                                        <label>Zip Code*</label>
                                        <input type="number" class="form-control" name="order_zipcode" placeholder="Enter Zip Code" required >
                                        <span class="helper-text"><?php echo form_error('order_zipcode'); ?></span>    
                                    </div>
                                
                                    <div class="form-group">
                                        <label>Borrower*</label>
                                        <input type="text" class="form-control" name="order_borrower" placeholder="Enter Borrower" required>
                                        <span class="helper-text"><?php echo form_error('order_borrower'); ?></span> 
                                    </div>
                                
                                    <div class="form-group">
                                        <label>Co Borrower</label>
                                        <input type="text" class="form-control" name="order_co_borrower" placeholder="Enter Co Borrower" >
                                    </div>

                                    <div class="form-group">
                                        <label>Entry Contact*</label>
                                        <input type="text" class="form-control" name="order_entry" placeholder="Enter Entry Contact" required>
                                        <span class="helper-text"><?php echo form_error('order_entry'); ?></span>
                                    </div>


                                    <div class="form-group">
                                        <label>Borrower Phone 1</label>
                                        <input type="text" class="form-control" name="order_borrower_phone1" placeholder="Enter Phone 1" >
                                    </div>
                             
                                    <div class="form-group">
                                        <label>Borrower Phone 2</label>
                                        <input type="text" class="form-control" name="order_borrower_phone2" placeholder="Enter Phone 2" >
                                    </div>
                            
                                    <div class="form-group">
                                        <label>Borrower Phone 3</label>
                                        <input type="text" class="form-control" name="order_borrower_phone3" placeholder="Enter Phone 3" >
                                    </div>


                                    <div class="form-group">
                                        <label>Borrower Email</label>
                                        <input type="text" class="form-control" name="order_borrower_email" placeholder="Enter Email" >
                                    </div>

                                    <div class="form-group">
                                    <label>Payment Method*</label>
                                    <select class="form-control select2-single" data-width="100%" name="order_paymentmethod" required>
                                        <option value=""></option>
                                        <option value="Bill Client">Bill Client</option>
                                        <option value="Credit Card">Credit Card</option>
                                        <option value="COD">COD</option>
                                    </select>                       
                                    <span class="helper-text"><?php echo form_error('order_paymentmethod'); ?></span>       
                                </div>

                                    

                                    
                               

                                    
                                   
                                
                          




                                </div>
                                <!-- 2nd Column ...... col-sm-4 -->

                                <div class="col-sm-4">

                                    <div class="form-group">
                                        <label>Order Type*</label>
                                        <select class="form-control select2-single" data-width="100%" name="order_type_id" required>
                                            <option value=""></option>
                                            <?php
                                            foreach($order_types_list as $ol){
                                            ?>                                            
                                            <option value="<?php echo $ol->order_id ?>"><?php echo $ol->order_name ?></option>
                                            <?php } ?>
                                        </select>                 
                                        <span class="helper-text"><?php echo form_error('order_type_id'); ?></span>                   
                                    </div>


                                    <div class="form-group">
                                        <label>Loan Type*</label>
                                        <select class="form-control select2-single" data-width="100%" onchange="loantypeChange()" name="order_loan_type" required>
                                            <option value=""></option>
                                            <?php
                                            // $loanType = ["FHA", "Conventional", "VHDA-FHA", "VHDA-Conventional", "USDA", "VA", "FHA-203K"];
                                            foreach($loan_types_list as $lt){
                                            ?>                                            
                                            <option data-desc="<?php echo $lt->loan_desc ?>" value="<?php echo $lt->loan_id . "|" . $lt->loan_name . "|" . $lt->loan_desc ?> "><?php echo $lt->loan_name ?></option>
                                            <?php } ?>
                                        </select>                 
                                        <span class="helper-text"><?php echo form_error('order_loan_type'); ?></span>                   
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>Assignment Type*</label>
                                        <select class="form-control select2-single" data-width="100%" name="order_assignment_id" required>
                                            <option value=""></option>
                                            <?php
                                            foreach($assignment_types_list as $at){
                                            ?>                                            
                                            <option value="<?php echo $at->at_id ?>"><?php echo $at->at_name ?></option>
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
                                            <option value="<?php echo $aa ?>"><?php echo $aa ?></option>
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

                                    <div class="form-group">
                                        <label>Order Status*</label>
                                        <select class="form-control select2-single" data-width="100%" name="order_status_id" required>
                                            <option value=""></option>
                                            <?php
                                            foreach($status_info_list as $status){
                                            ?>                                            
                                            <option value="<?php echo $status->st_id ?>" <?php echo ( $status->st_name  == 'Assigned') ?  'selected' :  ''; ?>><?php echo $status->st_name ?></option>
                                            <?php } ?>
                                        </select>  
                                        <span class="helper-text"><?php echo form_error('order_status_id'); ?></span>                                  
                                    </div>

                                    <div class="form-group">
                                        <label>Order Date*</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" name="order_date"  value="<?php echo date( "m/d/Y"); ?>" required>
                                            <span class="input-group-text input-group-append input-group-addon">
                                                <i class="simple-icon-calendar"></i>
                                            </span>
                                            <span class="helper-text"><?php echo form_error('order_date'); ?></span>    
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Due Date*</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" name="order_duedate" required>
                                            <span class="input-group-text input-group-append input-group-addon">
                                                <i class="simple-icon-calendar"></i>
                                            </span>
                                            <span class="helper-text"><?php echo form_error('order_duedate'); ?></span>    
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Appointment Date</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" name="order_appointmentdate">
                                            <span class="input-group-text input-group-append input-group-addon">
                                                <i class="simple-icon-calendar"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                <label>Appointment Time</label>
                                    <div id="select-container">
                                        <select class="form-control select2-single"  id="select-test" data-width="100%" name="order_appointment_time">
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
                                        <input type="text" class="form-control" name="order_completedate">
                                        <span class="input-group-text input-group-append input-group-addon">
                                            <i class="simple-icon-calendar"></i>
                                        </span>
                                    </div>
                                </div>

                                

                                    



                                </div>
                                <!-- 3rd Column ...... col-sm-4 -->

                    
                                


                                   
                                
                               

                                <!-- <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Sub Assignment Type</label>
                                        <select class="form-control select2-single" data-width="100%" name="order_assignment_id2">
                                            <option value=""></option>
                                            <?php
                                            foreach($assignment_types_list as $at){
                                            ?>                                            
                                            <option value="<?php echo $at->at_id ?>"><?php echo $at->at_name ?></option>
                                            <?php } ?>
                                        </select>                                    
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Sub Assignment Type 2</label>
                                        <select class="form-control select2-single" data-width="100%" name="order_assignment_id3">
                                            <option value=""></option>
                                            <?php
                                            foreach($assignment_types_list as $at){
                                            ?>                                            
                                            <option value="<?php echo $at->at_id ?>"><?php echo $at->at_name ?></option>
                                            <?php } ?>
                                        </select>                                    
                                    </div>
                                </div> -->
                                
                              
                                <!-- <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>State</label>
                                        <select class="form-control select2-single" data-width="100%" name="order_state" >
                                            <option value=""></option>
                                            <option value="Virginia">Virginia</option>
                                            <option value="Maryland">Maryland</option>
                                            <option value="District of Columbia">District of Columbia</option>
                                            <option value="West Virginia">West Virginia</option>
                                            <option value="Michigan">Michigan</option>
                                        </select>   
                                        <span class="helper-text"><?php echo form_error('order_state'); ?></span>                                 
                                    </div>
                                </div> -->


                               
                                <!-- <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Sub Client Name</label>
                                        <select class="form-control select2-single" data-width="100%" name="order_client_id2">
                                            <option value=""></option>
                                            <?php
                                            foreach($client_list as $cl){
                                            ?>                                            
                                            <option value="<?php echo $cl->cl_id ?>"><?php echo $cl->cl_name ?></option>
                                            <?php } ?>
                                        </select>                                             </div>
                                </div> -->

                                <!-- <div class="col-sm-4">
                                   
                                </div> -->

                                

                                <!-- <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Appraiser Email 2</label>
                                        <input type="text" class="form-control" name="order_appraiser_email2" placeholder="Enter Email 2" >
                                    </div>
                                </div> -->


                                <!-- <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Purchase Price</label>
                                        <input type="text" class="form-control" name="order_purchase" placeholder="Enter Purchase Price" >
                                    </div>
                                </div> -->


                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Special instructions</label>
                                        <textarea  class="form-control" name="order_instruction" placeholder="Enter Special Instruction" rows="2" cols="50"></textarea>                                    
                                    </div>
                                </div>

                                <div class="col-sm-12 mb-4">
                                    
                                        <!-- <div class="card-body"> -->
                                            <h5 class="mb-4">Attach File</h5>

                                                <!-- <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Upload</span>
                                                    </div> -->
                                                    <!-- <div class="custom-file"> -->
                                                        <input type="file" name="order_file[]" id="inputGroupFile01" multiple>
                                                        <!-- <label class="custom-file-label" for="inputGroupFile01">Choose file</label> -->
                                                    <!-- </div> -->
                                                <!-- </div> -->

                                            
                                        <!-- </div> -->
                                    
                                </div>


                                <!-- Col 12 end 11		-->



                               

                                <!-- Col 12 end 12		-->




                    



                            </div><!-- Row end-->
                                <button type="submit" class="btn btn-primary mb-0">Submit</button>

                                

                            </form>
                        </div>
                    </div><!-- card mb-4 End -->


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
    <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/mousetrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/dropzone.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dore.script.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/select2.full.js"></script>

    <script>
    // lenOrder = $(".dropdown-menu .dropdown-item").length-1;
    
    lastOrder = $(".dropdown-menu .dropdown-item")[1].text;
    currentOrder = parseInt(lastOrder.substr(4)) + 1 ;
    $("input[name=order_number]").val("MRQ-"+ currentOrder);
$("#select-test").select2();

function lenderChange(){
    amc = $("select[name=order_client_id]").find(':selected').data('amc');
    website = $("select[name=order_client_id]").find(':selected').data('website');
    phone = $("select[name=order_client_id]").find(':selected').data('phone');
    email = $("select[name=order_client_id]").find(':selected').data('email');

$("input[name=order_amc]").val(amc);
$("input[name=order_website]").val(website);
$("input[name=order_phone]").val(phone);
$("input[name=order_cl_email]").val(email);

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