<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit File</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font/simple-line-icons/css/simple-line-icons.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/datatables.responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/bootstrap-datepicker3.min.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/select2.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor/select2-bootstrap.min.css" />
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
                    <h1>Edit File</h1>
                    <div class="text-zero top-right-button-container">
                    <a href="<?php echo base_url(); ?>PdfReport/orderReport/<?php echo $order_single->order_number; ?>" class="btn btn-primary btn-lg top-right-button mr-1" >Get PDF</a>

                            <button type="button" class="btn btn-danger btn-lg top-right-button mr-1" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button>
                        </div>
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="mb-4">
                            <button class="btn btn-primary mb-1 mr-2" type="button" onclick="edit_file_collapse();">
                                Complete File Record
                            </button>
                            <button class="btn btn-primary mb-1" type="button" onclick="edit_loan_collapse();">
                                Add/Edit Notes
                            </button>
                    </div>
                

                    <div class="card mb-4" id="edit_file">
                        <div class="card-body">
                            <h5 class="mb-4">Complete File Record</h5>
                            <form action="<?php echo base_url(); ?>Order/update_order/<?php echo $order_single->order_number; ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Order Number*</label>
                                        <input type="text" class="form-control" name="upd_order_number" placeholder="Enter Order Numbers" value="<?php echo $order_single->order_number ?>" readonly required> 
                                        <span class="helper-text"><?php echo form_error('order_number'); ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label>Loan Number</label>
                                        <input type="number" class="form-control" name="upd_order_loan_number" placeholder="Enter Loan Number" value="<?php echo $order_single->order_loan_number ?>">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>FHA/VA Case #</label>
                                        <input type="text" class="form-control" name="upd_order_case_number" placeholder="Enter FHA VA Case" value="<?php echo $order_single->order_case_number ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Lender Name*</label>
                                        <select class="form-control select2-single" onchange="lenderChange()" data-width="100%" name="upd_order_client_id" required>
                                            <option value=""></option>
                                            <?php
                                            foreach($client_list as $cl){
                                            ?>                                            
                                            <option  data-amc-id="<?php echo $cl->cl_amc_id ?>" data-amc-name="<?php echo $cl->amc_name ?>" data-website="<?php echo $cl->cl_website ?>" data-phone="<?php echo $cl->cl_phone ?>" data-email="<?php echo $cl->cl_email ?>" value="<?php echo $cl->cl_id ?>"  <?php echo ( $order_single->order_client_id ==  $cl->cl_id ) ?  'Selected' :  ''; ?> ><?php echo $cl->cl_name ?></option>
                                            <?php } ?>
                                        </select>       
                                        <span class="helper-text"><?php echo form_error('order_client_id'); ?></span>                                   
                                    </div>

                                    <div class="form-group">
                                        <label>AMC</label>
                                        <input type="text" class="form-control" name="upd_order_amc" placeholder="Enter AMC" value="<?php echo $order_single->amc_name ?>" readonly >
                                                                   
                                    </div>
                                    
                                     <div class="form-group">
                                        <label>Web Portal</label>
                                        <input type="text" class="form-control" name="upd_order_website" placeholder="Enter Website" value="<?php echo $order_single->cl_website ?>" readonly >
                                    </div>
                  
                                   <!-- <div class="form-group">
                                        <label>Lender Phone 1</label>
                                        <input type="text" class="form-control" name="upd_order_phone" placeholder="Enter Phone 1" value="<?php echo $order_single->cl_phone ?>" readonly>
                                    </div>
                             
                                    <div class="form-group">
                                        <label>Lender Phone 2</label>
                                        <input type="text" class="form-control" name="upd_order_phone2" placeholder="Enter Phone" value="<?php echo $order_single->order_phone2 ?>">
                                    </div>
                            
                                    <div class="form-group">
                                        <label>Lender Phone 3</label>
                                        <input type="text" class="form-control" name="upd_order_phone3" placeholder="Enter Phone" value="<?php echo $order_single->order_phone3 ?>">
                                    </div> -->


                                    <div class="form-group">
                                        <label>Lender Email</label>
                                        <input type="text" class="form-control" name="upd_order_cl_email" placeholder="Enter Email" value="<?php echo $order_single->cl_email ?>" readonly >
                                    </div>
                               
                                    <div class="form-group">
                                        <label>Appraiser Name* </label>
                                        <select class="form-control select2-single" data-width="100%" onchange="appraiserChange()" name="upd_order_appraiser_id" required>
                                            <option value=""></option>
                                            <?php
                                            foreach($appraiser_list as $app){
                                            ?>                                            
                                            <option data-email="<?php echo $app->app_email ?>" value="<?php echo $app->app_id ?>" <?php echo ( $order_single->order_appraiser_id ==  $app->app_id ) ?  'Selected' :  ''; ?> > <?php echo $app->app_name ?></option>
                                            <?php } ?>
                                            
                                        </select>        
                                        <span class="helper-text"><?php echo form_error('order_appraiser_id'); ?></span>                                
                                    </div>

                                    <!-- <div class="form-group">
                                        <label>Appraiser Email</label>
                                        <input type="text" class="form-control" name="upd_order_appraiser_email" placeholder="Enter Email" value="<?php echo $order_single->app_email ?>" readonly >
                                    </div> -->

                                    <div class="form-group">
                                        <label>Expense</label>
                                        <input type="text" class="form-control" name="upd_order_expense" placeholder="Enter Expense" value="<?php echo $order_single->order_expense ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Sub Appraiser Name</label>
                                        <select class="form-control select2-single" data-width="100%" name="upd_order_appraiser_id2">
                                            <option value=""></option>
                                            <?php
                                            foreach($appraiser_list as $app){
                                            ?>                                            
                                            <option value="<?php echo $app->app_id ?>" <?php echo ( $order_single->order_appraiser_id2 ==  $app->app_id ) ?  'Selected' :  ''; ?>><?php echo $app->app_name ?></option>
                                            <?php } ?>
                                        </select>                                    
                                    </div>

                                    <div class="form-group">
                                        <label>Sub Appraiser Expense</label>
                                        <input type="text" class="form-control" name="upd_order_sub_app_expense" placeholder="Enter Expense" value="<?php echo $order_single->order_sub_app_expense ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Revenue*</label>
                                        <input type="text" class="form-control" name="upd_order_revenue" placeholder="Enter Revenue" value="<?php echo $order_single->order_revenue ?>" required>
                                        <span class="helper-text"><?php echo form_error('order_revenue'); ?></span>
                                    </div>

                                                                                 
                                    
                                </div>
                                <!-- 1st Column ...... col-sm-4 -->

                                <div class="col-sm-4">

                                    <div class="form-group">
                                        <label>Property Address*</label>
                                        <input type="text" class="form-control" name="upd_order_address" placeholder="Enter Property Address" value="<?php echo $order_single->order_address ?>" required >
                                        <span class="helper-text"><?php echo form_error('order_address'); ?></span> 
                                    </div>

                                    <div class="form-group">
                                        <label>City, State*</label>
                                        <select class="form-control select2-single" data-width="100%" name="upd_order_city" required>
                                                <option value=""></option>
                                                <?php
                                                $cityNames = ["New York City, NY", "Los Angeles, CA", "Chicago, IL"];
                                                foreach($cityNames as $cl){
                                                ?>                                            
                                                <option value="<?php echo $cl ?>" <?php echo ( $order_single->order_city ==  $cl ) ?  'Selected' :  ''; ?>><?php echo $cl ?></option>
                                                <?php } ?>
                                        </select> 
                                        <span class="helper-text"><?php echo form_error('order_city'); ?></span>   
                                    </div>

                                    <div class="form-group">
                                        <label>Zip Code*</label>
                                        <input type="number" class="form-control" name="upd_order_zipcode" placeholder="Enter Zip Code" value="<?php echo $order_single->order_zipcode ?>" required >
                                        <span class="helper-text"><?php echo form_error('order_zipcode'); ?></span>    
                                    </div>
                                
                                    <div class="form-group">
                                        <label>Borrower*</label>
                                        <input type="text" class="form-control" name="upd_order_borrower" placeholder="Enter Borrower" value="<?php echo $order_single->order_borrower ?>" required>
                                        <span class="helper-text"><?php echo form_error('order_borrower'); ?></span> 
                                    </div>
                                
                                    <div class="form-group">
                                        <label>Co Borrower</label>
                                        <input type="text" class="form-control" name="upd_order_co_borrower" placeholder="Enter Co Borrower" value="<?php echo $order_single->order_co_borrower ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Entry Contact*</label>
                                        <input type="text" class="form-control" name="upd_order_entry" placeholder="Enter Entry Contact" value="<?php echo $order_single->order_entry ?>" required>
                                        <span class="helper-text"><?php echo form_error('order_entry'); ?></span>
                                    </div>


                                    <div class="form-group">
                                        <label>Borrower Phone</label>
                                        <input type="text" class="form-control" name="upd_order_borrower_phone1" placeholder="Enter Phone 1" value="<?php echo $order_single->order_borrower_phone1 ?>">
                                    </div>
                             
                                    <div class="form-group">
                                        <label>Contact Phone 1</label>
                                        <input type="text" class="form-control" name="upd_order_borrower_phone2" placeholder="Enter Phone 2" value="<?php echo $order_single->order_borrower_phone2 ?>">
                                    </div>
                            
                                    <div class="form-group">
                                        <label>Contact Phone 2</label>
                                        <input type="text" class="form-control" name="upd_order_borrower_phone3" placeholder="Enter Phone 3" value="<?php echo $order_single->order_borrower_phone3 ?>">
                                    </div>


                                    <div class="form-group">
                                        <label>Contact Email</label>
                                        <input type="text" class="form-control" name="upd_order_borrower_email" placeholder="Enter Email" value="<?php echo $order_single->order_borrower_email ?>">
                                    </div>


                                    <div class="form-group">
                                    <label>Payment Method*</label>
                                    <select class="form-control select2-single" data-width="100%" name="upd_order_paymentmethod">
                                            <option value=""></option>
                                            <option value="Bill Client" <?php echo ( $order_single->order_paymentmethod == 'Bill Client') ?  'Selected' :  ''; ?>>Bill Client</option>
                                            <option value="Credit Card" <?php echo ( $order_single->order_paymentmethod == 'Credit Card') ?  'Selected' :  ''; ?>>Credit Card</option>
                                            <option value="COD" <?php echo ( $order_single->order_paymentmethod == 'COD') ?  'Selected' :  ''; ?>>COD</option>
                                        </select>                           
                                    <span class="helper-text"><?php echo form_error('upd_order_paymentmethod'); ?></span>       
                                </div>

                                <div class="form-group">
                                        <label>Purchase Price</label>
                                        <input type="text" class="form-control" name="upd_order_purchase" placeholder="Enter Purchase Price" value="<?php echo $order_single->order_purchase ?>">
                                    </div>   

                                    
                               

                                    
                                   
                                
                          




                                </div>
                                <!-- 2nd Column ...... col-sm-4 -->

                                <div class="col-sm-4">

                                    <div class="form-group">
                                        <label>Order Type*</label>
                                        <select class="form-control select2-single" data-width="100%" name="upd_order_type_id"  required>
                                            <option value=""></option>
                                            <?php
                                            foreach($order_types_list as $ol){
                                            ?>                                            
                                            <option value="<?php echo $ol->order_id ?>" <?php echo ( $order_single->order_type_id ==  $ol->order_id ) ?  'Selected' :  ''; ?>><?php echo $ol->order_name ?></option>
                                            <?php } ?>
                                        </select>                 
                                        <span class="helper-text"><?php echo form_error('order_type_id'); ?></span>                   
                                    </div>


                                    <div class="form-group">
                                        <label>Loan Type*</label>
                                        <select class="form-control select2-single" data-width="100%" name="upd_order_loan_type" required>
                                            <option value=""></option>

                                            <?php
                                            // $loanType = ["FHA", "Conventional", "VHDA-FHA", "VHDA-Conventional", "USDA", "VA", "FHA-203K"];
                                            foreach($loan_types_list as $lt){
                                            ?>                                            
                                            <option data-desc="<?php echo $lt->loan_desc ?>" value="<?php echo $lt->loan_id . "|" . $lt->loan_name . "|" . $lt->loan_desc ?> " <?php echo ( $order_single->order_loan_type == $lt->loan_id ) ?  'Selected' :  ''; ?>><?php echo $lt->loan_name ?></option>
                                            <?php } ?>


                                          
                                        </select>                 
                                        <span class="helper-text"><?php echo form_error('order_loan_type'); ?></span>                   
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>Assignment Type*</label>
                                        <select class="form-control select2-single" data-width="100%" name="upd_order_assignment_id" required>
                                            <option value=""></option>
                                            <?php
                                            foreach($assignment_types_list as $at){
                                            ?>                                            
                                            <option value="<?php echo $at->at_id ?>" <?php echo ( $order_single->order_assignment_id ==  $at->at_id ) ?  'Selected' :  ''; ?>><?php echo $at->at_name ?></option>
                                            <?php } ?>
                                            
                                        </select>       
                                        <span class="helper-text"><?php echo form_error('order_assignment_id'); ?></span>                             
                                    </div>

                                    <div class="form-group">
                                        <label>Assignment Add-Ons</label>
                                        <select class="form-control select2-single" data-width="100%" name="upd_order_assignment_addon" >
                                            <option value=""></option>
                                            <?php
                                            $assAdd = ["Rent Comparable Schedule", "Operating Income Statement", "REO Addendum", "ADU"];
                                            foreach($assAdd as $aa){
                                            ?>                                            
                                            <option value="<?php echo $aa ?>" <?php echo ( $order_single->order_assignment_addon ==  $aa ) ?  'Selected' :  ''; ?>><?php echo $aa ?></option>
                                            <?php } ?>
                                        </select>                 
                                        <span class="helper-text"><?php echo form_error('order_loan_type'); ?></span>                   
                                    </div>

                                    <div class="form-group action_input">
                                        <label>Action </label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="upd_order_action"
                                                class="custom-control-input" value="No" <?php echo ( $order_single->order_action == "No" ) ?  'Checked' :  ''; ?>>
                                            <label class="custom-control-label" for="customRadio1" >No</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="upd_order_action"
                                                class="custom-control-input" value="Yes"  <?php echo ( $order_single->order_action == "Yes" ) ?  'Checked' :  ''; ?>>
                                            <label class="custom-control-label" for="customRadio2">Yes</label>
                                        </div>                                        
                                    </div>

                                    <div class="form-group">
                                        <label>Order Status*</label>
                                        <select class="form-control select2-single" data-width="100%" name="upd_order_status_id" required>
                                            <option value=""></option>
                                            <?php
                                            foreach($status_info_list as $status){
                                            ?>                                            
                                            <option value="<?php echo $status->st_id ?>" <?php echo ( $order_single->order_status_id ==  $status->st_id ) ?  'Selected' :  ''; ?>><?php echo $status->st_name ?></option>
                                            <?php } ?>
                                        </select>  
                                        <span class="helper-text"><?php echo form_error('order_status_id'); ?></span>                                  
                                    </div>

                                    <div class="form-group">
                                        <label>Order Date*</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" name="upd_order_date" value="<?php echo $order_single->order_date ?>" required>
                                            <span class="input-group-text input-group-append input-group-addon">
                                                <i class="simple-icon-calendar"></i>
                                            </span>
                                            <span class="helper-text"><?php echo form_error('order_date'); ?></span>    
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Due Date*</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" name="upd_order_duedate" value="<?php echo $order_single->order_duedate ?>" required>
                                            <span class="input-group-text input-group-append input-group-addon">
                                                <i class="simple-icon-calendar"></i>
                                            </span>
                                            <span class="helper-text"><?php echo form_error('order_duedate'); ?></span>    
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Appointment Date</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" name="upd_order_appointmentdate" value="<?php echo $order_single->order_appointmentdate ?>">
                                            <span class="input-group-text input-group-append input-group-addon">
                                                <i class="simple-icon-calendar"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                <label>Appointment Time</label>
                                <div id="select-container">
                                        <select class="form-control select2-single"  id="select-test" data-width="100%" name="upd_order_appointment_time">
                                        <optgroup label="9am-11pm">
                                        <option value="9:00am" <?php echo (  $order_single->order_appointment_time  == '9:00am') ?  'selected' :  ''; ?>>9:00 am</option>
                                            <option value="9:15am" <?php echo (  $order_single->order_appointment_time  == '9:15am') ?  'selected' :  ''; ?>>9:15 am</option>
                                            <option value="9:30am" <?php echo (  $order_single->order_appointment_time  == '9:30am') ?  'selected' :  ''; ?>>9:30 am</option>
                                            <option value="9:45am" <?php echo (  $order_single->order_appointment_time  == '9:45am') ?  'selected' :  ''; ?>>9:45 am</option>
                                            <option value="10:00am" <?php echo (  $order_single->order_appointment_time  == '10:00am') ?  'selected' :  ''; ?>>10:00 am</option>
                                            <option value="10:15am" <?php echo (  $order_single->order_appointment_time  == '10:15am') ?  'selected' :  ''; ?>>10:15 am</option>
                                            <option value="10:30am" <?php echo (  $order_single->order_appointment_time  == '10:30am') ?  'selected' :  ''; ?>>10:30 am</option>
                                            <option value="10:45am" <?php echo (  $order_single->order_appointment_time  == '10:45am') ?  'selected' :  ''; ?>>10:45 am</option>
                                        </optgroup>
                                        <optgroup label="11am-1pm">
                                            <option value="11:00am" <?php echo (  $order_single->order_appointment_time  == '11:00am') ?  'selected' :  ''; ?>>11:00 am</option>
                                            <option value="11:15am" <?php echo (  $order_single->order_appointment_time  == '11:15am') ?  'selected' :  ''; ?>>11:15 am</option>
                                            <option value="11:30am" <?php echo (  $order_single->order_appointment_time  == '11:30am') ?  'selected' :  ''; ?>>11:30 am</option>
                                            <option value="11:45am" <?php echo (  $order_single->order_appointment_time  == '11:45am') ?  'selected' :  ''; ?>>11:45 am</option>
                                            <option value="12:00am" <?php echo (  $order_single->order_appointment_time  == '12:00am') ?  'selected' :  ''; ?>>12:00 am</option>
                                            <option value="12:15am" <?php echo (  $order_single->order_appointment_time  == '12:15am') ?  'selected' :  ''; ?>>12:15 am</option>
                                            <option value="12:30am" <?php echo (  $order_single->order_appointment_time  == '12:30am') ?  'selected' :  ''; ?>>12:30 am</option>
                                            <option value="12:45am" <?php echo (  $order_single->order_appointment_time  == '12:45am') ?  'selected' :  ''; ?>>12:45 am</option>
                                        </optgroup>
                                        <optgroup label="1pm-3pm">
                                            <option value="1:00pm" <?php echo (  $order_single->order_appointment_time  == '1:00pm') ?  'selected' :  ''; ?>>1:00 pm</option>
                                            <option value="1:15pm" <?php echo (  $order_single->order_appointment_time  == '1:15pm') ?  'selected' :  ''; ?>>1:15 pm</option>
                                            <option value="1:30pm" <?php echo (  $order_single->order_appointment_time  == '1:30pm') ?  'selected' :  ''; ?>>1:30 pm</option>
                                            <option value="1:45pm" <?php echo (  $order_single->order_appointment_time  == '1:45pm') ?  'selected' :  ''; ?>>1:45 pm</option>
                                            <option value="2:00pm" <?php echo (  $order_single->order_appointment_time  == '2:00pm') ?  'selected' :  ''; ?>>2:00 pm</option>
                                            <option value="2:15pm" <?php echo (  $order_single->order_appointment_time  == '2:15pm') ?  'selected' :  ''; ?>>2:15 pm</option>
                                            <option value="2:30pm" <?php echo (  $order_single->order_appointment_time  == '2:30pm') ?  'selected' :  ''; ?>>2:30 pm</option>
                                            <option value="2:45pm" <?php echo (  $order_single->order_appointment_time  == '2:45pm') ?  'selected' :  ''; ?>>2:45 pm</option>
                                        </optgroup>
                                        <optgroup label="3pm-5pm">
                                            <option value="3:00pm" <?php echo (  $order_single->order_appointment_time  == '3:00pm') ?  'selected' :  ''; ?>>3:00 pm</option>
                                            <option value="3:15pm" <?php echo (  $order_single->order_appointment_time  == '3:15pm') ?  'selected' :  ''; ?>>3:15 pm</option>
                                            <option value="3:30pm" <?php echo (  $order_single->order_appointment_time  == '3:30pm') ?  'selected' :  ''; ?>>3:30 pm</option>
                                            <option value="3:45pm" <?php echo (  $order_single->order_appointment_time  == '3:45pm') ?  'selected' :  ''; ?>>3:45 pm</option>
                                            <option value="4:00pm" <?php echo (  $order_single->order_appointment_time  == '4:00pm') ?  'selected' :  ''; ?>>4:00 pm</option>
                                            <option value="4:15pm" <?php echo (  $order_single->order_appointment_time  == '4:15pm') ?  'selected' :  ''; ?>>4:15 pm</option>
                                            <option value="4:30pm" <?php echo (  $order_single->order_appointment_time  == '4:30pm') ?  'selected' :  ''; ?>>4:30 pm</option>
                                            <option value="4:45pm" <?php echo (  $order_single->order_appointment_time  == '4:45pm') ?  'selected' :  ''; ?>>4:45 pm</option>
                                        </optgroup>
                                        <optgroup label="5pm-7pm">
                                            <option value="5:00pm" <?php echo (  $order_single->order_appointment_time  == '5:00pm') ?  'selected' :  ''; ?>>5:00 pm</option>
                                            <option value="5:15pm" <?php echo (  $order_single->order_appointment_time  == '5:15pm') ?  'selected' :  ''; ?>>5:15 pm</option>
                                            <option value="5:30pm" <?php echo (  $order_single->order_appointment_time  == '5:30pm') ?  'selected' :  ''; ?>>5:30 pm</option>
                                            <option value="5:45pm" <?php echo (  $order_single->order_appointment_time  == '5:45pm') ?  'selected' :  ''; ?>>5:45 pm</option>
                                            <option value="6:00pm" <?php echo (  $order_single->order_appointment_time  == '6:00pm') ?  'selected' :  ''; ?>>6:00 pm</option>
                                            <option value="6:15pm" <?php echo (  $order_single->order_appointment_time  == '6:15pm') ?  'selected' :  ''; ?>>6:15 pm</option>
                                            <option value="6:30pm" <?php echo (  $order_single->order_appointment_time  == '6:30pm') ?  'selected' :  ''; ?>>6:30 pm</option>
                                            <option value="6:45pm" <?php echo (  $order_single->order_appointment_time  == '6:45pm') ?  'selected' :  ''; ?>>6:45 pm</option>
                                            <option value="7:00pm" <?php echo (  $order_single->order_appointment_time  == '7:00pm') ?  'selected' :  ''; ?>>7:00 pm</option>
                                        </optgroup>
                                       
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Complete Date</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" name="upd_order_completedate" value="<?php echo $order_single->order_completedate ?>">
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
                                        <textarea  class="form-control" name="upd_order_instruction" placeholder="Enter Special Instruction" rows="2" cols="50"><?php echo $order_single->order_instruction ?></textarea>                                    
                                    </div>
                                </div>
                                


                                   
                                
                               

                                <!-- <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Sub Assignment Type</label>
                                        <select class="form-control select2-single" data-width="100%" name="upd_order_assignment_id2">
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
                                        <select class="form-control select2-single" data-width="100%" name="upd_order_assignment_id3">
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
                                        <select class="form-control select2-single" data-width="100%" name="upd_order_state" >
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
                                        <select class="form-control select2-single" data-width="100%" name="upd_order_client_id2">
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
                                        <input type="text" class="form-control" name="upd_order_appraiser_email2" placeholder="Enter Email 2" >
                                    </div>
                                </div> -->


                                <!-- <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Purchase Price</label>
                                        <input type="text" class="form-control" name="upd_order_purchase" placeholder="Enter Purchase Price" >
                                    </div>
                                </div> -->

                                <div class="form-group" style="display:none">
                                        <!-- <label>Purchase Price</label> -->
                                        <input type="text" class="form-control" name="upd_old_file" value="<?php echo $order_single->order_file; ?>">
                                </div>
                                
                                <!-- Contract,pexels-fauxels-3182749.jpg|Contract,pexels-fauxels-3184434.jpg -->
                                <div class="col-sm-12 mb-4">
                                    <h5 class="mb-4">Attach Files</h5>
                                    <?php 
                                        if($order_single->order_file != '') {
                                            $str = $order_single->order_file;
                                            $tmpArr = explode("|",$str); 
                                            $fn = array ();
                                            foreach ($tmpArr as $sub) {
                                            array_push($fn,explode(",",$sub));
                                            }
                                            $orderfile_input = ["of_contract","of_option","of_comparable","of_plat","of_plan","of_condo","of_adu","of_photo","of_client"];
                                            $arr = [ "Contract","Option Sheets","Comparable Info","Plat","Plans/Specs","Condo Questionnaire","ADU Letter","Photo","Client Instructions" ];

                                           
                                            $of_count = 0;$past_f= "";$attachCount = 0;
                                            foreach($fn as $f){
                                                $tmp = $orderfile_input[$of_count];
                                                $tmp_head= $arr[$of_count];

                                                do {
                                                    if($f[0] == $tmp)
                                                    {
                                                        
                                                         ?>
                                                        <?php 
                                                        if($past_f != $f[0])
                                                        {
                                                        echo "<h6><b>" .$tmp_head . "</b></h6>"; echo "<br>"; 
                                                        }
                                                        $past_f = $f[0];
                                                        ?>
                                                        
                                                            <div id="attach<?php $attachCount++; echo $attachCount; ?>"><u> <i class="simple-icon-paper-clip"></i> <a href="<?php echo $this->config->item('upload_dir')."orders/".$order_single->order_number. "/".$f[1]; ?>"><?php echo $f[1] ?></a></u> &nbsp;&nbsp;&nbsp;&nbsp; <span onclick="hitFile('<?php echo $tmp . ',' . $f[1] ?>','attach<?php echo $attachCount ?>')" style="cursor: pointer;">x</span><br/><br/></div> 
                                                        <?php 
                                                        $continue   = false;
                                                    }else{
                                                        $of_count++;
                                                        $tmp = $orderfile_input[$of_count];
                                                        $tmp_head= $arr[$of_count];

                                                        $continue = true;
                                                    }
                                                    
                                                    
                                                } while ($continue == true);

                                                
                                                
                                            }
                                            // $filesArray = unserialize($order_single->order_file);
                                            // echo "<pre>";
                                            // print_r($fn);
                                           
                                        } else { ?> No file(s) attached. <?php }

                                    ?>

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
        </select>                                             
    </div>
