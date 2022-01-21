<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Search Files</title>
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
                    <h1>Search Orders</h1>
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">

                    <?php 
                        $display = "block";
                        $total = count($this->uri->segment_array());
                        if($total > 1) { $display = "none"; }
                    ?>
                    
                    <div class="card mb-4" style="display: <?php echo $display; ?>;">
                        <div class="card-body">
                            <h5 class="mb-4">Search Order</h5>
                            <form action="<?php echo base_url(); ?>Order/advanceFilter" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Number</label>
                                        <input type="text" class="form-control" name="file_number" placeholder="Enter File Number">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Property Address</label>
                                        <input type="text" class="form-control" name="file_prop" placeholder="Enter Property Address">
                                    </div>
                                </div>
                                <!-- Col 12 end 1-->

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Client Name</label>
                                        <select class="form-control select2-single" data-width="100%" name="order_client">
                                            <option value=""></option>
                                            <?php
                                            foreach($client_list as $cl){
                                            ?>                                            
                                            <option value="<?php echo $cl->cl_id ?>" > <?php echo $cl->cl_name ?></option>
                                            <?php } ?>
                                        </select>                                    
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <select class="form-control select2-single" data-width="100%" name="order_city">
                                            <option value=""></option>
                                            <?php
                                            foreach($city_list as $cl){
                                            ?>                                            
                                            <option value="<?php echo $cl->city_id ?>" > <?php echo $cl->city_name ?></option>
                                            <?php } ?>
                                        </select>                                    
                                    </div>
                                </div>
                                <!-- Col 12 end 2-->

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Borrower</label>
                                        <input type="text" class="form-control" name="order_borrower" placeholder="Enter Borrower">
                                    </div>
                                </div>

                                <!-- <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>State</label>
                                        <select class="form-control select2-single" data-width="100%">
                                            <option value=""></option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>                                    
                                    </div>
                                </div> -->

                                 <!-- Col 12 end 3-->


                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Appraiser Name</label>
                                        <select class="form-control select2-single" data-width="100%" name="order_appraiser">
                                            <option value=""></option>
                                            <?php
                                            foreach($appraiser_list as $app){
                                            ?>                                            
                                            <option value="<?php echo $app->app_id ?>" > <?php echo $app->app_name ?></option>
                                            <?php } ?>
                                        </select>                                    
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Zip</label>
                                        <input type="text" class="form-control" name="order_zipcode" placeholder="Enter Zip">
                                    </div>
                                </div>

                                <!-- Col 12 end 4-->

                                <!-- <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Sort By</label><br>
                                        <select class="form-control select2-single" data-width="50%" style="width:50%; float:left;">
                                            <option value=""></option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>  
                                        
                                        <select class="form-control select2-single" data-width="50%" style="width:50%; float:left;">
                                            <option value=""></option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>  
                                    </div>
                                </div> -->

                                <div class="col-sm-6">
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

                                <!-- Col 12 end 5-->
                            </div>


                                <br>
                                <button type="submit" class="btn btn-primary mb-0">Search</button>
                                <button type="button" class="btn btn-default mb-0">Clear</button>
                            </form>
                        </div>
                    </div><!-- card mb-4 End -->



                    
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4" style="display: inline;">Order List</h5>
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
                            <table id="Table_files" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>Property Address</th>
                                        <th>Order Types</th>
                                        <!-- <th>Loan Number</th> -->
                                        <th>City</th>
                                        <th>Assignment Type</th>
                                        <!-- <th>Sub Assignment Type 1</th>                                         -->
                                        <!-- <th>Sub Assignment Type 2</th> -->
                                        <!-- <th>FHA/VA Case #</th> -->
                                        <!-- <th>State</th> -->
                                        <th>Order Status</th>
                                        <th>Client Name</th>
                                        <!-- <th>Website</th> -->
                                        <!-- <th>Sub Client Name</th> -->
                                        <!-- <th>AMC</th> -->
                                        <!-- <th>Zipcode</th> -->
                                        <!-- <th>Action</th> -->
                                        <th>Order Date</th>
                                        <th>Borrower</th>
                                        <!-- <th>Co Borrower</th> -->
                                        <th>Due Date</th>
                                        <!-- <th>Entry Contact</th> -->
                                        <th>Appointment Date</th>
                                        <th>Appraiser Name</th>
                                        <!-- <th>Sub Appraiser Name</th> -->
                                        <!-- <th>Appraiser Email</th> -->
                                        <!-- <th>Appraiser Email 2</th> -->
                                        <!-- <th>Phone</th> -->
                                        <!-- <th>Phone 2</th> -->
                                        <!-- <th>Phone 3</th> -->
                                        <th>Appointment Time</th>
                                        <th>Complete Date</th>
                                        <!-- <th>Payment Method</th> -->
                                        <!-- <th>Purchase Price</th> -->
                                        <!-- <th>Revenue</th> -->
                                        <!-- <th>Expense</th> -->
                                        <!-- <th>Special Instruction</th> -->
                                        <!-- <th>Attach File</th> -->
                                        
                                        <!-- <th class="table-background">&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach($order_list as $ol ){ ?>
                                    <tr>
                                    <td class="table_id"><a href="<?php echo base_url(); ?>order/update/<?php echo $ol->order_number; ?>"><?php echo $ol->order_number; ?></a></td>
                                    <!-- <td class="table_id"><a><?php echo $ol->order_number; ?></a></td> -->
                                    <td><?php echo $ol->order_address; ?></td>
                                    <td><?php echo $ol->order_name; ?></td>
                                    <!-- <td><?php echo $ol->order_loan_number; ?></td> -->
                                    <td><?php echo $ol->city_name; ?></td>
                                    <td><?php echo $ol->at_name; ?></td>
                                    <!-- <td><?php echo $ol->at2_name; ?></td> -->
                                    <!-- <td><?php echo $ol->at3_name; ?></td> -->
                                    <!-- <td><?php echo $ol->order_case_number; ?></td> -->
                                    <!-- <td><?php echo $ol->order_state; ?></td> -->
                                    <td><?php echo $ol->st_name; ?></td>
                                    <td><?php echo $ol->cl_name; ?></td>
                                    <!-- <td><?php echo $ol->order_website; ?></td> -->
                                    <!-- <td><?php echo $ol->cl2_name; ?></td> -->
                                    <!-- <td><?php echo $ol->order_amc; ?></td> -->
                                    <!-- <td><?php echo $ol->order_zipcode; ?></td> -->
                                    <!-- <td><?php echo $ol->order_action; ?></td> -->
                                    <td><?php echo $ol->order_date; ?></td>
                                    <td><?php echo $ol->order_borrower; ?></td>
                                    <!-- <td><?php echo $ol->order_co_borrower; ?></td> -->
                                    <td><?php echo $ol->order_duedate; ?></td>
                                    <!-- <td><?php echo $ol->order_entry; ?></td> -->
                                    <td><?php echo $ol->order_appointmentdate; ?></td>
                                    <td><?php echo $ol->app_name; ?></td>
                                    <!-- <td><?php echo $ol->app_name; ?></td> -->
                                    <!-- <td><?php echo $ol->order_appraiser_email; ?></td> -->
                                    <!-- <td><?php echo $ol->order_appraiser_email2; ?></td> -->
                                    <!-- <td><?php echo $ol->order_phone; ?></td> -->
                                    <!-- <td><?php echo $ol->order_phone2; ?></td> -->
                                    <!-- <td><?php echo $ol->order_phone3; ?></td> -->
                                    <td><?php echo $ol->order_appointment_time; ?></td>
                                    <td><?php echo $ol->order_completedate; ?></td>
                                    <!-- <td><?php echo $ol->order_paymentmethod; ?></td> -->
                                    <!-- <td><?php echo $ol->order_purchase; ?></td> -->
                                    <!-- <td><?php echo $ol->order_revenue; ?></td> -->
                                    <!-- <td><?php echo $ol->order_expense; ?></td> -->
                                    <!-- <td><?php echo $ol->order_instruction; ?></td> -->
                                    <!-- <td class="table_id"> <a href="<?php echo $this->config->item('upload_dir').$ol->order_file; ?>">File</a> </td> -->
                                    
                                    </tr>
                                    <?php }?>
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
        var $Table_files = $("#Table_files").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
            "columns": [
                { "data": "order_number" },
                { "data": "order_address" },
                { "data": "order_type_id" },
                // { "data": "order_loan_number" },
                { "data": "order_city_id" },
                { "data": "order_assignment_id" },
                // { "data": "order_assignment_id2" },
                // { "data": "order_assignment_id3" },
                // { "data": "order_case_number" },
                // { "data": "order_state" },
                { "data": "order_status_id" },
                { "data": "order_client_id" },
                // { "data": "order_website" },
                // { "data": "order_client_id2" },
                // { "data": "order_amc" },
                // { "data": "order_zipcode" },
                // { "data": "order_action" },
                { "data": "order_date" },
                { "data": "order_borrower" },
                // { "data": "order_co_borrower" },
                { "data": "order_duedate" },
                // { "data": "order_entry" },
                { "data": "order_appointmentdate" },
                { "data": "order_appraiser_id" },
                // { "data": "order_appraiser_id2" },
                // { "data": "order_appraiser_email" },
                // { "data": "order_appraiser_email2" },
                // { "data": "order_phone" },
                // { "data": "order_phone2" },
                // { "data": "order_phone3" },
                { "data": "order_appointment_time" },
                { "data": "order_completedate" },
                // { "data": "order_paymentmethod" },
                // { "data": "order_purchase" },
                // { "data": "order_revenue" },
                // { "data": "order_expense" },
                // { "data": "order_instruction" }
                // { "data": "order_file" }
                  
                // { "data": "action"}
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
            "scrollX": true,
        //     columnDefs: [
        //     { width: 200, targets: 0 }
        // ],
        // fixedColumns: true,
        // fixedColumns:   {
        //     leftColumns: 1
        //     // rightColumns: 1
        // },
            buttons: [
                'excel',
                'csv',
                'pdf'
            ]
        });
        $("#dataTablesExcel").on("click", function (event) {
            event.preventDefault();
            $Table_files.buttons(0).trigger();
        });
        $("#dataTablesCsv").on("click", function (event) {
            event.preventDefault();
            $Table_files.buttons(1).trigger();
        });
        $("#dataTablesPdf").on("click", function (event) {
            event.preventDefault();
            $Table_files.buttons(2).trigger();
        });

        $( document ).ready(function() {
            setTimeout(function(){ console.log("Ready"); $("#order_number").click(); $("#order_number").click(); }, 3000);
        });


        function edit_file(id){
            window.location.href= "<?php echo base_url(); ?>file/edit/"+id;
        }
    </script>
</body>

</html>