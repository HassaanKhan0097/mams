<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>New File</title>
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
                    <h1>New File</h1>
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">

                <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4">Previous files numbers used:</h5>

                            <div class="dropdown d-inline-block">
                                <button class="btn btn-outline-primary dropdown-toggle mb-1" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    File Number
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">98765</a>
                                    <a class="dropdown-item" href="#">12345</a>
                                    <a class="dropdown-item" href="#">45678</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- File number Dropdown -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4">New File</h5>
                            <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-4">
                                <div class="form-group">
                                        <label>File Number*</label>
                                        <input type="text" class="form-control" name="file_address" placeholder="Enter File Numbers" >
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Property Address*</label>
                                        <input type="text" class="form-control" name="file_address" placeholder="Enter Property Address" >
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Order Type*</label>
                                        <select class="form-control select2-single" data-width="100%">
                                            <option value=""></option>
                                            <option value="1">Type 1</option>
                                            <option value="2">Type 2</option>
                                            <option value="3">Type 3</option>
                                        </select>                                    
                                    </div>
                                </div>

                                <!-- Col 12 end 1-->

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Loan Number</label>
                                        <input type="number" class="form-control" name="file_Loan" placeholder="Enter Loan Number" >
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>City</label>
                                        <select class="form-control select2-single" data-width="100%">
                                            <option value=""></option>
                                            <option value="1">Chicago</option>
                                            <option value="2">New York</option>
                                            <option value="3">Los Angeles</option>
                                        </select>                                    
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Assignment Type*</label>
                                        <select class="form-control select2-single" data-width="100%">
                                            <option value=""></option>
                                            <option value="1">Desk Review</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>                                    
                                    </div>
                                </div>
                                
                                <!-- Col 12 end 2-->


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>FHA/VA Case #</label>
                                        <input type="number" class="form-control" name="file_fha" placeholder="Enter FHA VA Case" >
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>State*</label>
                                        <select class="form-control select2-single" data-width="100%">
                                            <option value=""></option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>                                    
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Order Status*</label>
                                        <select class="form-control select2-single" data-width="100%">
                                            <option value=""></option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>                                    
                                    </div>
                                </div>
                                
                                <!-- Col 12 end 3-->


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Client Name*</label>
                                        <select class="form-control select2-single" data-width="100%">
                                            <option value=""></option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>                                    
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Zip Code*</label>
                                        <input type="number" class="form-control" name="file_zipcode" placeholder="Enter Zip Code" >
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Action Required</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="customRadio"
                                                class="custom-control-input" required>
                                            <label class="custom-control-label" for="customRadio1">No</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="customRadio"
                                                class="custom-control-input" required>
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
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select class="form-control select2-single" data-width="100%">
                                            <option value=""></option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>                                    
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group mb-1">
                                        <label>Order Date*</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control">
                                            <span class="input-group-text input-group-append input-group-addon">
                                                <i class="simple-icon-calendar"></i>
                                            </span>
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
                                        <input type="text" class="form-control" name="file_borrower" placeholder="Enter Borrower" >
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group mb-1">
                                        <label>Due Date*</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control">
                                            <span class="input-group-text input-group-append input-group-addon">
                                                <i class="simple-icon-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>



                                <!-- Col 12 end 6-->

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Sub Client Name</label>
                                        <input type="text" class="form-control" name="file_sub_clientname" placeholder="Enter Sub Client Name" >
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Entry Contact*</label>
                                        <input type="text" class="form-control" name="file_entry" placeholder="Enter Entry Contact" >
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group mb-1">
                                        <label>Appointment Date</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control">
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
                                        <select class="form-control select2-single" data-width="100%">
                                            <option value=""></option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>                                    
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="file_phone1" placeholder="Enter Phone 1" >
                                    </div>
                                </div>
                                

                                <div class="col-sm-4">
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
                                </div>


                                <!-- Col 12 end 8 Appraiser Name 	-->


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Sup Appraiser Name*</label>
                                        <select class="form-control select2-single" data-width="100%">
                                            <option value=""></option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>                                    
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="file_phone2" placeholder="Enter Phone" >
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Complete Date</label>
                                        <input type="text" class="form-control" name="file_completeDate" placeholder="Enter Complete Date" >
                                    </div>
                                </div>


                                <!-- Col 12 end 9 Sup Appraiser Name*		-->




                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Payment Method*</label>
                                        <select class="form-control select2-single" data-width="100%">
                                            <option value=""></option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>                                    
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="file_phone3" placeholder="Enter Phone" >
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Purchase Price</label>
                                        <input type="text" class="form-control" name="file_purchase_price" placeholder="Enter Purchase Price" >
                                    </div>
                                </div>


                                <!-- Col 12 end 10	Payment Method*	-->

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Revenue*</label>
                                        <input type="text" class="form-control" name="file_revenue" placeholder="Enter Revenue" >
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Expense*</label>
                                        <input type="text" class="form-control" name="file_expense" placeholder="Enter Expense" >
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" class="form-control" name="file_phone2" placeholder="Enter Website" >
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Special instructions</label>
                                        <textarea  class="form-control" name="file_ins" placeholder="Enter Special Instruction" rows="2" cols="50"></textarea>                                    
                                    </div>
                                </div>

                                <div class="col-sm-12 mb-4">
                                    
                                        <!-- <div class="card-body"> -->
                                            <h5 class="mb-4">Attach File</h5>
                                            <form action="#">
                                                <div class="dropzone">
                                                </div>
                                            </form>
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
       
    </script>
</body>

</html>