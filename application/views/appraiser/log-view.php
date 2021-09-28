<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Log Record</title>
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
                    <h1>Log Record</h1>
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
                            <button class="btn btn-primary mb-1 mr-2" type="button" onclick="order_record_collapse();">
                                Order Record
                            </button>
                            <button class="btn btn-primary mb-1" type="button" onclick="edit_loan_collapse();">
                                Add/Edit Notes
                            </button>
                    </div>
                

                    <div class="card mb-4" id="order_record">
                        <div class="card-body">
                            <h5 class="mb-4">Order Record</h5>
                            <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Order Number</label>
                                        <h4><?php echo $order_single->order_number;?></h4>                             
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Property Address</label>
                                        <h4><?php echo $order_single->order_address;?></h4>    
                                    
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Order Type</label>
                                        <h4><?php echo $order_single->order_name;?></h4>                                 
                                    </div>
                                </div>

                                <!-- Col 12 end 1-->

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Loan Number</label>
                                        <h4><?php echo $order_single->order_loan_number;?></h4>                                    
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>City</label>
                                        <h4><?php echo $order_single->city_name;?></h4>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Assignment Type</label>
                                        <h4><?php echo $order_single->at_name;?></h4>                                  
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Sub Assignment Type</label>
                                        <h4><?php echo $order_single->at2_name;?></h4>                                  
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Sub Assignment Type2</label>
                                        <h4><?php echo $order_single->at3_name;?></h4>                                  
                                    </div>
                                </div>
                                
                                <!-- Col 12 end 2-->


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>FHA/VA Case #</label>
                                        <h4><?php echo $order_single->order_case_number;?></h4>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>State</label>
                                        <h4><?php echo $order_single->order_state;?></h4>                                   
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Order Status</label>
                                        <h4><?php echo $order_single->st_name;?></h4>                                    
                                    </div>
                                </div>
                                
                                <!-- Col 12 end 3-->


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Client Name</label>
                                        <h4><?php echo $order_single->cl_name;?></h4>                                    
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Sub Client Name</label>
                                        <h4><?php echo $order_single->cl2_name;?></h4>                                    
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>AMC</label>
                                        <h4><?php echo $order_single->cl_amc;?></h4>                                    
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Website</label>
                                        <h4><?php echo $order_single->cl_website;?></h4>                                    
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Zip Code</label>
                                        <h4><?php echo $order_single->order_zipcode;?></h4>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Action Required</label>
                                        <h4><?php echo $order_single->order_action;?></h4>
                                        
                                    </div>
                                </div>


                                <!-- Col 12 end 4-->

                        


                                <div class="col-sm-4">
                                    <div class="form-group mb-1">
                                        <label>Order Date</label>
                                        <h4><?php echo $order_single->order_date;?></h4>
                                    </div>
                                </div>

                                <!-- Col 12 end 5-->


                               

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Borrower</label>
                                        <h4><?php echo $order_single->order_borrower;?></h4>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Co Borrower</label>
                                        <h4><?php echo $order_single->order_co_borrower;?></h4>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group mb-1">
                                        <label>Due Date</label>
                                        <h4><?php echo $order_single->order_duedate;?></h4>
                                       
                                    </div>
                                </div>



                                <!-- Col 12 end 6-->

                                

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Entry Contact</label>
                                        <h4><?php echo $order_single->order_entry;?></h4>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group mb-1">
                                        <label>Appointment Date</label>
                                        <h4><?php echo $order_single->order_appointmentdate;?></h4>
                                    </div>
                                </div>

                                <!-- Col 12 end 7-->

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Appraiser Name </label>
                                        <h4><?php echo $order_single->app_name;?></h4>                                
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Sup Appraiser Name </label>
                                        <h4><?php echo $order_single->app2_name;?></h4>                                
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Appraiser Email </label>
                                        <h4><?php echo $order_single->order_appraiser_email;?></h4>                                
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Appraiser Email 2 </label>
                                        <h4><?php echo $order_single->order_appraiser_email2;?></h4>                                
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <h4><?php echo $order_single->order_phone;?></h4>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Phone2</label>
                                        <h4><?php echo $order_single->order_phone2;?></h4>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Phone3</label>
                                        <h4><?php echo $order_single->order_phone3;?></h4>
                                    </div>
                                </div>

                                

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Appointment Time</label>
                                        <h4><?php echo $order_single->order_appointment_time;?></h4>                                 
                                    </div>
                                </div>


                                <!-- Col 12 end 8 Appraiser Name 	-->


                               


                                


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Complete Date</label>
                                        <h4><?php echo $order_single->order_completedate;?></h4>
                                    </div>
                                </div>


                                <!-- Col 12 end 9 Sup Appraiser Name		-->




                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Payment Method</label>
                                        <h4><?php echo $order_single->order_paymentmethod;?></h4>                                
                                    </div>
                                </div>


                              

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Purchase Price</label>
                                        <h4><?php echo $order_single->order_purchase;?></h4>
                                    </div>
                                </div>


                                <!-- Col 12 end 10	Payment Method	-->

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Revenue</label>
                                        <h4><?php echo $order_single->order_revenue;?></h4>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Expense</label>
                                        <h4><?php echo $order_single->order_expense;?></h4>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>File</label>
                                        <br>
                                        <?php

                                        if( $order_single->order_file == ''){
                                            echo "No File";
                                        }else{
                                            ?>
                                            
                                             
                                             <a href="<?php echo $this->config->item('upload_dir').$order_single->order_file;?>" target="_blank"><?php echo $order_single->order_file; ?></a>
                                            
                                            <?php
                                        }

                                        ?>


                                    </div>
                                </div>
                                

                        


                                <!-- Col 12 end 11		-->



                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Special instructions</label>
                                        <textarea  class="form-control" name="file_ins" placeholder="Enter Special Instruction" rows="2" cols="50"><?php echo $order_single->order_instruction;?></textarea>                                    
                                    </div>
                                </div>


                                

                                <!-- Col 12 end 12		-->




                    



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
        function order_record_collapse(){
            $("#order_record").show();
            $("#new_notes").hide();
            $("#note_table").hide();
        }

        function edit_loan_collapse(){
            $("#order_record").hide();
            $("#new_notes").show();
            $("#note_table").show();
        }

    </script>
    
</body>

</html>