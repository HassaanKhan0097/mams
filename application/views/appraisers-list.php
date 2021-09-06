<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>List of Appraiser</title>
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
                    <h1>List of Appraiser</h1>
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4" style="display: inline;">Appraiser List</h5>
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
                            <table id="Table_appraiser" class="dt-responsive">
                                <thead>
                                    <tr>
                                        <th>Appraiser Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Title</th>
                                        <th>License Number</th>
                                        <th>Cell Phone</th>
                                        <th>Home Phone</th>
                                        <th>Fax</th>
                                        <th>Pager</th>
                                        <th>App Number</th>
                                        <th>Active</th>
                                        <!-- <th>Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    

                                    <?php
                                        foreach($appraiser_list as $a){?>
                                        <tr>

                                            <td class="table_id"><a href="<?php echo base_url(); ?>appraisers/update/<?php echo $a->app_id; ?>"><?php echo $a->app_id; ?></a></td>
                                            <td><?php echo $a->app_name; ?></td>
                                            <td><?php echo $a->app_email; ?></td>
                                            <td><?php echo $a->app_title; ?></td>
                                            <td><?php echo $a->app_license; ?></td>
                                            <td><?php echo $a->app_phone; ?></td>
                                            <td><?php echo $a->app_home; ?></td>
                                            <td><?php echo $a->app_fax; ?></td>
                                            <td><?php echo $a->app_pager; ?></td>
                                            <td><?php echo $a->app_number; ?></td>
                                           
                                            <td><label
                                        class="custom-control custom-checkbox mb-1 align-self-center data-table-rows-check">
                                        <input type="checkbox" class="custom-control-input" <?php echo $a->app_active; ?>>
                                        <span class="custom-control-label">&nbsp;</span>
                                        </label></td>
                                        </tr>
                                       <?php }?>


                                        
                                                                            
                                        <!-- <td><button type="button" class="btn btn-primary mr-2" onclick="edit_appraiser(1)">Edit</button>&nbsp;<button type="button"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button> </td> -->
                                   
                                   
                                   
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

    function edit_appraiser(id){
      window.location.href= "<?php echo base_url(); ?>appraisers/edit/"+id;
      
    }
        var $Table_appraiser = $("#Table_appraiser").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
            "columns": [
                { "data": "app_id" },
                { "data": "app_name" },
                { "data": "app_email" },
                { "data": "app_title" },
                { "data": "app_licenseNumber" },
                { "data": "app_phone" },
                { "data": "app_home" },
                { "data": "app_fax" },
                { "data": "app_pager" }, 
                { "data": "app_appt" },
                { "data": "app_active" }
                // { "data": "action" }
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
            $Table_appraiser.buttons(0).trigger();
        });
        $("#dataTablesCsv").on("click", function (event) {
            event.preventDefault();
            $Table_appraiser.buttons(1).trigger();
        });
        $("#dataTablesPdf").on("click", function (event) {
            event.preventDefault();
            $Table_appraiser.buttons(2).trigger();
        });
    </script>
</body>

</html>