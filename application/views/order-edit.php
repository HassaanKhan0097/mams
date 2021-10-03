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
                            <form action="<?php echo base_url(); ?>Order/update_order/<?php echo $order_single->order_number; ?>" method="post">
                            <div class="row">

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Order Number*</label>
                                        <input readonly type="text" class="form-control" name="upd_order_number" placeholder="Enter Property Address" value="<?php echo $order_single->order_number ?>">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Property Address*</label>
                                        <input type="text" class="form-control" name="upd_order_address" placeholder="Enter Property Address" value="<?php echo $order_single->order_address ?>">
                                        <span class="helper-text"><?php echo form_error('upd_order_address'); ?></span>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Order Type*</label>
                                        <select class="form-control select2-single" data-width="100%" name="upd_order_type_id">
                                            <option value=""></option>
                                            <?php
                                            foreach ($order_types_list as $ol) { ?>                                             
                                                <option value="<?php echo $ol->order_id; ?>" <?php echo ( $order_single->order_type_id ==  $ol->order_id) ?  'Selected' :  ''; ?>><?php echo $ol->order_name; ?></option>
                                            <?php } ?>
                                        </select>   
                                        <span class="helper-text"><?php echo form_error('upd_order_type_id'); ?></span>                                 
                                    </div>
                                </div>

                                <!-- Col 12 end 1-->

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Loan Number</label>
                                        <input type="number" class="form-control" name="upd_order_loan_number" placeholder="Enter Loan Number" value="<?php echo $order_single->order_loan_number ?>">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" name="upd_order_city" placeholder="Enter City" value="<?php echo $order_single->order_city ?>">
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Assignment Type*</label>
                                        <select class="form-control select2-single" data-width="100%" name="upd_order_assignment_id">
                                            <option value=""></option>
                                            <?php
                                            foreach ($assignment_types_list as $at) { ?>                                             
                                                <option value="<?php echo $at->at_id; ?>" <?php echo ( $order_single->order_assignment_id ==  $at->at_id) ?  'Selected' :  ''; ?>><?php echo $at->at_name; ?></option>
                                            <?php } ?>
                                        </select> 
                                        <span class="helper-text"><?php echo form_error('upd_order_assignment_id'); ?></span>                                     
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Sub Assignment Type</label>
                                        <select class="form-control select2-single" data-width="100%" name="upd_order_assignment_id2">
                                            <option value=""></option>
                                            <?php
                                            foreach ($assignment_types_list as $at) { ?>                                             
                                                <option value="<?php echo $at->at_id; ?>" <?php echo ( $order_single->order_assignment_id2 ==  $at->at_id) ?  'Selected' :  ''; ?>><?php echo $at->at_name; ?></option>
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
                                            foreach ($assignment_types_list as $at) { ?>                                             
                                                <option value="<?php echo $at->at_id; ?>" <?php echo ( $order_single->order_assignment_id3 ==  $at->at_id) ?  'Selected' :  ''; ?>><?php echo $at->at_name; ?></option>
                                            <?php } ?>
                                        </select>                                    
                                    </div>
                                </div>
                                
                                <!-- Col 12 end 2-->


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>FHA/VA Case #</label>
                                        <input type="number" class="form-control" name="upd_order_case_number" placeholder="Enter FHA VA Case" value="<?php echo $order_single->order_case_number ?>">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>State*</label>
                                        <select class="form-control select2-single" data-width="100%" name="upd_order_state">
                                            <option value=""></option>
                                            <option value="Virginia" <?php echo ( $order_single->order_state == 'Virginia') ?  'Selected' :  ''; ?>>Virginia</option>
                                            <option value="Maryland" <?php echo ( $order_single->order_state == 'Maryland') ?  'Selected' :  ''; ?>>Maryland</option>                                            
                                            <option value="District of Columbia" <?php echo ( $order_single->order_state == 'District of Columbia') ?  'Selected' :  ''; ?>>District of Columbia</option>
                                            <option value="West Virginia" <?php echo ( $order_single->order_state == 'West Virginia') ?  'Selected' :  ''; ?>>West Virginia</option>
                                            <option value="Michigan" <?php echo ( $order_single->order_state == 'Michigan') ?  'Selected' :  ''; ?>>Michigan</option>
                                        </select>  
                                        <span class="helper-text"><?php echo form_error('upd_order_state'); ?></span>                                     
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Order Status*</label>
                                        <select class="form-control select2-single" data-width="100%" name="upd_order_status_id">
                                            <option value=""></option>
                                            <?php
                                            foreach ($status_info_list as $status) { ?>                                             
                                                <option value="<?php echo $status->st_id; ?>" <?php echo ( $order_single->order_status_id ==  $status->st_id) ?  'Selected' :  ''; ?>><?php echo $status->st_name; ?></option>
                                            <?php } ?>
                                        </select>     
                                        <span class="helper-text"><?php echo form_error('upd_order_status_id'); ?></span>                                 
                                    </div>
                                </div>
                                
                                <!-- Col 12 end 3-->


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Client Name*</label>
                                        <select class="form-control select2-single" data-width="100%" name="upd_order_client_id">
                                            <option value=""></option>
                                            <?php
                                            foreach ($client_list as $cl) { ?>                                             
                                                <option value="<?php echo $cl->cl_id; ?>" <?php echo ( $order_single->order_client_id ==  $cl->cl_id) ?  'Selected' :  ''; ?>><?php echo $cl->cl_name; ?></option>
                                            <?php } ?>
                                        </select>  
                                        <span class="helper-text"><?php echo form_error('upd_order_client_id'); ?></span>                                   
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Sub Client Name*</label>
                                        <select class="form-control select2-single" data-width="100%" name="upd_order_client_id2">
                                            <option value=""></option>
                                            <?php
                                            foreach ($client_list as $cl) { ?>                                             
                                                <option value="<?php echo $cl->cl_id; ?>" <?php echo ( $order_single->order_client_id2 ==  $cl->cl_id) ?  'Selected' :  ''; ?>><?php echo $cl->cl_name; ?></option>
                                            <?php } ?>
                                        </select>                                    
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>AMC</label>
                                        <select class="form-control select2-single" data-width="100%" name="upd_order_amc">
                                            <option value=""></option>
                                            <option value="AMC" <?php echo ( $order_single->order_amc == 'AMC') ?  'Selected' :  ''; ?>>AMC</option>
                                            <option value="No AMC" <?php echo ( $order_single->order_amc == 'No AMC') ?  'Selected' :  ''; ?>>No AMC</option>                                            
                                        </select>                                    
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" class="form-control" name="upd_order_website" placeholder="Enter Website" value="<?php echo $order_single->order_website ?>">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Zip Code*</label>
                                        <input type="number" class="form-control" name="upd_order_zipcode" placeholder="Enter Zip Code" value="<?php echo $order_single->order_zipcode ?>">
                                        <span class="helper-text"><?php echo form_error('upd_order_zipcode'); ?></span>   
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Action Required</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="upd_order_action"
                                                class="custom-control-input" value="No">
                                            <label class="custom-control-label" for="customRadio1">No</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input checked type="radio" id="customRadio2" name="upd_order_action"
                                                class="custom-control-input" value="Yes">
                                            <label class="custom-control-label" for="customRadio2">Yes</label>
                                        </div>
                                        
                                    </div>
                                </div>


                                <!-- Col 12 end 4-->

                                
                                <div class="col-sm-4">
                                    <div class="form-group mb-1">
                                        <label>Order Date*</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" value="<?php echo $order_single->order_date ?>" name="upd_order_date">
                                            <span class="input-group-text input-group-append input-group-addon">
                                                <i class="simple-icon-calendar"></i>
                                            </span>
                                            <span class="helper-text"><?php echo form_error('upd_order_date'); ?></span> 
                                        </div>
                                    </div>
                                </div>

                                <!-- Col 12 end 5-->


                                <!-- <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Processor</label>
                                        <select class="form-control select2-single" data-width="100%">
                                            <option value=""></option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>                                    
                                    </div>
                                </div> -->

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Borrower*</label>
                                        <input type="text" class="form-control" name="upd_order_borrower" placeholder="Enter Borrower" value="<?php echo $order_single->order_borrower ?>">
                                        <span class="helper-text"><?php echo form_error('upd_order_borrower'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Co Borrower</label>
                                        <input type="text" class="form-control" name="upd_order_co_borrower" placeholder="Enter Co Borrower" value="<?php echo $order_single->order_co_borrower ?>">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group mb-1">
                                        <label>Due Date*</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" value="<?php echo $order_single->order_duedate ?>" name="upd_order_duedate">
                                            <span class="input-group-text input-group-append input-group-addon">
                                                <i class="simple-icon-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>



                                <!-- Col 12 end 6-->

                                

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Entry Contact*</label>
                                        <input type="text" class="form-control" name="upd_order_entry" placeholder="Enter Entry Contact" value="<?php echo $order_single->order_entry ?>">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group mb-1">
                                        <label>Appointment Date</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" value="<?php echo $order_single->order_appointmentdate ?>" name="upd_order_appointmentdate">
                                            <span class="input-group-text input-group-append input-group-addon">
                                                <i class="simple-icon-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Col 12 end 7-->

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Appraiser Name* </label>
                                        <select class="form-control select2-single" data-width="100%" name="upd_order_appraiser_id">
                                            <option value=""></option>
                                            <?php
                                            foreach ($appraiser_list as $app) { ?>                                             
                                                <option value="<?php echo $app->app_id; ?>" <?php echo ( $order_single->order_appraiser_id ==  $app->app_id) ?  'Selected' :  ''; ?>><?php echo $app->app_name; ?></option>
                                            <?php } ?>
                                        </select> 
                                        <span class="helper-text"><?php echo form_error('upd_order_appraiser_id'); ?></span>                                   
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Sub Appraiser Name*</label>
                                        <select class="form-control select2-single" data-width="100%" name="upd_order_appraiser_id2">
                                            <option value=""></option>
                                            <?php
                                            foreach ($appraiser_list as $app) { ?>                                             
                                                <option value="<?php echo $app->app_id; ?>" <?php echo ( $order_single->order_appraiser_id2 ==  $app->app_id) ?  'Selected' :  ''; ?>><?php echo $app->app_name; ?></option>
                                            <?php } ?>
                                        </select>   
                                        <span class="helper-text"><?php echo form_error('upd_order_appraiser_id2'); ?></span>                                 
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Appraiser Email</label>
                                        <input type="text" class="form-control" name="upd_order_appraiser_email" placeholder="Enter Email" value="<?php echo $order_single->order_appraiser_email ?>">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Appraiser Email 2</label>
                                        <input type="text" class="form-control" name="upd_order_appraiser_email2" placeholder="Enter Email 2" value="<?php echo $order_single->order_appraiser_email2 ?>">
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="upd_order_phone" placeholder="Enter Phone 1" value="<?php echo $order_single->order_phone ?>">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Phone 2</label>
                                        <input type="text" class="form-control" name="upd_order_phone2" placeholder="Enter Phone" value="<?php echo $order_single->order_phone2 ?>">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Phone 3</label>
                                        <input type="text" class="form-control" name="upd_order_phone3" placeholder="Enter Phone" value="<?php echo $order_single->order_phone3 ?>">
                                    </div>
                                </div>
                                

                                <div class="col-sm-4">
                                <div class="form-group ">
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
                                </div>


                                <!-- Col 12 end 8 Appraiser Name 	-->


                                <div class="col-sm-4">
                                    <div class="form-group mb-1">
                                        <label>Complete Date</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" name="upd_order_completedate" value="<?php echo $order_single->order_completedate ?>">
                                            <span class="input-group-text input-group-append input-group-addon">
                                                <i class="simple-icon-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>


                                <!-- Col 12 end 9 Sup Appraiser Name*		-->




                                <div class="col-sm-4">
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
                                </div>



                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Purchase Price</label>
                                        <input type="text" class="form-control" name="upd_order_purchase" placeholder="Enter Purchase Price" value="<?php echo $order_single->order_purchase ?>">
                                    </div>
                                </div>


                                <!-- Col 12 end 10	Payment Method*	-->

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Revenue*</label>
                                        <input type="text" class="form-control" name="upd_order_revenue" placeholder="Enter Revenue" value="<?php echo $order_single->order_revenue ?>">
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Expense*</label>
                                        <input type="text" class="form-control" name="upd_order_expense" placeholder="Enter Expense" value="<?php echo $order_single->order_expense ?>">
                                    </div>
                                </div>


                                <div class="col-sm-4"></div>


                                <!-- Col 12 end 11		-->



                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Special instructions</label>
                                        <textarea  class="form-control" name="upd_order_instruction" placeholder="Enter Special Instruction" rows="2" cols="50" ><?php echo $order_single->order_instruction ?></textarea>                                    
                                    </div>
                                </div>

                                <!-- Col 12 end 12		-->

                                <div class="col-sm-12 mb-4">
                                    <h5 class="mb-4">Attach File</h5>
                                    <?php 
                                        if($order_single->order_file != '') {
                                            $filesArray = unserialize($order_single->order_file);
                                            foreach ($filesArray as $file)
                                            { ?>
                                                <u> <i class="simple-icon-paper-clip"></i> <a href="<?php echo $this->config->item('upload_dir')."orders/".$file; ?>">Attached File</a></u><br/><br/>
                                            <?php }
                                        } else { ?> No file(s) attached. <?php }
                                    ?>
                                </div>




                    



                            </div><!-- Row end-->

                                
                                <button type="submit" class="btn btn-primary mb-0">Submit</button>
                            </form>
                        </div>
                    </div><!-- card mb-4 End -->



                    <div class="card mb-4" id="new_notes">
                        <div class="card-body">
                            <h5 class="mb-4">Add/Edit Notes</h5>
                            <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <p>Name:</p>
                                        <label>08/18/2021  3:58:30 AM</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <p>Author:</p>
                                        <label>office_user</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" class="form-control" name="notes_subject" placeholder="Enter Notes Subject" >
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group position-relative">
                                        <label>Visibility</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1"
                                                name="jQueryCheckbox" required>
                                            <label class="custom-control-label" for="customCheck1">Hidden from client</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2"
                                                name="jQueryCheckbox" required>
                                            <label class="custom-control-label" for="customCheck2">Hidden from appraiser</label>
                                        </div>                                    
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Notes</label>
                                        <textarea  class="form-control" name="notes_txt" placeholder="Enter Notes" rows="2" cols="50"></textarea>                                    
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
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>08/08/2003 | 4:23:29 AM</td>
                                        <td>OfficeStaff</td>
                                        <td>Original Order Notes</td>
                                        <td>Instructions To Appraiser</td>                                                                               
                                        <td><button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                                data-target="#editModal">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td>
                                    </tr>                                    
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
                    <p>Are you Sure You want to Delete this item?</p>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
                    <button type="button" class="btn btn-grey" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>



    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Status</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                    <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <p>Name:</p>
                                        <label>08/18/2021  3:58:30 AM</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <p>Author:</p>
                                        <label>office_user</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" class="form-control" name="notes_subject" placeholder="Enter Notes Subject" >
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group position-relative">
                                        <label>Visibility</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3"
                                                name="jQueryCheckbox" required>
                                            <label class="custom-control-label" for="customCheck3">Hidden from client</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck4"
                                                name="jQueryCheckbox" required>
                                            <label class="custom-control-label" for="customCheck4">Hidden from appraiser</label>
                                        </div>                                    
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Notes</label>
                                        <textarea  class="form-control" name="notes_txt" placeholder="Enter Notes" rows="2" cols="50"></textarea>                                    
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

    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p>Are you Sure You want to Delete this item?</p>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
                    <button type="button" class="btn btn-grey" data-dismiss="modal">Cancel</button>
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
        var $Table_notes = $("#Table_notes").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
            "columns": [
                { "data": "notes_id" },
                { "data": "date_time" },
                { "data": "author" },
                { "data": "subject" },
                { "data": "notes" },                
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