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
                                        foreach($previous_order_numbers as $pon) { ?>

                                            <a class="dropdown-item" href="#"><?php echo $pon->order_number; ?></a>

                                        <?php } ?>

                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- File number Dropdown -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4">New Order</h5>
                            <form action="<?php echo base_url(); ?>order/create_order" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-4">
                                <div class="form-group">
                                        <label>Order Number*</label>
                                        <input type="text" class="form-control" name="order_number" placeholder="Enter Order Numbers" required>
                                        <span class="helper-text"><?php echo form_error('order_number'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Property Address*</label>
                                        <input type="text" class="form-control" name="order_address" placeholder="Enter Property Address" required>
                                        <span class="helper-text"><?php echo form_error('order_address'); ?></span>
                                    </div>
                                </div>


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
                                </div>

                                <!-- Col 12 end 1-->

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Loan Number</label>
                                        <input type="number" class="form-control" name="order_loan_number" placeholder="Enter Loan Number" >
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>City</label>
                                        <select class="form-control select2-single" data-width="100%" name="order_city_id">
                                            <option value=""></option>
                                            <?php
                                            foreach($city_list as $city){
                                            ?>                                            
                                            <option value="<?php echo $city->city_id ?>"><?php echo $city->city_name ?></option>
                                            <?php } ?>
                                        </select>                                    
                                    </div>
                                </div>


                                <div class="col-sm-4">
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
                                </div>

                                <div class="col-sm-4">
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
                                </div>
                                
                                <!-- Col 12 end 2-->


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>FHA/VA Case #</label>
                                        <input type="number" class="form-control" name="order_case_number" placeholder="Enter FHA VA Case" >
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>State*</label>
                                        <select class="form-control select2-single" data-width="100%" name="order_state" required>
                                            <option value=""></option>
                                            <option value="California">California</option>
                                            <option value="Alaska">Alaska</option>
                                            <option value="Florida">Florida</option>
                                            <option value="Texas">Texas</option>
                                            <option value="New Mexico">New Mexico</option>
                                            <option value="Pennsylvania">Pennsylvania</option>
                                            <option value="Wyoming">Wyoming</option>
                                            <option value="Hawaii">Hawaii</option>
                                            <option value="Oregon">Oregon</option>
                                            <option value="Colorado">Colorado</option>
                                            <option value="Delaware">Delaware</option>
                                            <option value="Maryland">Maryland</option>
                                            <option value="Massachusetts">Massachusetts</option>
                                            <option value="Connecticut">Connecticut</option>
                                            <option value="Louisiana">Louisiana</option>
                                            <option value="Illinois">Illinois</option>
                                            <option value="Vermont">Vermont</option>
                                            <option value="New Hampshire">New Hampshire</option>
                                            <option value="South Dakota">South Dakota</option>
                                            <option value="Maine">Maine</option>
                                            <option value="Nevada">Nevada</option>
                                            <option value="Montana">Montana</option>
                                            <option value="Wisconsin">Wisconsin</option>
                                            <option value="Kentucky">Kentucky</option>
                                            <option value="Rhode Island">Rhode Island</option>
                                            <option value="Minnesota">Minnesota</option>
                                            <option value="New Jersey">New Jersey</option>
                                            <option value="Nebraska">Nebraska</option>
                                            <option value="Arizona">Arizona</option>
                                            <option value="Arkansas">Arkansas</option>
                                            <option value="Kansas">Kansas</option>
                                            <option value="South Carolina">South Carolina</option>
                                            <option value="Idaho">Idaho</option>
                                            <option value="Utah">Utah</option>
                                            <option value="Tennessee">Tennessee</option>
                                            <option value="Michigan">Michigan</option>
                                            <option value="North Carolina">North Carolina</option>
                                            <option value="North Dakota">North Dakota</option>
                                            <option value="Virginia">Virginia</option>
                                            <option value="West Virginia">West Virginia</option>
                                            <option value="Oklahoma">Oklahoma</option>
                                            <option value="Alabama">Alabama</option>
                                            <option value="Iowa">Iowa</option>
                                            <option value="Indiana">Indiana</option>
                                            <option value="Ohio">Ohio</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Washington">Washington</option>
                                            <option value="New York">New York </option>
                                            <option value="Missouri">Missouri</option>
                                            <option value="Mississippi">Mississippi</option>
                                        </select>   
                                        <span class="helper-text"><?php echo form_error('order_state'); ?></span>                                 
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Order Status*</label>
                                        <select class="form-control select2-single" data-width="100%" name="order_status_id" required>
                                            <option value=""></option>
                                            <?php
                                            foreach($status_info_list as $status){
                                            ?>                                            
                                            <option value="<?php echo $status->st_id ?>"><?php echo $status->st_name ?></option>
                                            <?php } ?>
                                        </select>  
                                        <span class="helper-text"><?php echo form_error('order_status_id'); ?></span>                                  
                                    </div>
                                </div>
                                
                                <!-- Col 12 end 3-->


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Client Name*</label>
                                        <select class="form-control select2-single" data-width="100%" name="order_client_id" required>
                                            <option value=""></option>
                                            <?php
                                            foreach($client_list as $cl){
                                            ?>                                            
                                            <option data-amc="<?php echo $cl->cl_amc ?>" data-website="<?php echo $cl->cl_website ?>" value="<?php echo $cl->cl_id ?>"><?php echo $cl->cl_name ?></option>
                                            <?php } ?>
                                        </select>       
                                        <span class="helper-text"><?php echo form_error('order_client_id'); ?></span>                                   
                                    </div>
                                </div>

                                <div class="col-sm-4">
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
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>AMC</label>
                                        <select class="form-control select2-single" data-width="100%" name="order_amc">
                                            <option value=""></option>
                                            <option value="AMC" >AMC</option>
                                            <option value="No AMC">No AMC</option>                                            
                                        </select>                                    
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" class="form-control" name="order_website" placeholder="Enter Website" >
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Zip Code*</label>
                                        <input type="number" class="form-control" name="order_zipcode" placeholder="Enter Zip Code" required >
                                        <span class="helper-text"><?php echo form_error('order_zipcode'); ?></span>    
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Action Required</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="order_action"
                                                class="custom-control-input" value="No" required>
                                            <label class="custom-control-label" for="customRadio1">No</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="order_action"
                                                class="custom-control-input" value="Yes" required>
                                            <label class="custom-control-label" for="customRadio2">Yes</label>
                                        </div>
                                        
                                    </div>
                                </div>


                                <!-- Col 12 end 4-->

                                <!-- <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Loan Officer	</label>
                                        <select class="form-control select2-single" data-width="100%">
                                            <option value=""></option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>                                    
                                    </div>
                                </div> -->

                                <div class="col-sm-4">
                                    <div class="form-group mb-1">
                                        <label>Order Date*</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" name="order_date" required>
                                            <span class="input-group-text input-group-append input-group-addon">
                                                <i class="simple-icon-calendar"></i>
                                            </span>
                                            <span class="helper-text"><?php echo form_error('order_date'); ?></span>    
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
                                        <label>Borrower</label>
                                        <input type="text" class="form-control" name="order_borrower" placeholder="Enter Borrower" >
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Co Borrower</label>
                                        <input type="text" class="form-control" name="order_co_borrower" placeholder="Enter Co Borrower" >
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group mb-1">
                                        <label>Due Date</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" name="order_duedate">
                                            <span class="input-group-text input-group-append input-group-addon">
                                                <i class="simple-icon-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>



                                <!-- Col 12 end 6-->

                                

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Entry Contact</label>
                                        <input type="text" class="form-control" name="order_entry" placeholder="Enter Entry Contact" >
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group mb-1">
                                        <label>Appointment Date</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" name="order_appointmentdate">
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
                                        <select class="form-control select2-single" data-width="100%" name="order_appraiser_id" required>
                                            <option value=""></option>
                                            <?php
                                            foreach($appraiser_list as $app){
                                            ?>                                            
                                            <option data-email="<?php echo $app->app_email ?>" value="<?php echo $app->app_id ?>"><?php echo $app->app_name ?></option>
                                            <?php } ?>
                                            
                                        </select>        
                                        <span class="helper-text"><?php echo form_error('order_appraiser_id'); ?></span>                                
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Sup Appraiser Name</label>
                                        <select class="form-control select2-single" data-width="100%" name="order_appraiser_id2">
                                            <option value=""></option>
                                            <?php
                                            foreach($appraiser_list as $app){
                                            ?>                                            
                                            <option value="<?php echo $app->app_id ?>"><?php echo $app->app_name ?></option>
                                            <?php } ?>
                                        </select>                                    
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Appraiser Email</label>
                                        <input type="text" class="form-control" name="order_appraiser_email" placeholder="Enter Email" >
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Appraiser Email 2</label>
                                        <input type="text" class="form-control" name="order_appraiser_email2" placeholder="Enter Email 2" >
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="order_phone" placeholder="Enter Phone 1" >
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Phone 2</label>
                                        <input type="text" class="form-control" name="order_phone2" placeholder="Enter Phone" >
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Phone 3</label>
                                        <input type="text" class="form-control" name="order_phone3" placeholder="Enter Phone" >
                                    </div>
                                </div>
                                

                                <!-- <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Appointment Time</label>
                                        <select class="form-control select2-single" data-width="100%">
                                            <option value=""></option>
                                            <option value="1">11:00</option>
                                            <option value="2">11:15</option>
                                            <option value="3">11:30</option>
                                            <option value="4">11:45</option>
                                            <option value="5">12:00</option>
                                        </select>                                    
                                    </div>
                                </div> -->

                                <div class="col-sm-4">
                                <div class="form-group ">
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
                                </div>


                                <!-- Col 12 end 8 Appraiser Name 	-->


                                


                             


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Complete Date</label>
                                        <input type="text" class="form-control" name="order_completedate" placeholder="Enter Complete Date" >
                                    </div>
                                </div>


                                <!-- Col 12 end 9 Sup Appraiser Name*		-->




                                <div class="col-sm-4">
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


                                


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Purchase Price</label>
                                        <input type="text" class="form-control" name="order_purchase" placeholder="Enter Purchase Price" >
                                    </div>
                                </div>


                                <!-- Col 12 end 10	Payment Method*	-->

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Revenue</label>
                                        <input type="text" class="form-control" name="order_revenue" placeholder="Enter Revenue" >
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Expense</label>
                                        <input type="text" class="form-control" name="order_expense" placeholder="Enter Expense" >
                                    </div>
                                </div>

                                

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
                                                        <input type="file" name="order_file" id="inputGroupFile01">
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
    <script src="<?php echo base_url(); ?>assets/js/vendor/select2.full.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/mousetrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/dropzone.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dore.script.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>

    <script>

$("#select-test").select2();

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