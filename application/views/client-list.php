<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>List of Client</title>
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
                    <h1>List of Clients</h1>
                    
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4" style="display: inline;">Client List</h5>
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
                            <table id="Table_client">
                                <thead>
                                    <tr>
                                        <th>Client Id</th>
                                        <th>Client Name</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Address 2</th>
                                        <th>Country</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Zip Code</th>
                                        <th>Phone</th>
                                        <th>Fax</th>
                                        <th>Client Type</th>
                                        <th>AMC</th>
                                        <th>Website</th>
                                        <th>Email</th>
                                        <th>Email 2</th>
                                        <th>Instruction</th>
                                        <th>Active</th>
                                        <!-- <th class="table-background">&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($client_list as $cl ){ ?>

                                    <tr>   
                                    <td class="table_id"><a href="<?php echo base_url(); ?>clients/update/<?php echo $cl->cl_id; ?>"><?php echo $cl->cl_id; ?></a></td>
 
                                        <td><?php echo $cl->cl_name; ?></td>
                                        <td><?php echo $cl->cl_contact; ?></td>
                                        <td><?php echo $cl->cl_address; ?></td>
                                        <td><?php echo $cl->cl_address2; ?></td>
                                        <td><?php echo $cl->country_name; ?></td>
                                        <td><?php echo $cl->city_name; ?></td>
                                        <td><?php echo $cl->cl_state; ?></td>
                                        <td><?php echo $cl->cl_zipcode; ?></td>
                                        <td><?php echo $cl->cl_phone; ?></td>
                                        <td><?php echo $cl->cl_fax; ?></td>
                                        <td><?php echo $cl->cl_type; ?></td>
                                        <td><?php echo $cl->cl_amc; ?></td>
                                        <td><?php echo $cl->cl_website; ?></td>
                                        <td><?php echo $cl->cl_email; ?></td>
                                        <td><?php echo $cl->cl_email2; ?></td>
                                        <td><?php echo $cl->cl_ins; ?></td>
                                        <td><label
                                        class="custom-control custom-checkbox mb-1 align-self-center data-table-rows-check">
                                        <input type="checkbox" class="custom-control-input" <?php echo $cl->cl_active; ?>>
                                        <span class="custom-control-label">&nbsp;</span>
                                        </label></td>
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



    <!-- Modal End -->

    <!-- Footer -->

    <?php include_once('footer.php'); ?>

    <!-- Footer End -->


    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
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
        var $Table_client = $("#Table_client").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
            "columns": [
                { "data": "client_id" },
                { "data": "client_name" },
                { "data": "contact" },
                { "data": "address" },
                { "data": "address2" },
                { "data": "country" },
                { "data": "city" },
                { "data": "state" },
                { "data": "zip_code" },
                { "data": "phone" },
                { "data": "fax" },
                { "data": "client_type" },
                { "data": "amc" },
                { "data": "Website" },
                { "data": "email" },
                { "data": "email2" },
                { "data": "instruction" },
                { "data": "active" }
          
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
            "scrollX": true,
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
          
        // },
            buttons: [
                'excel',
                'csv',
                'pdf'
            ]
        });
        $("#dataTablesExcel").on("click", function (event) {
            event.preventDefault();
            $Table_client.buttons(0).trigger();
        });
        $("#dataTablesCsv").on("click", function (event) {
            event.preventDefault();
            $Table_client.buttons(1).trigger();
        });
        $("#dataTablesPdf").on("click", function (event) {
            event.preventDefault();
            $Table_client.buttons(2).trigger();
        });

        $( document ).ready(function() {
            setTimeout(function(){ console.log("Readu"); $("#cl_id").click(); $("#cl_id").click(); }, 1000);
        });


        function edit_client(id){
            window.location.href= "<?php echo base_url(); ?>clients/edit/"+id;
        }
    </script>
</body>

</html>