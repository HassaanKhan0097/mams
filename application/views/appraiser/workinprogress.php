<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Work in Progress</title>
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
                    <h1>Work in Progress</h1>
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4" style="display: inline;">Work in Progress</h5>
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
                                        <th>Order Number</th>
                                        <th>Appointment Date</th>
                                        <th>Appointment Time</th>
                                        <th>Client Name</th>
                                        <th>Pay</th>
                                        <th>Property Address</th>
                                        <th>City</th>
                                        <th>Borrower</th>
                                        <th>Order Status</th>
                                        <th>Due Date</th>
                                        
                                        <!-- <th class="table-background">&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach($order_list as $ol ){ ?>
                                    <tr>
                                    <td class="table_id"><a href="<?php echo base_url(); ?>appraiserpages/WorkInProgress/view/<?php echo $ol->order_number; ?>"><?php echo $ol->order_number; ?></a></td>
                                    <td><?php echo $ol->order_appointmentdate; ?></td>
                                    <td><?php echo $ol->order_appointment_time; ?></td>
                                    <td><?php echo $ol->cl_name; ?></td>
                                    <td><?php echo $ol->order_expense; ?></td>
                                    <td><?php echo $ol->order_address; ?></td>
                                    <td><?php echo $ol->order_city; ?></td>
                                    <td><?php echo $ol->order_borrower; ?></td>
                                    <td><?php echo $ol->st_name; ?></td>
                                    <td><?php echo $ol->order_duedate; ?></td> 
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
    <script src="<?php echo base_url(); ?>assets/js/vendor/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
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
                { "data": "order_appointmentdate" },
                { "data": "order_appointment_time" },
                { "data": "order_client_id" },
                { "data": "order_expense" },
                { "data": "order_address" },
                { "data": "order_city_id" },
                { "data": "order_borrower" },
                { "data": "order_status_id" },
                { "data": "order_duedate" }
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