</div>
<!-- of_contract -->

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



                    <div class="card mb-4" id="new_notes">
                        <div class="card-body">
                            <h5 class="mb-4">Add/Edit Notes</h5>
                            <form action="<?php echo base_url(); ?>Notes/create/<?php echo $order_single->order_number; ?>" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <p>Name:</p>
                                        <label><?php echo date("Y/m/d") . " ".date("h:i:sa");?></label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <p>Author:</p>
                                        <label><?php echo $loggedUser['user_username']?></label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" class="form-control" name="notes_subject" placeholder="Enter Notes Subject" required>
                                        <span class="helper-text"><?php echo form_error('notes_subject'); ?></span>
                                    </div>
                                </div>
                                <!-- jQueryCheckbox -->
                                <div class="col-12">
                                    <div class="form-group position-relative">
                                        <label>Visibility</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1"
                                                name="notes_hide_cl" >
                                            <label class="custom-control-label" for="customCheck1">Hidden from client</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2"
                                                name="notes_hide_app" >
                                            <label class="custom-control-label" for="customCheck2">Hidden from appraiser</label>
                                        </div>                                    
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Notes</label>
                                        <textarea  class="form-control" name="notes_txt" placeholder="Enter Notes" rows="2" cols="50" required></textarea>                                    
                                        <span class="helper-text"><?php echo form_error('notes_txt'); ?></span>
                                    </div>
                                </div>

                            </div>
                               <!-- Row -->
                                <button type="submit" class="btn btn-primary mb-0">Submit</button>
                            </form>
                        </div>
                    </div><!-- card mb-4 End -->




                    <div class="card mb-4" id="note_table">
                        <div class="card-body">
                            <h5 class="mb-4" style="display: inline;">List of Notes</h5>
                            <div class="top-right-button-container">
                                <div class="btn-group">
                                    <button class="btn btn-outline-primary btn-lg dropdown-toggle" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        EXPORT
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" id="dataTablesExcel" href="#">Excel</a>
                                        <a class="dropdown-item" id="dataTablesCsv" href="#">Csv</a>
                                        <a class="dropdown-item" id="dataTablesPdf" href="#">Pdf</a>
                                    </div>
                                </div>
                            </div>
                            <br><br><br><br>

                            <!-- data-table Table_status -->
                            <table id="Table_notes" class="responsive">
                                <thead>
                                    <tr>
                                        <th>Notes Id</th>
                                        <th>Date Time</th>
                                        <th>Author</th>
                                        <th>Subject</th>
                                        <th>Notes</th> 
                                        <th>Hide From Appraiser</th>                                       
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php 
                                    foreach ($notes as $n) {
                                        
                                        ?>
                                        <tr>
                                        <td><?php echo $n->notes_id; ?></td>
                                        <td><?php echo $n->date; ?></td>
                                        <td><?php echo $n->user_username; ?></td>
                                        <td><?php echo $n->subject; ?></td>
                                        <td><?php echo $n->notes; ?></td>  
                                        <td><?php echo $n->hide_appraiser; ?></td>  
                                        <!--<td><div class="form-group position-relative"><div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="chkbox<?php echo $n->notes_id; ?>" <?php echo ( $n->hide_appraiser == 'on' ) ?  'Checked' :  ''; ?>>
                                        </div></div>
                                        </td>-->
                                                                                      
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModalNotes<?php echo $n->notes_id; ?>">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModalNotes<?php echo $n->notes_id; ?>">Delete</button> </td>
                                    </tr> 


                                    <div id="editModalNotes<?php echo $n->notes_id; ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Notes</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo base_url(); ?>Notes/update/<?php echo $n->notes_id; ?>" method="post">
                                                    <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <p>Name:</p>
                                                                        <label><?php echo $n->date; ?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <p>Author:</p>
                                                                        <label><?php echo $n->user_username; ?></label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>Subject</label>
                                                                        <input type="text" class="form-control" name="upd_notes_subject" value="<?php echo $n->subject; ?>" placeholder="Enter Notes Subject" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group position-relative">
                                                                        <label>Visibility</label>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="customCheck3"
                                                                                name="upd_notes_hide_cl"  <?php echo ( $n->hide_client == 'on' ) ?  'Checked' :  ''; ?>>
                                                                            <label class="custom-control-label" for="customCheck3">Hidden from client</label>
                                                                        </div>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="customCheck4"
                                                                                name="upd_notes_hide_app" <?php echo ( $n->hide_appraiser == 'on' ) ?  'Checked' :  ''; ?>>
                                                                            <label class="custom-control-label" for="customCheck4">Hidden from appraiser</label>
                                                                        </div>                                    
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>Notes</label>
                                                                        <textarea class="form-control" name="upd_notes_txt" placeholder="Enter Notes" rows="2" cols="50"><?php echo $n->notes; ?></textarea>                                    
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            
                                                        <button type="submit" class="btn btn-primary mb-0">Edit</button>
                                                        <button type="button" class="btn btn-grey" data-dismiss="modal">Cancel</button>
                                                    </form>
                                                </div>

                                            </div>

                                        </div>
                                     </div>

                                        <div id="deleteModalNotes<?php echo $n->notes_id; ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-body text-center">
                                                    <form method="post" action="<?php echo base_url(); ?>Notes/delete/<?php echo $n->notes_id; ?>">
                                                            <p>Are you Sure You want to Delete this item?</p>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                            <button type="button" class="btn btn-grey" data-dismiss="modal">Cancel</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--- Table end -->




                          


                </div>
            </div>
            <!--Row end-->
        </div>
    </main>




    <!-- Modal -->

    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body text-center">

                <form method="post" action="<?php echo base_url(); ?>Order/delete/<?php echo $order_single->order_number; ?>">
                    <p>Are you Sure You want to Delete this item?</p>
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-grey" data-dismiss="modal">Cancel</button>
                </form>
                    
                </div>
            </div>
        </div>
    </div>



    <!-- Modal End -->

    <!-- Footer -->

    <?php include_once('footer.php'); ?>

    <!-- Footer End -->


    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/select2.full.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/datatables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap-datepicker.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/vendor/mousetrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dore.script.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>

    <script>


function hitFile(para,para2){
    // console.log("File Hitted -> ", para);
    $("#"+ para2).hide();
    str = $("input[name=upd_old_file]").val();

    // console.log("Before -> ", str);

    if(str.indexOf(para+"|") != -1){
        str = str.replace(para+"|", '');
    }else{
        str = str.replace(para, '');
    }


    if(str.charAt(str.length-1) == '|')
    {
        str=str.substring(0, str.length - 1)
    }

    // console.log("After -> ", str);

    $("input[name=upd_old_file]").val(str);
    
    

//     var string = 'F0123456'; 
// string.replace(/^F0+/i, ''); '123456'
}
function file_change(){
    // <input type="file" name="of_contract[]" id="f_contract" multiple style="display:none;">
    // <input type="file" name="of_option[]" id="f_option" multiple  style="display:none;">
    // <input type="file" name="of_comparable[]" id="f_comparable" multiple style="display:none;">
    // <input type="file" name="of_plat[]" id="" multiple style="display:none;">
    // <input type="file" name="of_plan[]" id="" multiple style="display:none;">
    // <input type="file" name="of_condo[]" id="" multiple style="display:none;">
    // <input type="file" name="of_adu[]" id="" multiple style="display:none;">
    // <input type="file" name="of_photo[]" id="f_photo" multiple style="display:none;">
    // <input type="file" name="of_client[]" id="f_client" multiple style="display:none;">
    // "","","","",""

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
    amc_id = $("select[name=upd_order_client_id]").find(':selected').data('amc-id');
    amc_name = $("select[name=upd_order_client_id]").find(':selected').data('amc-name');
    website = $("select[name=upd_order_client_id]").find(':selected').data('website');
    phone = $("select[name=upd_order_client_id]").find(':selected').data('phone');
    email = $("select[name=upd_order_client_id]").find(':selected').data('email');
    ins = $("select[name=upd_order_client_id]").find(':selected').data('ins');
    
    
    // $("input[name=upd_order_cl_ins]").val(ins);

    

$("input[name=upd_order_amc]").val(amc_name);
$("input[name=upd_order_website]").val(website);
$("input[name=upd_order_phone]").val(phone);
$("input[name=upd_order_cl_email]").val(email);


}


function loantypeChange(){
    desc = $("select[name=upd_order_loan_type]").find(':selected').data('desc');
    console.log(desc);
    $("#loantypeModal").modal();
    $("#loanTypeDesc").html(desc);
    
    // $("input[name=upd_order_appraiser_email]").val(email);
}

function appraiserChange(){
    email = $("select[name=upd_order_appraiser_id]").find(':selected').data('email');
    $("input[name=upd_order_appraiser_email]").val(email);
}

        var $Table_notes = $("#Table_notes").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
            "columns": [
                { "data": "notes_id" },
                { "data": "date_time" },
                { "data": "author" },
                { "data": "subject" },
                { "data": "notes" },  
                { "data": "hide_appraiser" },                 
                { "data": "action" }
            ],
            drawCallback: function () {
                $($(".dataTables_wrapper .pagination li:first-of-type"))
                    .find("a")
                    .addClass("prev");
                $($(".dataTables_wrapper .pagination li:last-of-type"))
                    .find("a")
                    .addClass("next");

                $(".dataTables_wrapper .pagination").addClass("pagination-sm");
            },
            language: {
                paginate: {
                    previous: "<i class='simple-icon-arrow-left'></i>",
                    next: "<i class='simple-icon-arrow-right'></i>"
                },
                search: "_INPUT_",
                searchPlaceholder: "Search...",
                lengthMenu: "Items Per Page _MENU_"
            },
            buttons: [
                'excel',
                'csv',
                'pdf'
            ]
        });
        $("#dataTablesExcel").on("click", function (event) {
            event.preventDefault();
            $Table_notes.buttons(0).trigger();
        });
        $("#dataTablesCsv").on("click", function (event) {
            event.preventDefault();
            $Table_notes.buttons(1).trigger();
        });
        $("#dataTablesPdf").on("click", function (event) {
            event.preventDefault();
            $Table_notes.buttons(2).trigger();
        });



        

        $("#new_notes").hide();
            $("#note_table").hide();
        function edit_file_collapse(){
            $("#edit_file").show();
            $("#new_notes").hide();
            $("#note_table").hide();
        }

        function edit_loan_collapse(){
            $("#edit_file").hide();
            $("#new_notes").show();
            $("#note_table").show();
        }

    </script>
    
</body>

</html>