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
                    <h1>Search Files</h1>
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4">Search File</h5>
                            <form action="" method="post">
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
                                        <select class="form-control select2-single" data-width="100%">
                                            <option value=""></option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>                                    
                                    </div>
                                </div>

                                <div class="col-sm-6">
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
                                <!-- Col 12 end 2-->

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Borrower</label>
                                        <input type="text" class="form-control" name="file_borrower" placeholder="Enter Borrower">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>State</label>
                                        <select class="form-control select2-single" data-width="100%">
                                            <option value=""></option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>                                    
                                    </div>
                                </div>

                                 <!-- Col 12 end 3-->


                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Appraiser Name</label>
                                        <select class="form-control select2-single" data-width="100%">
                                            <option value=""></option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>                                    
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Zip</label>
                                        <input type="text" class="form-control" name="file_zip" placeholder="Enter Zip">
                                    </div>
                                </div>

                                <!-- Col 12 end 4-->

                                <div class="col-sm-6">
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
                                </div>

                                <div class="col-sm-6">
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
                            <h5 class="mb-4" style="display: inline;">File List</h5>
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
                            <table id="Table_files">
                                <thead>
                                    <tr>
                                        <th id ="file_id" class="table-background">File Number</th>
                                        <th>Client Name</th>
                                        <th>Borrower</th>
                                        <th>Appraiser Name</th>
                                        <th>Property Address</th>
                                        <th>City ID</th>
                                        <th>State</th>                                        
                                        <th>Zip Code</th>
                                        <th>Appt Date</th>
                                        <th>Appt Time</th>
                                        <th>Due Date</th>
                                        <th>Status ID</th>
                                        <th class="table-background">&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="table-background">12345</td>
                                        <td>Easy Mortgage</td>
                                        <td>Bergman, Phyliss & Walter</td>
                                        <td>Martin Praiser</td>
                                        <td>1008 Wyndham Drive</td>
                                        <td>Baldwin Hills</td>
                                        <td>Virginia</td>
                                        <td>22579</td>
                                        <td>3/28/2007</td>
                                        <td>09:00:00</td>
                                        <td>4/11/2007</td>    
                                        <td>Cancelled</td>                                    
                                        <td class="table-background"><button type="button" class="btn btn-primary mr-2" onclick="edit_file(1)">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button> </td>
                                    </tr>

                                    <tr>
                                        <td class="table-background">23145</td>
                                        <td>John</td>
                                        <td>Bergman, Phyliss & Walter</td>
                                        <td>Martin Praiser</td>
                                        <td>1008 Wyndham Drive</td>
                                        <td>Baldwin Hills</td>
                                        <td>Virginia</td>
                                        <td>22579</td>
                                        <td>3/28/2007</td>
                                        <td>09:00:00</td>
                                        <td>4/11/2007</td>    
                                        <td>Cancelled</td>                                    
                                        <td class="table-background"><button type="button" class="btn btn-primary mr-2" onclick="edit_file(1)">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button> </td>
                                    </tr>

                                    <tr>
                                        <td class="table-background">36341</td>
                                        <td>Michael</td>
                                        <td>Bergman, Phyliss & Walter</td>
                                        <td>Martin Praiser</td>
                                        <td>1008 Wyndham Drive</td>
                                        <td>Baldwin Hills</td>
                                        <td>Virginia</td>
                                        <td>22579</td>
                                        <td>3/28/2007</td>
                                        <td>09:00:00</td>
                                        <td>4/11/2007</td>    
                                        <td>Cancelled</td>                                    
                                        <td class="table-background"><button type="button" class="btn btn-primary mr-2" onclick="edit_file(1)">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button> </td>
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



    <!-- Modal End -->

    <!-- Footer -->

    <?php include_once('footer.php'); ?>

    <!-- Footer End -->


    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/datatables.min.js"></script>
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
                { "data": "file_number" },
                { "data": "file_name" },
                { "data": "file_borrower" },
                { "data": "file_appraiser" },
                { "data": "file_property" },
                { "data": "file_city" },
                { "data": "file_state" },
                { "data": "file_zip" },
                { "data": "file_apptdate" },
                { "data": "file_appttime" },
                { "data": "file_duedate" },
                { "data": "file_status" },                
                { "data": "action"}
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
        fixedColumns:   {
            leftColumns: 1,
            rightColumns: 1
        },
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
            setTimeout(function(){ console.log("Ready"); $("#file_id").click(); $("#file_id").click(); }, 500);
        });


        function edit_file(id){
            window.location.href= "<?php echo base_url(); ?>file/edit/"+id;
        }
    </script>
</body>

</html>