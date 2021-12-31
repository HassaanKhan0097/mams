<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Accounting Client</title>
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
                    
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4" style="display: inline;">Accounts Payable</h5>
                            <div class="top-right-button-container">
                                <div class="btn-group">
                                <a href="<?php echo base_url();?>Accounting/load_search_app" class="btn btn-outline-primary float-right">Search Payable</a>
                                </div>
                            </div>

                            <?php 
                            $totalR = 0;  
                            ?>
                         
                          
                             <div class="row">
                                <div class="col-sm-12">
                                    <table class="table_total">
                                        <thead>
                                        <tr>
                                            <th colspan="2"><h3>Total Payable</h3></th>
                                        </tr>
                                        </thead>
                                        <tr>
                                            <td>Total Accounts Payable</td>
                                            <td>$ <span id="totalR">0</span></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                <!-- <a href="<?php echo base_url();?>Accounting/search_cl" class="btn btn-primary float-right">Search Receivable</a> -->

                                </div>
                            </div>

                            <br><br>
                          
                        
                            <table id="table_accounting" class="table table-bordered">
                                <thead >
                                    <tr>
                                        <th width="25%">Appraiser</th>
                                        <th>Total Owed</th>
                                        
                                    </tr>
                                   
                                </thead>
                                <tbody>   
                                <?php

                                
                                foreach($acc_app_list as $a){

                                    $totalR += $a->total_owed;
                                    ?>
                                    
                                    <tr>
                                        <td class="table_id"><a href="<?php echo base_url(); ?>accounting/app_detail/<?php echo $a->order_appraiser_id; ?>"><?php echo $a->app_name ?></a></td>
                                        <td>$<?php echo $a->total_owed ?></td>
                                    </tr>
                                
                                <?php } ?>
                            </tbody>
                            </table>

                            <br><br>
                           


                                
                        </div>
                    </div>
                    <!--- Table end -->


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

    $("#totalR").html('<?php echo $totalR ?>');

        var $table_accounting = $("#table_accounting").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
            "columns": [
                { "data": "Client" },
                { "data": "Total Owed" },
                { "data": "Count" },
                { "data": "Age0-29" },
                { "data": "Age30-59" },
                { "data": "Age60-89" },
                { "data": "Age90+" },
                // { "data": "Unpaid" }
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
      
            
        });
       
    </script>
</body>

</html>