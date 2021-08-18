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
                            <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>File Number*</label>
                                        <select class="form-control select2-single" data-width="100%">
                                            <option value=""></option>
                                            <option value="1">FL5648</option>
                                            <option value="2">FL8941</option>
                                            <option value="3">FL1234</option>
                                        </select>                                    
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

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Loan Officer	</label>
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


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Processor</label>
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
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
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


                                <div class="col-sm-4"></div>


                                <!-- Col 12 end 11		-->



                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Special instructions</label>
                                        <textarea  class="form-control" name="file_ins" placeholder="Enter Special Instruction" rows="2" cols="50"></textarea>                                    
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